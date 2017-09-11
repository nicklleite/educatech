<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DominioModel extends CI_Model {

    public function buscar() {
        $query = $this->db->get("dominio");
        return $query;
    }

    public function buscarPorDescr($dominio) {
        $this->db->where("dominio", $dominio);
        $query = $this->db->get("dominio");
        return $query;
    }

}