<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Static_pages
 *
 * @author Azarias
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Static_pages extends CI_Controller {

    //put your code here
    var $data;

    function __construct() {
        parent::__construct();
        //$this->data['pictures'] = base_url().'assets/others/images/';
        $this->load->helper('url');
    }

    function index() {
        redirect('welcome');
    }

    function accueil() {
        $this->load->view('required/links');
        $this->load->view('accueil/accueil_view');
        $this->load->view('required/footer');
    }

    function services() {
        $this->load->view('required/links');
        $this->navbar_collaps();
        $this->load->view('services/accueil');
    }

    function navbar_collaps() {
        $this->load->view('required/navbar_collapse');
        //$this->load->view('modals/activite_modal'); <- a changer
        $this->load->view('modals/t_logement');
        $this->load->view('modals/l_logement');
        $this->load->view('modals/l_activite');
        $this->load->view('modals/s_activite');
        $this->load->view('modals/a_transport');
        $this->load->view('modals/d_transport');
    }

    /*
     * Toutes les fonctions qui permettent d'accéder à des services
     */

    function activites() {
        $this->load->view('required/links');
        $this->navbar_collaps();
        $this->load->view('services/activites');
    }

    function transport() {
        $this->load->view('required/links');
        $this->navbar_collaps();
        $this->load->view('services/transport');
    }

    function logement() {
        $this->load->view('required/links');
        $this->navbar_collaps();
        $this->load->view('services/logement');
    }

}
