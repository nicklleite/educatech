<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    /**
     * Mensagens de debug da aplicação
     * 
     * @var string
     */
    private $debugMessage;

    /**
     * Inicia todas as configurações e conexões dos serviços.
     * 
     * @param string debug Indica se o debug está ou não ativo.
     * @return void
     */
    public function init($debug = FALSE) {
        $this->testConnection();
        $this->print($print);
    }

    private function testConnection() {
        try {
            if ($this->load->database()) {
                $this->print("Conexão com o banco bem sucedida!");
            }
        } catch (Exception $e) {
            $this->setDebugMessage("Erro ao tentar se conectar com o banco de dados! [ERRO] ==> " + $e->getMessage());
        }
    }

    private function print($var = "EMPTY") {
        echo $var;
    }

    // GETTERs & SETTERs
    public function getDebugMessage() {
        if (!isset($this->debugMessage) || $this->debugMessage == NULL) {
            $this->debugMessage = "";
        }
        return $this->debugMessage;
    }
    public function setDebugMessage($debugMessage) {
        $this->debugMessage = $debugMessage;
    }
}