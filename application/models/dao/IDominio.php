<?php defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . "models/IDao.php");

interface IDominio extends IDao {
    public function buscarDescrPorDominio($dominio);
    public function buscarListaDominios($dominio);
}