<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once("ApiController.php");

class DominioApiController extends ApiController {

    public function __construct() {
        parent::__construct();

        ApiController::init(FALSE);
        $this->load->model('DominioModel', 'dominio', TRUE);
    }

    public function index() {
        redirect(base_url() . 'api/dominio/todos');
    }

    public function buscarTodos() {
        header("Content-Type: application/json");
        $q = $this->dominio->buscar();
        $data = array();
        
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $q2 = $this->dominio->buscarPorDescr($row->dominio);
                $data[$row->dominio] = array();

                foreach ($q2->result() as $row2) {
                    array_push($data[$row->dominio], array($row2->vl => $row2->descr));
                }
            }
        } else {
            $data["-1"] = "Nenhum registro encontrado!";
        }
        
        echo json_encode($data);
    }

    public function buscarPorDescr($dominio) {
        $data = array();
        if (is_string($dominio) && $dominio != "") {
            header("Content-Type: application/json");
            $q = $this->dominio->buscarPorDescr($dominio);
            
            if ($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                    $q2 = $this->dominio->buscarPorDescr($row->dominio);
                    $data[$row->dominio] = array();

                    foreach ($q2->result() as $row2) {
                        array_push($data[$row->dominio], array($row2->vl => $row2->descr));
                    }
                }
            } else {
                $data["-1"] = "Nenhum registro encontrado!";
            }
        } else {
            $data["-1"] = "Erro na pesquisa!";
        }

        echo json_encode($data);
    }
}