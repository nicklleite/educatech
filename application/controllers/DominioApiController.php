<?php defined('BASEPATH') OR exit('No direct script access allowed');

require("ApiController.php");

class DominioApiController extends ApiController {

    public function __construct() {
        parent::__construct();

        ApiController::init(FALSE);
        $this->load->model('DominioModel', 'dominio', TRUE);
    }

    public function index() {
        
    }

    public function buscarTodos() {
        header("Content-Type: application/json");
        $q = $this->dominio->buscar();
        $data = array();
        
        foreach ($q->result() as $row) {
            $data[$row->id] = $row->vl . " => " . $row->descr;
            // $data[$row->id] = array (
            //     $row->vl => $row->descr
            // );
            // $data[$row->dominio] = $row->descr;
        }
        
        echo utf8_decode(json_encode($data));
    }

    public function buscarPorDescr($dominio) {

        if (is_string($dominio) && $dominio != "") {
            header("Content-Type: application/json");
            $q = $this->dominio->buscarPorDescr($dominio);
            $data = array();
            
            if ($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                    // echo "<pre>";print_r($row);echo "</pre>";
                    // $data[$row->vl] = $row->descr;
                    $data[$row->id] = array (
                        $row->vl => $row->descr
                    );
                }
            } else {
                $data["-1"] = "Nenhum registro encontrado!";
            }
            
            echo json_encode($data);
        } else {

        }

    }


    public function getDominioFilter($filter, $keyword) {

    }
}