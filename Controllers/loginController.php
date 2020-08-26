<?php 
namespace Controllers;
use \Core\Controller;
use \Models\Users;

class loginController extends Controller{

    public function index(){
        $data = array();
        if(isset($_POST['username']) && !empty($_POST['username'])){
            $u = new Users();
            
            $username = $_POST['username'];
            $password = $_POST['pass'];

            if($u->autenticar($username,$password)==true){
                header('Location: '.LINK);
                exit();
            }else{
                $data['error']='Usuário e/ou senha inválido(s)!';
            }
        }
        
        $this->loadView('login',$data);
    }

    public function forgotPassword(){
		echo "Função em desenvolvimento";
		//criar view
	}

	public function sair(){
		$u = new Users();
		$u->sair($_COOKIE['userId_people']);
		header('Location: '.BASE_URL);
		exit;
	}
}