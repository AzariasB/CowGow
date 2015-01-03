<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verifyregister
 *
 * @author Azarias
 */
class verifyregister extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
        $this->load->model('register_model', '', TRUE);
    }

    function index() {
        $this->load->library('form_validation');

        $this->form_validation->set_message('required', 'Le %s est requis');
        $this->form_validation->set_message('matches', 'Le %s et le %s doivent correspondre.');
        $this->form_validation->set_message('valid_email', 'L\'adresse email doit être valide.');
        $this->form_validation->set_message('exact_length', 'Le %s doit contenir exactement %s caractères.');
        $this->form_validation->set_message('integer', 'Le %s doit contenir un entier.');
        $this->form_validation->set_message('alpha', 'Le %s ne doit être composé que de lettres.');
        $this->form_validation->set_message('is_unique', 'Le %s est déjà utilisé veuillez en entrer un autre.');
        $this->form_validation->set_message('min_length', 'Le %s doit contenir au moins %s caractères');

        $config = array(
            array(
                'field' => 'civilite',
                'label' => 'champs civilite',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'nom',
                'label' => 'nom d\'utilisateur',
                'rules' => 'trim|required|xss_clean|alpha'
            ),
            array(
                'field' => 'prenom',
                'label' => 'prénom',
                'rules' => 'trim|required|xss_clean|alpha'
            ),
            array(
                'field' => 'pseudo',
                'label' => 'pseudo',
                'rules' => 'trim|required|xss_clean|is_unique[utilisateur.pseudo]'
            ),
            array(
                'field' => 'mdp',
                'label' => 'mot de passe',
                'rules' => 'trim|require|xss_clean|matches[mdp2]|min_length[8]'
            ),
            array(
                'field' => 'mdp2',
                'label' => 'second mot de passe',
                'rules' => 'trim|required|xss_clean|min_length[8]'
            ),
            array(
                'field' => 'e-mail',
                'label' => 'e-mail',
                'rules' => 'trim|xss_clean|matches[e-mail2]|valid_email|is_unique[utilisateur.e-mail]'
            ),
            array(
                'field' => 'e-mail2',
                'label' => 'second e-mail',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'telephone',
                'label' => 'numéro de téléphone',
                'rules' => 'trim|required|xss_clean|exact_length[10]'
            ),
            array(
                'field' => 'Naissance',
                'label' => 'champs date de naissance',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'naissance',
                'label' => 'date de naissance',
                'rules' => 'trim|xss_clean|callback_valid_date'
            ),
            array(
                'field' => 'adresse',
                'label' => 'champ adresse',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'code_postal',
                'label' => 'code postale',
                'rules' => 'trim|xss|clean|exact_length[5]|integer'
            ),
            array(
                'field' => 'ville',
                'label' => 'champs \'ville\' ',
                'rules' => 'trim|xss_clean|alpha'
            ),
            array(
                'field' => 'situation',
                'label' => 'champs \'situation\'',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'nombre_enfants',
                'label' => 'nombre d\'enfants\'',
                'rules' => 'trim|xss_clean|integer'
            ),
            array(
                'field' => 'stations_favorites',
                'label' => 'champs\'destinations favorites\'',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'activites_favorites',
                'label' => 'champs \'activites favorites\'',
                'rules' => 'trim|xss_clean'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {

            //Erreur lore de l'enregistrement, utilisateur redirigé ver la page.

            $this->load->view('required/links');
            $this->load->view('register/register_view', $this->register_model->get_data());
            $this->load->view('required/footer');
        } else {
            //Les étapes de l'enregistrement se sont bien passé
            //Reste à insérer l'info dans la table ...
            if (!$this->insert_user()) {
                die(show_error('Erreur lors de l\'enregistrement, veuillez nous contacter, et réessayer plus tard'));
            }
            redirect('Register/register_success', 'refresh');
        }
    }

    function valid_date($date) {
        if (isset($date)) {
            $day = (int) substr($date, 0, 2);
            $month = (int) substr($date, 3, 2);
            $year = (int) substr($date, 6, 4);
            if (checkdate($month, $day, $year)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('valid_date', 'Le format de la date est incorrect');
                return false;
            }
        }else{
            return TRUE;
        }
    }

    function chage_date_format() {
        $date = $_POST['naissance'];
        $day = (int) substr($date, 0, 2);
        $month = (int) substr($date, 3, 2);
        $year = (int) substr($date, 6, 4);
        $date = $year . '/' . $month . '/' . $day;
        $_POST['naissance'] = $date;
    }

    function insert_user() {
        //Enregistrement des variables à réutiliser
        if (isset($_POST['destinations']))
            $destinations = $_POST['destinations'];

        if (isset($_POST['activite']))
            $actvite = $_POST['activite'];



        //Suppression des variables inutiles
        $this->unset_useless();

        //Changement du format de la date
        if(isset($_POST['naissance'])){
            $this->chage_date_format();
        }

        //Modification de certaines variables
        $_POST['mdp'] = md5($_POST['mdp']);
        $_POST['type_usr'] = 'simple';
        
        
        //---------------------------------//
        //      Ajout dans la BDD          //
        //---------------------------------//
        $result = $this->user_model->register($_POST);

        //Ajout des clées etrangères
        if (isset($destinations))
            foreach ($destinations as $value) {
                $this->user_model->add_favorite_station($_POST['pseudo'], $value);
            }


        if (isset($activite))
            foreach ($actvite as $value) {
                $this->user_model->add_favorite_activite($_POST['pseudo'], $value);
            }

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function unset_useless() {
        unset($_POST['mdp2']);
        unset($_POST['e-mail2']);
        unset($_POST['accept']);
        unset($_POST['destinations']);
        unset($_POST['activite']);

        $civilite = $_POST['civilite'];
        if ($civilite == 'mademoiselle') {
            unset($_POST['nombre_enfants']);
        }

        $this->set_avatar();

        //Mettre à NULL toutes les variables qui n'ont pas de valeur
        if ($_POST['naissance'] == '') {
            unset($_POST['naissance']);
        }

        if ($_POST['ville'] == '') {
            unset($_POST['ville']);
        }

        if ($_POST['adresse'] == '') {
            unset($_POST['adresse']);
        }

        if ($_POST['code_postal'] == '') {
            unset($_POST['code_postal']);
        }

        if (isset($_POST['nombre_enfants'])) {
            if ($_POST['nombre_enfants'] == 0) {
                unset($_POST['nombre_enfants']);
            }
        } else {
            unset($_POST['nombre_enfants']);
        }

        if ($_POST['emploi'] == '') {
            unset($_POST['emploi']);
        }
    }

    function set_avatar() {
        if (isset($_POST['radio_homme']) || isset($_POST['radio_femme'])) {
            $civilite = $_POST['civilite'];
            if ($civilite == 'monsieur') {
                unset($_POST['radio_femme']);
                $avatar = $_POST['radio_homme'];
                unset($_POST['radio_homme']);
                $_POST['url_avatar'] = base_url() . 'assets/others/images/avatars/hommes/' . $avatar . '.png';
            } else {
                unset($_POST['radio_homme']);
                $avatar = $_POST['radio_femme'];
                unset($_POST['radio_femme']);
                $_POST['url_avatar'] = base_url() . 'assets/others/images/avatars/femmes/' . $avatar . '.png';
            }
        }
    }

}
