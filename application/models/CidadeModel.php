<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CidadeModel extends CI_Model {

	/**
     * Método para consulta e retorno dos registros da tabela CIDADE
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
		$this->db->order_by('cidade', 'ASC');
		$query = $this->db->get('cidade');
		return $query;
	}

	/**
     * Função que retorna todos os registros de cidades, com base em um
     * parâmetro.
     * 
     * @param integer $estadoId
     * @return CI_DB_result
     * @see https://www.codeigniter.com/userguide3/database/query_builder.html
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\models
     * @since v0.0.3
     * @version v0.0.3
     */
    public function buscarPorEstado($estadoId) {
        $this->db->where("estado_id", $estadoId);
        $this->db->order_by('cidade', 'ASC');
        $query = $this->db->get("cidade");
        return $query;
    }

    /**
     * Função que retorna todos os registros de cidades, com base em um
     * parâmetro.
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
        $this->db->order_by('cidade', 'ASC');
        $query = $this->db->get("cidade");
        return $query;
    }
}