<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DominioApiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DominioModel', 'dominio', TRUE);
    }

    /**
     * Função que retorna todos os registros de domínios.
     * Método HTTP: GET
     * 
     * @return void
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\controllers
     * @since v0.0.0
     * @version v0.0.3
     */
    public function getAll() {
        header("Content-Type: application/json");

        $q = $this->dominio->buscar();
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
     * Função que retorna todos os registros de domínios, com base em um
     * parâmetro.
     * Método HTTP: GET
     *
     * @param string $dominio
     * @return void
     *
     * @author Nicholas Leite <nicklleite@gmail.com>
     * @package application\controllers
     * @since v0.0.0
     * @version v0.0.3
     */
    public function getByDominio($dominio) {
        header("Content-Type: application/json");

        if (isset($dominio) && $dominio != "") {
            $data = array();
            $q = $this->dominio->buscarPorDescr($dominio);
            
            if ($q->num_rows() > 0) {
                $data = $q->result_array();
            } else {
                $data["resposta"] = 404;
                $data["mensagem"] = "Nenhum registro encontrado!";
            }
        }

        echo json_encode($data);
    }
}