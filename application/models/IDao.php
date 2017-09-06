<?php defined('BASEPATH') OR exit('No direct script access allowed');

interface IDao {
    public function buscarTodos($table);
    public function buscarTodosPaginados($table, $pagina, $maximoRegistros);
    public function recuperarPorId($table, $id);
}