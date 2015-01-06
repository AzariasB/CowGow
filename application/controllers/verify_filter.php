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

    /*
     * A partir des choix qui ont été fait par l'utilisateur, cette fonction :
     *  - Transcrit les choix de l'utilsateur en comparaison/requêtes SQL
     *  - Recupère les activités correspondant au filtre
     *  - Les renvois pour pouvoir les afficher correctement sur la page faite pour cela
     */

    function activite() {
        //Pour pouvoir récupérer les activites de la BDD.

        $this->load->model('activite_model');

        $echelleprix = $this->separate_coma($_POST['prix_act']);
        unset($_POST['filter']);
        unset($_POST['prix_act']);

        if (count($_POST) == 0) {
            //Il n'y a qu'une echelle de prix à traiter ...
            $checkbox = array();
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
        //On traite la durée : pour transformer un début-fin en une durée
        //On traite le créneau horaire : changer la chaine en un nombre (pour avoir un traitement sql plus facile)
        if (isset($checkbox['creneau'])) {
            $lenght = count($checkbox['creneau']);
            foreach ($checkbox['creneau'] as $key => $value) {
                switch ($value) {
                    //Pour chaque type de créneau, on le remplace par son heure maximale ou minimale
                    case 'matin': $checkbox['creneau'][$key] = '( HOUR(horaire_fin) <= 12 AND HOUR(horaire_deb) >6 ) ';
                        break;
                    case 'apmidi': $checkbox['creneau'][$key] = '( HOUR(horaire_fin) <= 19 AND HOUR(horaire_deb) > 12 ) ';
                        break;
                    case 'soir': $checkbox['creneau'][$key] = ' ( HOUR(horaire_fin) <= 24 AND HOUR(horaire_deb) > 19 ) ';
                        break;
                    default : break;
                }
            }
        }

        //On rajoute les accents pour la saison
        if (isset($checkbox['saison'])) {
            foreach ($checkbox['saison'] as $key => $value) {
                if ($checkbox['saison'][$key] == 'Ete') {
                    $checkbox['saison'][$key] = 'Eté';
                }
            }
        }

        //On rajoute les accents pour le niveau
        if (isset($checkbox['niveau'])) {
            foreach ($checkbox['niveau'] as $key => $value) {
                switch ($value) {
                    case 'Debutant' : $checkbox['niveau'][$key] = 'Débutant';
                        break;
                    case 'Confirme' : $checkbox['niveau'][$key] = 'Confirmé';
                        break;
                }
            }
        }

        //On enlève les '_' des duree :
        if (isset($checkbox['duree'])) {
            foreach ($checkbox['duree']as $key => $value) {
                if($checkbox['duree'][$key] == 'demi_j'){
                    $checkbox['duree'][$key] = ' < 5';
                }else{
                    $checkbox['duree'][$key] = ' > 5';
                }
            }
        }

        $checkbox['prix_min'] = $echelleprix[0];
        $checkbox['prix_max'] = $echelleprix[1];
        //Maintenant, il faut faire tout les calculs concernant les contraintes du filtres par rapport aux données reçus de la BDD
        //On récupère ttes les infos de la bdd
        $allBDD = $this->activite_model->with_filter($checkbox);

        foreach ($allBDD as $key => $value) {
            $allBDD[$key] = (array) $value;
            //Transformation en array
        }
        $allBDD['filter'] = TRUE;
        $_POST['prix'] = $echelleprix;
        $post = array('post' => $_POST);
        $allBDD = array_merge($allBDD, $post);


        $this->session->unset_userdata('filter_activite');

        $this->session->set_userdata('filter_activite', $allBDD);

//        echo '<pre>';
//        print_r($this->session->userdata('filter'));
//        die();
        redirect('Static_pages/activites');
    }

    //---------------------------------
    //Fin de la fonction 'activite'
    //---------------------------------

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
        }

        print_r($checkbox);
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
