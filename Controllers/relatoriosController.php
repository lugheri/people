<?php 
namespace Controllers;
use \Core\Controller;

class relatoriosController extends Controller{

    public function index(){
       $data['modulo']='relatorios';
       $this->loadTemplate('relatorios/relatorios',$data);
    }
}