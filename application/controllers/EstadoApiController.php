<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoApiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EstadoModel', 'estado', TRUE);
    }

    /**
     * Função que retorna todos os estados.
     * Método HTTP: GET
     * 
     * @return void
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\controllers
     * @since v0.0.3
     * @version v0.0.3
     */
    public function buscarEstados() {
        header("Content-Type: application/json");

        $q = $this->estado->buscar();
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
     * Função que retorna todos os estados com base no código do IBGE.
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
    public function buscarEstadosPorCodIbge($codIbge) {
        header("Content-Type: application/json");

        $q = $this->estado->buscarPorCodIbge($codIbge);
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