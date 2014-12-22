<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verifylogin
 *
 * @author Azarias
 */
class verifylogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
    }

    function index() {
        //Méthode de base
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('passwd', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('required/links');
            $this->load->view('login/login_view');
        } else {
            //Go to main menu
            redirect('User/login', 'refresh');
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $pseudo = $this->input->post('pseudo');

        //query the database
        $result = $this->user_model->login($pseudo, $password);

        //Resultat trouvé
        if ($result) {
            //création des données utilisateur
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'idusr' => $row->idusr,
                    'pseudo' => $row->pseudo
                );
                //Ajout des données utilisateurs à la session
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

}
