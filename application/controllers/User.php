<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Azarias
 */
class User extends CI_Controller {

    function __construct() {
        parent::__construct();

        //Pour éviter la reconnection avec le bouton 'retour' du navigateur
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
    }

    function login() {
        if ($this->session->userdata('logged_in')) {
            //Si l'utilisateur s'est bien connecté => on initialise la session
            $session_data = $this->session->userdata('logged_in');
            $data['pseudo'] = $session_data['pseudo'];
            $data['pictures'] = base_url() . 'assets/others/images/';



            $this->load->view('required/links');
            $this->load->view('required/navbar', $data);
            $this->load->view('accueil/accueil_view');
            $this->load->view('required/footer');
        } else {
            //If no session, redirect to login page
            redirect('welcome', 'refresh');
        }
    }

    function logout() {
        //Pour que l'utilisateur se deconnecte
        echo '<pre>';
        echo 'Loading ...';
        echo '</pre>';
        //On supprime la session
        $this->session->unset_userdata($this->session->all_userdata());
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();

        //On indique que personne n'est connecté        
        redirect('static_pages/accueil', 'refresh');
    }

    function forgot_passwd() {
        $this->load->library('form_validation');
        $this->load->model('user_model');
        //On lui demande son e-mail


        $config = array(
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|xss_clean|valid_email'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {

            // Pb lors du filtrage
            redirect('Static_pages/retrouver_mdp');
        } else {
            if($this->user_model->check_email($_POST['email'])){
                //L'adresse existe bien
                
            }else{
                // L'adresse n'existe pas
            }
        }
    }   

}
