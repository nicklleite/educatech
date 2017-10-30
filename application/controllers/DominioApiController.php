<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DominioApiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DominioModel', 'dominio', TRUE);
    }

    public function getAll() {
        header("Content-Type: application/json");

        $q = $this->dominio->buscar();
        $data = array();
        
        if ($q->num_rows() > 0) {
            // Exibe os dados agrupados por domínio.
            // foreach ($q->result() as $row) {
            //     $q2 = $this->dominio->buscarPorDescr($row->dominio);
            //     $data[$row->dominio] = array();

            //     foreach ($q2->result() as $row2) {
            //         array_push($data[$row->dominio], array($row2->vl => $row2->descr));
            //     }
            // }
            $data = $q->result_array();
        } else {
            $data["resposta"] = 404;
            $data["mensagem"] = "Nenhum registro encontrado!";
        }
        
        echo json_encode($data);
    }

    public function getByDominio($dominio) {
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