<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register
 *
 * @author Azarias
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('register_model', '', TRUE);
    }

    function index() {

        $this->load->view('required/links');
        $this->load->view('register/register_view', $this->register_model->get_data());
    }

    function register_success() {
        $this->load->view('required/links');
        $this->load->view('register/register_sucess');
    }

}
