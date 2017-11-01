<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoModel extends CI_Model {

	/**
     * Método de consulta dos dados da tabela ESTADO.
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
		$this->db->order_by('estado', 'ASC');
		$query = $this->db->get('estado');
		return $query;
	}

	/**
     * Método de consulta de dados da tabela ESTADO com base no código IBGE.
     * 
     * @param integer $codIbge
     * @return CI_DB_result
     * @see https://www.codeigniter.com/userguide3/database/query_builder.html
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\models
     * @since v0.0.3
     * @version v0.0.3
     */
    public function buscarPorCodIbge($codIbge) {
        $this->db->where("cod_ibge", $codIbge);
        $this->db->order_by('estado', 'ASC');
        $query = $this->db->get("estado");
        return $query;
    }
}