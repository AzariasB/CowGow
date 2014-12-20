<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myGlobals
 *
 * @author Azarias
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myglobals_model extends CI_Model{
    //Ici on déclare toutes les variables qu'on veut utiliser de partout et qui vont être souvent utilisées !
    public static $pictures;
    public static $css;
    public static $javascript;
   // public static $connected;
    // A traiter plus tard pour pouvoir vérifier que l'utilisateur est bien connecter pour pouvoir accéder à la BD
            
    function __construct() {
        parent::__construct();
        Myglobals_model::$pictures = base_url('assets/others/images').'/';
        Myglobals_model::$css = base_url('assets/css').'/';
        Myglobals_model::$javascript = base_url('assets/js').'/';
    }
}
