<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GenericImpl extends CI_Model {

    /**
     * var $tabela
     * string
     * 
     * Armazena o nome da tabela a ser utilizada.
     */
    private $tabela = "";

    /**
     * Método construtor
     * 
     * @param $tabela: Recebe a tabela que será utilizada.
     */
    public function __construct($tabela) {
        $this->tabela = $tabela;
    }

    public function buscarTodos() {

    }

    public function buscarTodosPaginados($pagina, $maximoRegistros) {

    }

    public function recuperarPorId($id) {

    }
}