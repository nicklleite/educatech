<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CidadeApiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CidadeModel', 'cidade', TRUE);
    }

    /**
     * Função que retorna todos as cidades.
     * Método HTTP: GET
     * 
     * @return void
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\controllers
     * @since v0.0.3
     * @version v0.0.3
     */
    public function buscarCidades() {
        header("Content-Type: application/json");

        $q = $this->cidade->buscar();
        $data = array();
        
        if ($q->num_rows() > 0) {
            $data = $q->result_array();
        } else {
            $data["resposta"] = 404;
            $data["mensagem"] = "Nenhum registro encontrado!";
        }
        
        echo json_encode($data);
    }

    /**
     * Função que retorna todos as cidades com base no ID do estado.
     * Método HTTP: GET
     *
     * @param integer $estadoId
     * @return void
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\controllers
     * @since v0.0.3
     * @version v0.0.3
     */
    public function buscarCidadesPorEstado($estadoId) {
        header("Content-Type: application/json");

        $q = $this->cidade->buscarPorEstado($estadoId);
        $data = array();
        
        if ($q->num_rows() > 0) {
            $data = $q->result_array();
        } else {
            $data["resposta"] = 404;
            $data["mensagem"] = "Nenhum registro encontrado!";
        }
        
        echo json_encode($data);
    }

    /**
     * Função que retorna todos as cidades com base no código do IBGE.
     * Método HTTP: GET
     *
     * @param integer $codIbge
     * @return void
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\controllers
     * @since v0.0.3
     * @version v0.0.3
     */
    public function buscarCidadesPorCodIbge($codIbge) {
        header("Content-Type: application/json");

        $q = $this->cidade->buscarPorCodIbge($codIbge);
        $data = array();
        
        if ($q->num_rows() > 0) {
            $data = $q->result_array();
        } else {
            $data["resposta"] = 404;
            $data["mensagem"] = "Nenhum registro encontrado!";
        }
        
        echo json_encode($data);
    }
}