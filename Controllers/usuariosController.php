<?php 
namespace Controllers;
use \Core\Controller;
use \Models\Vagas;
use \Models\Users;
use \Models\Configuracoes;

class usuariosController extends Controller{

    public function index(){
        $u = new Users();
        $data['modulo']='usuarios';
        $data['tela']='usuarios';
        $data['usuarios']=$u->UsersAccountByStatus($this->idConta(),1);
        $this->loadTemplate('usuarios/main',$data);
    }

    public function novoUsuario(){
        $v = new Vagas();
        $c= new Configuracoes();
        $data['idConta']=$this->idConta();
        $data['funcoes']=$v->listarFuncao($this->idConta());
        $data['hierarquias']=$v->listarHierarquia($this->idConta());
        $data['celulas']=$c->listCelulasUsuarios();
        $data['perfis']=$c->listPerfisUsuarios();
        $this->loadView('usuarios/novoUsuario',$data);
    }

    public function cadastraUsuario(){
        $u = new Users();
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $nasc = $_POST['nasc'];
        $funcao = $_POST['funcao'];
        $especialidade = $_POST['especialidade'];
        $hierarquia = $_POST['hierarquia'];
        $celula = $_POST['celula'];
        $rspSelecao = $_POST['rspSelecao'];
        $rspComercial = $_POST['rspComercial'];
        $perfil = $_POST['perfil'];

        $data['msg']=$u->novoUsuario($this->idConta(),$nome,$email,$cpf,$nasc,$funcao,$especialidade,$hierarquia,$celula,$rspSelecao,$rspComercial,$perfil);
        $this->loadView('usuarios/concluiCadastro',$data);

    }

    public function nomeFuncao($idFuncao){
        $v = new Vagas();
        return $v->nomeFuncao($idFuncao);
    }

    public function nomePerfil($idPerfil){
        $u = new Users();
        return $u->nomePerfil($idPerfil);
    }

    public function abrirUsuario(){
        $u = new Users();
        $v = new Vagas();
        $c = new Configuracoes();
        $idUsuario=$_POST['idUsuario'];
        $data['infoUser']=$u->getInfo($idUsuario);
        $data['funcoes']=$v->listarFuncao($this->idConta());
        $data['hierarquias']=$v->listarHierarquia($this->idConta());
        $data['celulas']=$c->listCelulasUsuarios();
        $data['perfis']=$c->listPerfisUsuarios();
        $this->loadView('usuarios/abrirUsuario',$data);
    }

    public function salvaAlteracoesUsuario(){
        $u = new Users();
        $idUser=$_POST['idUsuario'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $nasc = $_POST['nasc'];
        $funcao = $_POST['funcao'];
        $especialidade = $_POST['especialidade'];
        $hierarquia = $_POST['hierarquia'];
        $celula = $_POST['celula'];
        $rspSelecao = $_POST['rspSelecao'];
        $rspComercial = $_POST['rspComercial'];
        $perfil = $_POST['perfil'];
        echo $u->salvaAlteracoesUsuario($idUser,$nome,$email,$cpf,$nasc,$funcao,$especialidade,$hierarquia,$celula,$rspSelecao,$rspComercial,$perfil);
    }

    public function resetSenha(){
        $data['idUser']=$_POST['idUser'];
        $this->loadView('usuarios/resetSenha',$data);
    }

}