<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InstituicaoApiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InstituicaoModel', 'instituicao', TRUE);
    }

    /**
     * Action para o retorno de dados de Instituição
     * Método HTTP: GET
     * 
     * @return void
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\controllers
     * @since v0.0.3
     * @version v0.0.3
     */
    public function buscarInstituicoes() {
        header("Content-Type: application/json");

        $q = $this->instituicao->buscar();
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