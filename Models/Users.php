<?php 
namespace Models;
use \Core\Model;

class Users extends Model{
    public function checaLogin(){
        
        if(isset($_COOKIE['userId_people'])&&!empty($_COOKIE['userId_people'])){
			$user=explode(':',base64_decode($_COOKIE['userId_people']));
			return $this->usuarioAtivo($user[0]);
		}else{
            setcookie("userId_people", null, time()-1);
            header('Location: '.LINK.'login/');
			return false;
        }
        
    }

    public function usuarioAtivo($userId){
        $sql = $this->db->prepare("SELECT `id` FROM `users` WHERE `id`=:userId AND `status`=1 LIMIT 1");
        $sql->bindValue(':userId',$userId);
        $sql->execute();

        if($sql->rowCount()>0){
            return true;
        }else{
            return true;
        }
    }

    public function autenticar($username,$password){
        $sql = $this->db->prepare("SELECT `id`,`nome`,`email`,`account` FROM `users` WHERE `email`=:username AND `senha`=:pass AND `status`=1 LIMIT 1");
        $sql->bindValue(':username',$username);
        $sql->bindValue(':pass',md5($password));

        $sql->execute();

        if($sql->rowCount() > 0) {
			$row = $sql->fetch();
			setcookie("userId_people", base64_encode($row['id'].':'.$row['nome'].':'.$row['usuario'].':'.$row['account']), time()+(345600*10),'/'); 
		   
			//$_SESSION['ccUsuario_academia'] = $row['id'];
			$this->registrarLogin($row['id'],'login');
			
			return true;
		} else {
			return false;
		}
	}
	
