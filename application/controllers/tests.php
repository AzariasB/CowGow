<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tests extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    function index() {
        $myarray = array();
        $myfile = fopen(base_url('assets/others/txt/activites.txt'), "r") or die("Unable to open file!");
        while ($myline = fgets($myfile)) {
            $myline = explode('|', $myline);
            $myarray[$myline[0]] = $myline[1];
        }
        echo '<pre>';
        print_r($myarray);
        echo '</pre>';
    }

}
