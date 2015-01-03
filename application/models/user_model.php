<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function login($pseudo, $password) {
        //function qui recherche les infos correspondant à l'utilisateur ayant $pseudo et $passwd (brut)
        $this->db->select('*');
        $this->db->from('utilisateur');
        $this->db->where('pseudo', $pseudo);
        $this->db->where('mdp', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function value_exists($name, $value) {
        $this->db->select($name);
        $this->db->from('utilisateur');
        $this->db->where($name, $value);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function register($data) {
        $this->db->insert('utilisateur', $data);

        $pseudo = $data['pseudo'];


        if ($this->value_exists('pseudo', $pseudo)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_favorite_station($pseudo, $station) {
        $this->db->select('id');
        $this->db->from('stations');
        $this->db->where('nomS', $station);
        $this->db->limit(1);

        $id_station = $this->db->get()->result()[0]->id;

        $data = array(
            'pseudo' => $pseudo,
            'id_station' => $id_station
        );

        $this->db->insert('stations_favorites', $data);
    }

    function add_favorite_activite($pseudo, $activite) {

        $data = array(
            'pseudo' => $pseudo,
            'activite' => $activite
        );

        $this->db->insert('activite_favorites', $data);
    }
    
    function change_password($pseudo,$newpasswd){
        $tmpmdp = array('mdp' => $newpasswd);
        
        $this->db->where('pseudo',$pseudo);
        $this->db->update('utilisateur',$tmpmdp);
    }
    
    function check_email($mail){
      
        $this->db->select('*');
        $this->db->from('utilisateur');
        $this->db->where('email',$mail);
        
        $this->db->limit(1);
        $result = $this->db->get()->result();
        
        if($result == NULL){
            return FALSE;
        }else{
            return TRUE;
        }
        
    }

}