	public function listarUsuarios($conta){
        $sql = $this->db->prepare("SELECT * FROM `users` WHERE `account`=:conta AND `status`=1");
        $sql->bindValue(':conta',$conta);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function UsersAccountByStatus($idConta,$status){
		$sql = $this->db->prepare("SELECT * FROM `users` WHERE `account`=:idConta AND `status`=:st");
		$sql->bindValue(':idConta',$idConta);
		$sql->bindValue(':st',$status);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function nomeUser($idUser){
        $sql = $this->db->prepare("SELECT `nome` FROM `users` WHERE `id`=:idUser");
        $sql->bindValue(':idUser',$idUser);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['nome'];
	}
	

    public function sair($usuario){		
		$this->registrarLogin($usuario,'logout');
		setcookie("userId_people", null, time()-1,'/');
	}

	public function registrarLogin($idUser,$acao){
		$sql = $this->db->prepare("INSERT INTO  `registrologins`
		                                       (`data`,`idUser`,`acao`) 
		                                VALUES  (now(),:idUser,:acao)");
		$sql->bindValue(':idUser',$idUser);
		$sql->bindValue(':acao',$acao);
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			return $erro[2];
		}else{
			return false;
		}
	}


	public function nomePerfil($idPerfil){
		$sql = $this->db->prepare("SELECT `perfil` FROM `users_perfis` WHERE `id`=:idPerfil");
		$sql->bindValue(':idPerfil',$idPerfil);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['perfil'];
	}




	public function novoUsuario($conta,$nome,$email,$cpf,$nasc,$funcao,$especialidade,$hierarquia,$celula,$rspSelecao,$rspComercial,$perfil){
		//verifica se o email ja esta cadastrado
		$sql = $this->db->prepare("SELECT `id` FROM `users` WHERE `cpf`=:cpf OR `email`=:email LIMIT 1");
		$sql->bindValue(':cpf',$cpf);
		$sql->bindValue(':email',$email);
		$sql->execute();
		if($sql->rowCount()==1){
			return '<p class="h1 text-danger"><i class="fas fa-times"></i></p><p class="h4 text-secondary">Usuário ja cadastrado!</p>';
		}else{
			$sql=$this->db->prepare("INSERT INTO `users`
			                                    (`account`,`criadoEm`,`nome`,`email`,`cpf`,`nasc`,`funcao`,`especialidade`,`hierarquia`,`celula`,`rspSelecao`,`rspComercial`,`perfil`,`senha`,`reset`,`status`)
										 VALUES (:conta,now(),:nome,:email,:cpf,:nasc,:funcao,:especialidade,:hierarquia,:celula,:rspSelecao,:rspComercial,:perfil,:pass,:resetPass,:userStatus)");
			$sql->bindValue(':conta',$conta);
			$sql->bindValue(':nome',$nome);
			$sql->bindValue(':email',$email);
			$sql->bindValue(':cpf',$cpf);
			$sql->bindValue(':nasc',$nasc);
			$sql->bindValue(':funcao',$funcao);
			$sql->bindValue(':especialidade',$especialidade);
			$sql->bindValue(':hierarquia',$hierarquia);
			$sql->bindValue(':celula',$celula);
			$sql->bindValue(':rspSelecao',$rspSelecao);
			$sql->bindValue(':rspComercial',$rspComercial);
			$sql->bindValue(':perfil',$perfil);
			$sql->bindValue(':pass',md5('1234abc@'));
			$sql->bindValue(':resetPass',1);
			$sql->bindValue(':userStatus',1);

			if($sql->execute()===false){
				$error = $sql->errorInfo();
				return '<p class="h1 text-danger"><i class="fas fa-times"></i></p><p class="h4 text-secondary">Ocorreu um erro ao cadastrar o usuário!</p><small>'.$error[2].'</small>';
			}else{
				return '<p class="h1 text-success"><i class="fas fa-check"></i></p><p class="h4 text-secondary">Usuário cadastrado com sucesso!</p>
						<small>A senha inicial será <b>1234abc@</b> e deverá ser alterada no primeiro acesso!</small>';
			}

		}
	}

	public function getInfo($idUser){
		$sql=$this->db->prepare("SELECT * FROM `users` WHERE `id`=:idUser");
		$sql->bindValue(':idUser',$idUser);
		$sql->execute();
		return $sql->fetch();
	}

	public function salvaAlteracoesUsuario($idUser,$nome,$email,$cpf,$nasc,$funcao,$especialidade,$hierarquia,$celula,$rspSelecao,$rspComercial,$perfil){
		//verifica se o cpf ja foi utilizado em outro usuario
		$sql = $this->db->prepare("SELECT `id` FROM `users` WHERE `id`!=:idUser AND (`cpf`=:cpf OR `email`=:email) LIMIT 1");
		$sql->bindValue(':idUser',$idUser);
		$sql->bindValue(':cpf',$cpf);
		$sql->bindValue(':email',$email);
		$sql->execute();
		if($sql->rowCount()==1){
			return '<br/><div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Dados já cadastrados!</strong> O email ou cpf alterado já esta cadastrado em outro usuário!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
			        </div>';
		}else{
			$sql = $this->db->prepare("UPDATE `users` 
			                              SET `alteradoEm`=now(),
										      `nome`=:nome,
											  `email`=:email,
											  `cpf`=:cpf,
											  `nasc`=:nasc,
											  `funcao`=:funcao,
											  `especialidade`=:especialidade,
											  `hierarquia`=:hierarquia,
											  `celula`=:celula,
											  `rspSelecao`=:rspSelecao,
											  `rspComercial`=:rspComercial,
											  `perfil`=:perfil
										WHERE `id`=:idUser");
			$sql->bindValue(':idUser',$idUser);
			$sql->bindValue(':nome',$nome);
			$sql->bindValue(':email',$email);
			$sql->bindValue(':cpf',$cpf);
			$sql->bindValue(':nasc',$nasc);
			$sql->bindValue(':funcao',$funcao);
			$sql->bindValue(':especialidade',$especialidade);
			$sql->bindValue(':hierarquia',$hierarquia);
			$sql->bindValue(':celula',$celula);
			$sql->bindValue(':rspSelecao',$rspSelecao);
			$sql->bindValue(':rspComercial',$rspComercial);
			$sql->bindValue(':perfil',$perfil);
			if($sql->execute()===false){
				$error=$sql->errorInfo();
				return '<br/><div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Ocorreu um erro ao salvar os dados!</strong> '.$error[2].'!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
			        </div>';
			}else{
				return '<br/><div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong><i class="fas fa-save"></i></strong> Dados alterados com sucesso!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
			        </div>';
			}
		}
	}
}