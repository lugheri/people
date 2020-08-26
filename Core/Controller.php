<?php
namespace Core;
use \Core\Models;
use \Models\Users;

class Controller{
    public function isLogged(){
        $u = new Users();
        //verificacao de login
        $u->checaLogin();        
    }
    
    public function loadView($viewName,$viewData = array()){
        extract($viewData);
        include 'Views/screens/'.$viewName.'.php';
    }

    public function loadTemplate($viewName,$viewData = array()){
        //dados do sistema
        $viewData+=$this->dadosSistema();
        extract($viewData);
        include 'Views/template.php';
    }

    public function loadViewInTemplate($viewName,$viewData){
        extract($viewData);
        include 'Views/screens/'.$viewName.'.php';
    }

    /**EDITOR DE PAGINA */
    public function loadEditorView($viewName,$viewData = array()){
        extract($viewData);
        include 'Views/Editor/screens/'.$viewName.'.php';
    }

    public function loadEditorTemplate($viewName,$viewData = array()){
        //dados do sistema
        $viewData+=$this->dadosSistema();
        extract($viewData);
        include 'Views/Editor/template.php';
    }

    public function loadViewInEditorTemplate($viewName,$viewData){
        extract($viewData);
        include 'Views/Editor/screens/'.$viewName.'.php';
    }


    

    //Carregar dados do sistema
    public function dadosSistema(){
        $this->isLogged();
        //DADOS DO USUARIO
        $user=explode(':',base64_decode($_COOKIE['userId_people']));
        $data['userId'] = $user[0];
        $data['userName'] = $user[1];
        $data['userMail'] = $user[2];
        $data['account'] = $user[3];
        $data['modulo']='home';
        $data['tela']='inicio';
        
        return $data;
    }

    public function idConta(){
        if(isset($_COOKIE['userId_people'])){
            $user=explode(':',base64_decode($_COOKIE['userId_people']));
            return $user[3];
        }
    }

    public function idUser(){
        if(isset($_COOKIE['userId_people'])){
            $user=explode(':',base64_decode($_COOKIE['userId_people']));
            return $user[0];
        }
    }
    
}