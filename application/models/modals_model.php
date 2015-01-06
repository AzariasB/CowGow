<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modals_model
 *
 * @author Azarias
 */
class modals_model extends CI_Controller {

    private function filter_array(&$array) {
        foreach ($array as $key => $value) {
            if ($value == NULL or $value = '') {
                unset($array[$key]);
            }
        }
    }

    /*
     * Cette fonction est utilisé par toute les autres qui veulent avoir accès à la BDD :
     *  - Elle permet de récupérer les infos de la table $table_name.$column_name
     *  - Tout en faisant le lien entre la table et les activites disponibles pour accéder au lieu
     *  - Si l'id n'est pas donnée, on ne fait pas le lien avec 'service'
     */

    function recup_infos(&$infos) {
        $this->db->select($infos['column_name']);
        if ($infos['column_id'] != NULL) {
            $this->db->from($infos['table_name'] . ',Service s');
            $this->db->where($infos['column_id'] ." = s.IDService");
        } else {
            $this->db->from($infos['table_name']);
        }


        $result = $this->db->get()->result();

        foreach ($result as $key => $value) {
            $result[$key] = (array) $value;
            $result[$key] = $result[$key][$infos['column_name']];
        }

        $this->filter_array($result);

        return $result;
    }

}
