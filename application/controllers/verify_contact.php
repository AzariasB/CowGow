<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verify_contact
 *
 * @author Azarias
 */
class verify_contact extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('form_validation');
    }

    function index() {
        $this->filter();
        if ($this->form_validation->run() == FALSE) {
            //Tentative de fraude !!!
            redirect('Static/pages', 'refresh');
        } else {
            $this->send_mail();
        }
    }

    function filter() {
        $config = array(
            array(
                'field' => 'nom',
                'label' => 'nom',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'email',
                'label' => 'champs \'adresse e-mail\'',
                'rules' => 'trim|required|xss_clean|valid_email'
            ),
            array(
                'field' => 'message',
                'lable' => 'message',
                'rules' => 'trim|required|xss_clean|max_length[500]'
            )
        );

        $this->form_validation->set_rules($config);
    }

    function send_mail() {
        $this->email->from('support@cowgow.byethost7.com',$_POST['nom'] );
        $this->email->to('support@cowgow.byethost7.com');

        $this->email->subject($_POST['objet']);
        $this->email->message($_POST['message']);

        
        $this->session->set_flashdata('contact',  $this->email->send());
        
        redirect('Static_pages/contact');
    }

}
