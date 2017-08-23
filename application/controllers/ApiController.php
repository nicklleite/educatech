<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    /**
     * Mensagens de debug da aplicação
     * 
     * @var string
     */
    private $debugMessage;

    /**
     * Aqui vamos nós...
     */
    public function __construct() {
        parent::__construct();

        $this->registerLog("info", date("d/m/Y H:i:s") . " - [INFO] - Iniciando aplicação!");
    }

    /**
     * Inicia todas as configurações e conexões dos serviços.
     * 
     * @param string debug Indica se o debug está ou não ativo.
     * @return void
     */
    public function init($debug = FALSE) {
        $this->openConnection();
        if ($debug) {
            echo "<pre>";print_r($this->getDebugMessage());echo "</pre>";
        }
    }

    /**
     * Abre uma nova conexão com o banco de dados, com os
     * dados fornecidos no arquivo /application/config/database.php
     * 
     * @return void
     */
    private function openConnection() {
        try {
            if ($this->load->database()) {
                $this->registerLog("info", date("d/m/Y H:i:s") . " - [INFO] - Conexão realizada com sucesso!");
            }
        } catch (Exception $e) {
            $this->registerLog("error", date("d/m/Y H:i:s") . " - [ERROR] - Erro ao tentar se conectar com o banco de dados! | Exceção: " + $e->getMessage());
        }
    }

    /**
     * Encerra uma conexão com o banco de dados
     * 
     * @return void
     */
    private function closeConnection() {
        try {
            if ($this->load->database()) {
                $this->database->close();
                $this->registerLog("info", date("d/m/Y H:i:s") . " - [INFO] - Conexão finalizada com sucesso!");
            } else {
                $this->registerLog("info", date("d/m/Y H:i:s") . " - [INFO] - Conexão não iniciada!");
            }
        } catch (Exception $e) {
            $this->registerLog("error", date("d/m/Y H:i:s") . " - [ERROR] - Erro ao encerrar a conexão com o banco de dados! | Exceção: " + $e->getMessage());
        }
    }

    // HELPERS
    private function registerLog($level, $msg) {
        log_message($level, $msg);
        $this->setDebugMessage($msg);
    }

    // GETTERs & SETTERs
    public function getDebugMessage() {
        if (!isset($this->debugMessage)) {
            $this->debugMessage = "";
        }
        return $this->debugMessage;
    }
    public function setDebugMessage($debugMessage) {
        $this->debugMessage .= $debugMessage . "\n";
    }
}