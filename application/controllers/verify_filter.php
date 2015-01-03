<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verify_filter
 *
 * @author Azarias
 */
class verify_filter extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function activite() {
        //Pour pouvoir récupérer les activites de la BDD.
        $this->load->model('activite_model');

        $echelleprix = $this->separate_coma($_POST['prix_act']);
        unset($_POST['filter']);
        unset($_POST['prix_act']);

        echo '<pre>';
        print_r($_POST);


        if (count($_POST) == 0) {
            //Il n'y a qu'une echelle de prix à traiter ...
        } else {
            //Il faut traiter toutes les checkbox 'on' puisque sur notre filtre, il n'y a que des checkbox
            $checkbox = array();
            $current_array = array();
            $current_key = "";
            foreach ($_POST as $key => $value) {
                if ($current_key == "") {
                    $current_key = $value;
                }
                //Ttes les values sont a 'on', ce qui nous interesse, c'est la clé !
                // Pour chaque value différente, on crée un nouvel array
                if ($current_key != $value) {
                    $checkbox[$current_key] = $current_array;
                    $current_key = $value;
                    unset($current_array);
                    //Reinitialisation de l'array
                    $current_array = array();
                }
                
                //On ajoute à l'array total, la nouvelle contrainte
                array_push($current_array, $key);
            }
            //On ajoute le dernier array
            $checkbox[$current_key] = $current_array;
        }
        
        //Maintenant, il faut faire tout les calculs concernant les contraintes du filtres par rapport aux données reçus de la BDD
        
        
        $allBDD = $this->activite_model->all();
        
        
        print_r($allBDD);

        echo '</pre>';
    }

    function transport() {
        $echelleprix = $this->separate_coma($_POST['prix_tran']);
        unset($_POST['filter']);
        unset($_POST['prix_tran']);

        echo '<pre>';
        print_r($_POST);

        if (count($_POST) == 0) {
            //Il n'y a qu'une echelle de prix à traiter ...
        } else {
            //Il faut traiter toutes les checkbox 'on' puisque sur notre filtre, il n'y a que des checkbox
            $checkbox = array();
            $current_array = array();
            $current_key = "";
            foreach ($_POST as $key => $value) {
                if ($current_key == "") {
                    $current_key = $value;
                }
                //Ttes les values sont a 'on', ce qui nous interesse, c'est la clé !
                // Pour chaque value différente, on crée un nouvel array
                if ($current_key != $value) {
                    $checkbox[$current_key] = $current_array;
                    $current_key = $value;
                    unset($current_array);
                    //Reinitialisation de l'array
                    $current_array = array();
                }
                array_push($current_array, $key);
            }
            //On ajoute le dernier array
            $checkbox[$current_key] = $current_array;


            print_r($checkbox);
        }

        echo '</pre>';
    }

    function logement() {
        $echelleprix = $this->separate_coma($_POST['prix_log']);
        unset($_POST['filter']);
        unset($_POST['prix_log']);

        echo '<pre>';
        print_r($_POST);

        if (count($_POST) == 0) {
            //Il n'y a qu'une echelle de prix à traiter ...
        } else {
            //Il faut traiter toutes les checkbox 'on' puisque sur notre filtre, il n'y a que des checkbox
            $checkbox = array();
            $current_array = array();
            $current_key = "";
            foreach ($_POST as $key => $value) {
                if ($current_key == "") {
                    $current_key = $value;
                }
                //Ttes les values sont a 'on', ce qui nous interesse, c'est la clé !
                // Pour chaque value différente, on crée un nouvel array
                if ($current_key != $value) {
                    $checkbox[$current_key] = $current_array;
                    $current_key = $value;
                    unset($current_array);
                    //Reinitialisation de l'array
                    $current_array = array();
                }
                array_push($current_array, $key);
            }
            //On ajoute le dernier array
            $checkbox[$current_key] = $current_array;


            print_r($checkbox);
        }

        echo '</pre>';
    }

    /*
     * Toutes les fonctions permettant de renvoyer vers la bonne page correspondant au resultat du filtre en question
     * 
     * l => lieu
     * s => saison
     * t => type
     * a => arrive
     * d => depart
     * 
     */

    function s_activite() {
        // On va chercher dans la BDD toutes les activités qui ont comme saison celle que l'utilisateur à choisi
        //...
        //Puis on le renvoie vers la page avec toutes les annonces trouvées
        redirect('Static_pages/activites'); //<- Il faut réussir à changer ça pour pouvoir passer des valeurs en paramètres
    }

    function l_activite() {
        // On va chercher dans la BDD toutes les activités qui ont comme lieu celui que l'utilisateur à choisi
        //...
        //Puis on le renvoie vers la page avec toutes les annonces trouvées
        redirect('Static_pages/activites');
    }

    function l_logement() {
        // On va chercher dans la BDD tous les logements situés au lieu choisi par l'utilisateur
        //...
        //
        //Puis on le renvoie vers la page avec toutes les annonces trouvées
        redirect('Static_pages/logement');
    }

    function t_logement() {
        // On va chercher dans la BDD tous les logements qui on le type choisi par l'utilisateur
        //...
        //
        //Puis on le renvoie vers la page avec toutes les annonces trouvées
        redirect('Static_pages/logement');
    }

    function d_transport() {
        // On va chercher dans la BDD tous les transports qui partent du lieu choisi par l'utilisateur
        //...
        //Puis on le renvoie vers la page avec toutes les annonces trouvées
        redirect('Static_pages/transport');
    }

    function a_transport() {
        // On va chercher dans la BDD tous les transports qui arrivent au lieu choisi par l'utilisateur
        //...
        //Puis on le renvoie vers la page avec toutes les annonces trouvées
        redirect('Static_pages/transport');
    }

    /*
     * 
     * Autres fonctions 'utiles' de manière générale
     */

    function separate_coma($chaine) {
        $tableau = explode(',', $chaine);
        return $tableau;
    }

}
