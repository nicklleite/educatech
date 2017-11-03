<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InstituicaoModel extends CI_Model {

	/**
     * Método de consulta dos dados da tabela INSTITUICAO.
     * 
     * @return CI_DB_result
     * @see https://www.codeigniter.com/userguide3/database/query_builder.html
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\models
     * @since v0.0.3
     * @version v0.0.3
     */
	public function buscar() {
		$this->db->order_by('')
		$query = $this->db->get("instituicao");
		return $query;
	}

}