<?php 
namespace Controllers;
use \Core\Controller;
use \Models\Clientes;

class homeController extends Controller{

    public function index(){
        $c = new Clientes();
        $data['modulo']='home';
 
        $data['nomeCliente']=$c->nomeCliente($this->idConta());
       $this->loadTemplate('home/home',$data);
    }
}