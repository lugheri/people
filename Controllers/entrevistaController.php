<?php 
namespace Controllers;
use \Core\Controller;

class entrevistaController extends Controller{

    public function index(){
       $data['modulo']='entrevista';
       $this->loadTemplate('entrevista/entrevista',$data);
    }
}