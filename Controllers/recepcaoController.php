<?php 
namespace Controllers;
use \Core\Controller;

class recepcaoController extends Controller{

    public function index(){
       $data['modulo']='recepcao';
       $this->loadTemplate('recepcao/recepcao',$data);
    }
}