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
            // $data = $q->result_array();
        } else {
            $data["resposta"] = 404;
            $data["mensagem"] = "Nenhum registro encontrado!";
        }
        
        echo json_encode($data);
    }

    public function buscarPorDescr($dominio) {
        header("Content-Type: application/json");

        $data = array();
        if (isset($dominio) && $dominio != "") {
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
                $data["resposta"] = 404;
                $data["mensagem"] = "Nenhum registro encontrado!";
            }
        }

        echo json_encode($data);
    }
}