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

    function all() {
        $this->db->select('*');
        $this->db->from('Service s, Activite a');
        $this->db->where('a.ida = s.IDService');

        $result = $this->db->get()->result();

        foreach ($result as $key => $value) {
            unset($value->IDService);
            $result[$key] = (array) $value;
        }

        return $result;
    }

    //Fonction qui va chercher dans la BDD les activites qui correspondent aux filtre passé en paramètres
    function with_filter($filter) {        
        $this->db->select('*');
        $this->db->from('Service s, Activite a');
        $this->db->where('a.ida = s.IDService');
        $this->db->where('s.prix >=', $filter['prix_min']);
        $this->db->where('s.prix <=', $filter['prix_max']);
        if(isset($filter['Lieu'])){
            $this->db->like('s.lieu',$filter['Lieu']);
            unset($filter['Lieu']);
        }
        unset($filter['prix_min']);
        unset($filter['prix_max']);
        //S'il y a d'autres filtres que le prix ...
        if (!empty($filter)) {
            //On initialise notre grande variable pour faire les 'or' consécutif
            foreach ($filter as $key => $value) {
                // On crée notre requête composé de plusieurs 'or'
                $where = '(' . $this->or_where($value, $key);
                $where = substr($where, 0, strlen($where) - 4) . ')';
                if(!empty($where)){
                    $this->db->where($where);
                }
                
            }
            //On enlève le dernier 'or' parasite
            //On ferme la parenthèse
        }
        $result = $this->db->get()->result();
        
        return $result;
    }

    function or_where(&$array, $columnname) {
        $or_list = "";
        foreach ($array as $value) {
            switch ($columnname) {
                case 'duree':
                    $or_list .= 'HOUR(horaire_fin) - HOUR(horaire_deb) ' . $value . "\n OR ";
                    break;
                case 'creneau':
                    $or_list .= $value. " OR \n";
                    break;
                default :
                    //Pour la cas 'saison' et 'niveau' on a la même requête.
                    $or_list .= $columnname . " = '" . $value . "'\n OR ";
            }
        }
        return $or_list;
    }

}

?>