<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InstituicaoModel extends CI_Model {

	public function getAll() {
		$query = $this->db->get("instituicao");
		return $query;
	}

}