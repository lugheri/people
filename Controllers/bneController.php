<?php 
namespace Controllers;
use \Core\Controller;

class bneController extends Controller{

    public function index(){
       $data['modulo']='bne';
       $this->loadTemplate('bne/bne',$data);
    }
}