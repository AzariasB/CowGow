<?php

class Activite_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function prix($prixMin, $prixMax) {
        //fonction y'as qua lire et comprendre
        // $prixMin < prix < $prixMax 
        $this->db->select('*');
        $this->db->from('Activite');
        $this->db->where('prix <', $prixMax);
        $this->db->where('prix >', $prixMin);
        
        return $this->db->get()->result();
    }

    function type($type) {
        //fonction y'as qua lire et comprendre
        $this->db->select('*');
        $this->db->from('Activite');
        $this->db->where('t_typeact', $type);
        
        return $this->db->get()->result();
    }

    function duree($duree) {
        //renvoi les act dont la durée (fin-debut) est inferieur à la durée demandée
        // en gros, act durant moins de 2h, moins de 4h ...
        // le h_fin-h_deb est pas sur du tout, j'ai pas trouvé d'info la dessus :/
        $this->db->select('*');
        $this->db->from('Activite');
        $this->db->where('(horaire_fin - horaire_deb) <', $duree);
        
        return $this->db->get()->result();
    }

    function saison($saison) {
        //fonction y'as qua lire et comprendre
        $this->db->select('*');
        $this->db->from('Activite');
        $this->db->where('saison', $saison);
        
        return $this->db->get()->result();
    }

    function niveau($niveau) {
        //fonction y'as qua lire et comprendre
        // niveau est un atribut à ajouter à la base de données (table activité)
        $this->db->select('*');
        $this->db->from('Activite');
        $this->db->where('niveau <', $niveau);
        
        return $this->db->get()->result();
    }

    function lieu($lieu) {
        //fonction y'as qua lire et comprendre
        $this->db->select('*');
        $this->db->from('Activite');
        $this->db->where('lieu', $lieu);
        
        return $this->db->get()->result();
    }

    function note($note) {
        //fonction en plus, je me suis dit qu'on pouvait aussi rechercher par note
        $this->db->select('*');
        $this->db->from('Activite');
        $this->db->where('note <', $note);
        
        return $this->db->get()->result();
    }
    
    function all(){
        $this->db->select('*');
        $this->db->from('Activite');
        
        return $this->db->get()->result();
    }

}

?>