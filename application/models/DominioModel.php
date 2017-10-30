<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DominioModel extends CI_Model {

    /**
     * Método para consulta e retorno dos registros da tabela DOMINIO
     * 
     * @return CI_DB_result
     * @see https://www.codeigniter.com/userguide3/database/query_builder.html
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\models
     * @since v0.0.0
     * @version v0.0.3
     */
    public function buscar() {
        $query = $this->db->get("dominio");
        return $query;
    }

    /**
     * Função que retorna todos os registros de domínios, com base em um
     * parâmetro.
     * 
     * @param string $dominio
     * @return CI_DB_result
     * @see https://www.codeigniter.com/userguide3/database/query_builder.html
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\models
     * @since v0.0.0
     * @version v0.0.3
     */
    public function buscarPorDescr($dominio) {
        $this->db->where("dominio", $dominio);
        $this->db->order_by('vl', 'ASC');
        $query = $this->db->get("dominio");
        return $query;
    }
}