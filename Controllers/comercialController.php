<?php 
namespace Controllers;
use \Core\Controller;

class comercialController extends Controller{

    public function index(){
       $data['modulo']='comercial';
       $this->loadTemplate('comercial/comercial',$data);
    }
}