<?php 
namespace Models;
use \Core\Model;

class Candidatos extends Model{
	public function candidatosDeHoje($idConta){
		$sql = $this->db->prepare("SELECT COUNT(id) as `total`
		                            FROM `candidato_informacoes` 
								   WHERE `idCliente`=:idConta
								     AND `status`=1
									 AND `salvo`=1
									 AND `desde` LIKE :hoje");
		$sql->bindValue(':idConta',$idConta);
		$sql->bindValue(':hoje',date('Y-m-d').'%');
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['total'];
	}



	public function genero($idConta,$genero){
		$sql = $this->db->prepare("SELECT COUNT(i.id) as `total`
		                            FROM `candidato_dadospessoais` AS `dp`
									JOIN `candidato_informacoes` AS `i`
									  ON i.id=dp.idCandidato
								   WHERE i.idCliente=:idConta
								     AND sexo =:genero");
		$sql->bindValue(':idConta',$idConta);
		$sql->bindValue(':genero',$genero);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['total'];
	}

	public function topCidades($idConta){
		$sql = $this->db->prepare("SELECT e.cidade, COUNT(i.id) AS `total`
		                             FROM `candidato_endereco` AS `e`
									 JOIN `candidato_informacoes` AS `i`
									   ON e.idCandidato=i.id
									WHERE i.idCliente=:idConta
									  AND e.cidade is not null
								 GROUP BY e.cidade
								 ORDER BY `total` DESC
									LIMIT 3");
		$sql->bindValue(':idConta',$idConta);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function topFuncoes($idConta){
		$sql = $this->db->prepare("SELECT o.idFuncao, COUNT(o.id) AS `total`
		                             FROM `candidato_lista_objetivos` AS `o`
									 JOIN `candidato_informacoes` AS `i`
									   ON o.idCandidato=i.id
									WHERE i.idCliente=:idConta
								 GROUP BY o.idFuncao
									LIMIT 12");
		$sql->bindValue(':idConta',$idConta);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function faixaIdade($idConta,$filtro_de,$filtro_ate){
		$sql = $this->db->prepare("SELECT COUNT(d.id) AS `total`
		                             FROM `candidato_dadospessoais` AS `d`
									 JOIN `candidato_informacoes` AS `i`
									   ON d.idCandidato=i.id
									WHERE i.idCliente=:idConta
									  AND nascimento > '$filtro_de' AND nascimento < '$filtro_ate'");
		$sql->bindValue(':idConta',$idConta);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['total'];
	}

    public function totalCandidatos($conta,$status){
		$qry="SELECT COUNT(`id`) AS `total` FROM `candidato_informacoes` WHERE `idCliente`=:conta AND `status`=:st AND `salvo`=1";

        $sql = $this->db->prepare($qry);
        $sql->bindValue(':conta',$conta);
        $sql->bindValue(':st',$status);

		$sql->execute();
		$rs= $sql->fetch();
		return $rs['total'];
	}

	public function totalCandidatosFiltrados($idCliente,$filtros,$status){
		$filtro="";
		$qry = "SELECT COUNT(DISTINCT(i.id)) AS `total`
		          FROM `candidato_informacoes` AS `i`
		          JOIN `candidato_dadospessoais` AS `dp`
		            ON i.id=dp.idCandidato 
		          JOIN `candidato_endereco` AS `e`
		            ON i.id=e.idCandidato
			 LEFT JOIN `candidato_objetivosprofissionais` as `o`
				    ON i.id=o.idCandidato
			 LEFT JOIN `candidato_lista_objetivos` as `lo`
				    ON i.id=lo.idCandidato
			LEFT JOIN `vagas_lista_funcao` as `f`
				    ON f.id=lo.idFuncao
			LEFT JOIN `vagas_lista_hierarquia` as `h`
				    ON h.id=lo.idHierarquia
			 LEFT JOIN `candidato_escolaridade` as `es`
				    ON i.id=es.idCandidato
				 WHERE i.idCliente=:idCliente
				   AND i.status=:st";
		$filtro="";
		/*FILTROS*/
		//Pretencao Salarial
		if(!empty($filtros['salario_de'])){ $filtro.=" AND o.pretencaoSalarial >= $filtros[salario_de]";}
		if(!empty($filtros['salario_ate'])){ $filtro.=" AND o.pretencaoSalarial <= $filtros[salario_ate]";}

		//Dados Gerais

		//Profissional

		//Pessoal

		//Escolaridade

		//Localizacao
		if(!empty($filtros['estado'])){ $filtro.=" AND e.estado = '$filtros[estado]'";}
		if(!empty($filtros['cidade'])){ $filtro.=" AND e.cidade = '$filtros[cidade]'";}


		$consulta=$qry.$filtro;
		
        $sql = $this->db->prepare($consulta);
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':st',$status);

		$sql->execute();
		$rs= $sql->fetch();
		return $rs['total'];
	}
	
	public function filtrarCandidatos($idCliente,$filtros,$ordenacao,$inicio,$limite,$status){
		$filtro="";
		$qry = "SELECT DISTINCT(i.id)
		          FROM `candidato_informacoes` AS `i`
		          JOIN `candidato_dadospessoais` AS `dp`
		            ON i.id=dp.idCandidato 
		          JOIN `candidato_endereco` AS `e`
		            ON i.id=e.idCandidato
			 LEFT JOIN `candidato_objetivosprofissionais` as `o`
				    ON i.id=o.idCandidato
			 LEFT JOIN `candidato_lista_objetivos` as `lo`
				    ON i.id=lo.idCandidato
			LEFT JOIN `vagas_lista_funcao` as `f`
				    ON f.id=lo.idFuncao
			LEFT JOIN `vagas_lista_hierarquia` as `h`
				    ON h.id=lo.idHierarquia
			 LEFT JOIN `candidato_escolaridade` as `es`
				    ON i.id=es.idCandidato
				 WHERE i.idCliente=:idCliente
				   AND i.status=:st";
		$filtro="";
		/*FILTROS*/
		//Pretencao Salarial
		if(!empty($filtros['salario_de'])){ $filtro.=" AND o.pretencaoSalarial >= $filtros[salario_de]";}
		if(!empty($filtros['salario_ate'])){ $filtro.=" AND o.pretencaoSalarial <= $filtros[salario_ate]";}
		//Dados Gerais

		//Profissional

		//Pessoal

		//Escolaridade

		//Localizacao
		if(!empty($filtros['estado'])){ $filtro.=" AND e.estado = '$filtros[estado]'";}
		if(!empty($filtros['cidade'])){ $filtro.=" AND e.cidade = '$filtros[cidade]'";}
		$ordem=" ORDER BY $ordenacao[campo] $ordenacao[ordem] 
		        LIMIT $inicio,$limite";
   
		$consulta=$qry.$filtro.$ordem;
		//echo $consulta.'<br/>idCliente: '.$idCliente.' St: '.$status;
		$sql = $this->db->prepare($consulta);
		$sql->bindValue(':idCliente',$idCliente);
		$sql->bindValue(':st',$status);
		

		$sql->execute();
		return $sql->fetchAll();
    }
    
    public function Old_filtrarCandidatos($conta,
                                 $start,
		                         $qtd,
		                         //filtros
		                         $f_id="",
		                         $f_desde="",
			                     $f_areaInteresse="",
			                     $f_nome="",
			                     $f_nascimento="",
			                     $f_cidade="",
			                     $f_estado="",
			                     $f_usuario="",
			                     //ordenacao,
			                     $ordem="",
			                     $campo=""){
		$orderBy="";
		$filtro="";
		if(!empty($ordem)){$orderBy="ORDER BY ".$campo." ".$ordem;}

		if(!empty($f_id)){$filtro.="AND i.id =:id";}
		if(!empty($f_desde)){$filtro.="AND i.desde =:desde ";}
		if(!empty($f_areaInteresse)){$filtro.="AND i.areaInteresse =:areaInteresse ";}
		if(!empty($f_nome)){$filtro.="AND dp.nome =:nome ";}
		if(!empty($f_nascimento)){$filtro.="AND dp.nascimento =:nascimento ";}
		if(!empty($f_cidade)){$filtro.="AND e.cidade =:cidade ";}
		if(!empty($f_estado)){$filtro.="AND e.estado =:estado ";}
		if(!empty($f_usuario)){$filtro.="AND i.usuario =:usuario ";}


		$qry = "SELECT i.id,i.desde,i.areaInteresse,dp.nome,dp.nascimento,e.cidade,e.estado,i.usuario
		          FROM `candidato_informacoes` AS `i`
		          JOIN `candidato_dadospessoais` AS `dp`
		            ON i.id=dp.idCandidato 
		          JOIN `candidato_endereco` AS `e`
		            ON i.id=e.idCandidato
		         WHERE i.idCliente=:conta
		            $filtro
		            $orderBy
		          LIMIT $start,$qtd";
   
		
        $sql = $this->db->prepare($qry);
        $sql->bindValue(':conta',$conta);
		if(!empty($f_id)){$sql->bindValue(':id',$f_id);}
		if(!empty($f_desde)){$sql->bindValue(':desde',$f_desde);}
		if(!empty($f_areaInteresse)){$sql->bindValue(':areaInteresse',$f_areaInteresse);}
		if(!empty($f_nome)){$sql->bindValue(':nome',$f_nome);}
		if(!empty($f_nascimento)){$sql->bindValue(':nascimento',$f_nascimento);}
		if(!empty($f_cidade)){$sql->bindValue(':cidade',$f_cidade);}
		if(!empty($f_estado)){$sql->bindValue(':estado',$f_estado);}
		if(!empty($f_usuario)){$sql->bindValue(':usuario',$f_usuario);}

		$sql->execute();
		return $sql->fetchAll();
    }
    
    public function opcoesFiltro($conta,
                                 $campo,
		                         $value="",
								 $start,
		                         $qtd,
		                          //filtros
                                  $f_id="",
                                  $f_desde="",
                                  $f_areaInteresse="",
                                  $f_nome="",
                                  $f_nascimento="",
                                  $f_cidade="",
                                  $f_estado="",
                                  $f_usuario=""
			                     ){
		$filtro="";
		$like="";

		if((!empty($f_id))&&($campo!="i.id")): $filtro.="AND i.id =:id "; endif;
		if((!empty($f_desde))&&($campo!="i.desde")): $filtro.="AND i.desde =:desde "; endif;
		if((!empty($f_areaInteresse))&&($campo!="i.areaInteresse")): $filtro.="AND i.areaInteresse =:areaInteresse "; endif;
		if((!empty($f_nome))&&($campo!="dp.nome")): $filtro.="AND dp.nome =:nome "; endif;
		if((!empty($f_nascimento))&&($campo!="dp.nascimento")): $filtro.="AND dp.nascimento =:nascimento "; endif;
		if((!empty($f_cidade))&&($campo!="e.cidade")): $filtro.="AND e.cidade =:cidade "; endif;
		if((!empty($f_estado))&&($campo!="e.estado")): $filtro.="AND e.estado =:estado "; endif;
		if((!empty($f_usuario))&&($campo!="i.usuario")): $filtro.="AND i.usuario =:usuario "; endif;   



		if((!empty($value))): $like="AND $campo LIKE :like"; endif;


        $qry = "SELECT DISTINCT $campo
		            FROM `candidato_informacoes` AS `i`
                    JOIN `candidato_dadospessoais` AS `dp`
                    ON i.id=dp.idCandidato 
                    JOIN `candidato_endereco` AS `e`
                    ON i.id=e.idCandidato
                  WHERE i.idCliente=:conta
		            $filtro
		            $like
		         LIMIT $start,$qtd";      

        $sql = $this->db->prepare($qry);
        $sql->bindValue(':conta',$conta);
		if((!empty($f_id))&&($campo!="i.id")){$sql->bindValue(':id',$f_id);}
		if((!empty($f_desde))&&($campo!="i.desde")){$sql->bindValue(':desde',$f_desde);}
		if((!empty($f_areaInteresse))&&($campo!="i.areaInteresse")){$sql->bindValue(':areaInteresse',$f_areaInteresse);}
		if((!empty($f_nome))&&($campo!="dp.nome")){$sql->bindValue(':nome',$f_nome);}
		if((!empty($f_nascimento))&&($campo!="dp.nascimento")){$sql->bindValue(':nascimento',$f_nascimento);}
		if((!empty($f_cidade))&&($campo!="e.cidade")){$sql->bindValue(':cidade',$f_cidade);}
		if((!empty($f_estado))&&($campo!="e.estado")){$sql->bindValue(':estado',$f_estado);}
		if((!empty($f_usuario))&&($campo!="i.usuario")){$sql->bindValue(':usuario',$f_usuario);}
        
             
		if(!empty($value)){$sql->bindValue(':like','%'.$value.'%');}
                                   
		$sql->execute();
		return $sql->fetchAll();
	}

	public function novoCandidato($conta){
		//verifica se existe um usuario vazio
		$sql = $this->db->prepare("SELECT `id` FROM `candidato_informacoes` WHERE `salvo`=0 AND `status`=1 AND `idCliente`=:idConta");
		$sql->bindValue(':idConta',$conta);
		$sql->execute();

		if($sql->rowCount() > 0) {
		  //caso sim, retorna o id do mesmo
		  $rs=$sql->fetch();
		  return $rs['id'];
		}else{
			//do contrario, cadastra um novo

			//inserindo banco de informacoes
			$sql = $this->db->prepare("INSERT INTO `candidato_informacoes` 
			                                	   (`idCliente`,`desde`,`salvo`,`status`)
											VALUES (:idCliente,NOW(),0,1)");
			$sql->bindValue(':idCliente',$conta);
			$sql->execute();

			$idCandidato = $this->db->lastInsertId();

			//dados pessoais
			$sql = $this->db->prepare("INSERT INTO `candidato_dadospessoais` (`idCandidato`,`nascimento`)
											VALUES ('$idCandidato',null)");
			$sql->execute();
			
			//contatos
			$sql = $this->db->prepare("INSERT INTO `candidato_contatos` (`idCandidato`)
											VALUES ('$idCandidato')");
			$sql->execute();
			
			//endereco
			$sql = $this->db->prepare("INSERT INTO `candidato_endereco` (`idCandidato`)
											VALUES ('$idCandidato')");
			$sql->execute();
			return $idCandidato;

			//objetivos profissionais			
			$sql = $this->db->prepare("INSERT INTO `candidato_objetivosprofissionais` (`idCandidato`)
											VALUES ('$idCandidato')");
			$sql->execute();
			return $idCandidato;

			
		}
	}

	public function importaFoto($idCandidato,$file,$nome,$extensao){
		$fotoAtual=$this->fotoPerfil($idCandidato);
		//VERIFICA SE EXISTE FOTO NO PERFIL
		if($fotoAtual!=false){
			//SIM APAGA A ATUAL
			unlink($fotoAtual['arquivo']);
			$sql=$this->db->prepare("DELETE FROM `biblioteca` WHERE `id`=:arquivo");
			$sql->bindValue(':arquivo',$fotoAtual['id']);
			if($sql->execute() === false){
				$erro=$sql->errorInfo();
				echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao deletar img da biblioteca: "'.$erro[2].'"</small><br/>';
			}		
		}
		$sql=$this->db->prepare("INSERT INTO `biblioteca`
				                            (`data`,`pasta`,`arquivo`,`lixeira`)
									  VALUES(now(),0,:arquivo,0)");
		$sql->bindValue(':arquivo',$file);						 
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao inserir na biblioteca: "'.$erro[2].'"</small><br/>';
		}
		$idFoto=$this->db->lastInsertId();
		$sql = $this->db->prepare("UPDATE `candidato_dadospessoais` 
									  SET `idFoto`='$idFoto'
									WHERE `idCandidato`='$idCandidato'");
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar id da foto na ficha:"'.$erro[2].'"</small><br/>';
		}

	}

	public function fotoPerfil($idCandidato){
		$sql = $this->db->prepare("SELECT `idFoto` FROM `candidato_dadospessoais` WHERE `idCandidato`='$idCandidato' AND idFoto >=0");
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao pegar id da foto na ficha:"'.$erro[2].'"</small><br/>';
		}
		if($sql->rowCount() > 0) {
			
			$rs=$sql->fetch();
			$sqlB = $this->db->prepare("SELECT * FROM `biblioteca` WHERE `id`=:idFoto");
			$sqlB->bindValue(':idFoto',$rs['idFoto']);
			if($sqlB->execute() === false){
				$erro=$sql->errorInfo();
				echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao selecionar informacoes da imagem:"'.$erro[2].'"</small><br/>';
			}
			return $sqlB->fetch();
		} else {
			return false;
		}

	}

	public function getInfo($idCandidato){
		$sql = $this->db->prepare("SELECT * FROM `candidato_informacoes` WHERE `id`=:idCandidato AND `status`=1");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}
    }

    public function getDadosPessoais($idCandidato){
		$sql = $this->db->prepare("SELECT * FROM `candidato_dadospessoais` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}
	}
	
	public function nomeCandidato($idCandidato){
		$sql = $this->db->prepare("SELECT `nome` FROM `candidato_dadospessoais` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['nome'];
	}
	
	public function nascCandidato($idCandidato){
		$sql = $this->db->prepare("SELECT `nascimento` FROM `candidato_dadospessoais` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['nascimento'];
	}

	public function getEndereco($idCandidato){
		$sql = $this->db->prepare("SELECT * FROM `candidato_endereco` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}
	}
	
	public function listarCidades($idConta){
		$sql = $this->db->prepare("SELECT DISTINCT `cidade` 
		                                      FROM `candidato_endereco` AS `e` 
									          JOIN `candidato_informacoes` AS `i`
									            ON i.id=e.idCandidato
									         WHERE i.idCliente=:idConta
											   AND `cidade` is not null
								          ORDER BY cidade ASC");
		$sql->bindValue(':idConta',$idConta);
		$sql->execute();
		return $sql->fetchAll();
	}

    public function getContatos($idCandidato){
		$sql = $this->db->prepare("SELECT * FROM `candidato_contatos` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}
	}
	

	public function gravarObservacoes($criador,$idCandidato,$observacao){
		$sql = $this->db->prepare("INSERT INTO `candidato_observacoes`
									 		  (`idCandidato`,`data`,`criador`,`observacao`)
									   VALUES (:idCandidato,now(),:criador,:observacao)");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->bindValue(':criador',$criador);
		$sql->bindValue(':observacao',$observacao);
		$sql->execute();

	}

	public function getObservacoes($idCandidato){
		$sql = $this->db->prepare("SELECT o.id,o.idCandidato,o.data,o.observacao,u.nome
		                             FROM `candidato_observacoes`AS `o` 
									 JOIN `users` AS `u`
									   ON u.id=o.criador
									WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function getObjetivosProfissionais($idCandidato){
		$sql = $this->db->prepare("SELECT * FROM `candidato_objetivosprofissionais` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}
	}

	public function getEscolaridade($idCandidato){
		$sql = $this->db->prepare("SELECT * FROM `candidato_escolaridade` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return false;
		}
	}
	
	public function atualizaDados($idCandidato,
                                $foto,
                                $nome,
                                $apelido,
                                $cpf,
                                $pis,
                                $nascimento,
                                $sexo,
                                $estadoCivil,
                                $habilitacao,
                                $filhos,
                                $necessidade,
                                $tipoNecessidade,
                                $infoNecessidade,
                                $cep,
                                $rua,
                                $numero,
                                $bairro,
                                $cidade,
                                $estado,
                                $email,
                                $celular,
                                $fixo,
                                $facebook,
                                $linkedin,
                                $portifolio,
                                $skype,
                                $sobre,
                                $listMail){                                          
        $sql = $this->db->prepare("UPDATE `candidato_informacoes`
                                      SET `receberEmails`=:listMail,
									      `usuario`=:email,
										  `salvo`=1
                                    WHERE `id`=:idCandidato");
		$sql->bindValue(':listMail',$listMail);
		$sql->bindValue(':email',$email);
		$sql->bindValue(':idCandidato',$idCandidato);

		$tabela='candidato_informacoes';
		if($sql->execute() === false){
			$erro=$sql->errorInfo();			
			echo '<small class="text-danger"><i class="fas fa-times"></i> Tabela: '.$tabela.'; Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}else{
			//echo '<small class="text-muted"><i class="far fa-check-circle text-success"></i> Tabela: '.$tabela.'; </small><br/>';
		}
        
        
        $sql = $this->db->prepare("UPDATE `candidato_dadospessoais`
                                      SET `idFoto`=:foto,
                                          `nome`=:nome,
                                          `apelido`=:apelido,
                                          `cpf`=:cpf,
                                          `pis`=:pis,
                                          `nascimento`=:nascimento,
                                          `sexo`=:sexo,
                                          `estadoCivil`=:estadoCivil,
                                          `habilitacao`=:habilitacao,
                                          `filhos`=:filhos,
                                          `necessidadeEspecial`=:necessidadeEspecial,
                                          `tipoNecessidade`=:tipoNecessidade,
                                          `infoNecessidade`=:infoNecessidade,
                                          `sobre`=:sobre
                                    WHERE `idCandidato`=:idCandidato");
        $sql->bindValue(':foto',$foto);
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':apelido',$apelido);
        $sql->bindValue(':cpf',$cpf);
        $sql->bindValue(':pis',$pis);
        $sql->bindValue(':nascimento',$nascimento);
        $sql->bindValue(':sexo',$sexo);
        $sql->bindValue(':estadoCivil',$estadoCivil);
        $sql->bindValue(':habilitacao',$habilitacao);
        $sql->bindValue(':filhos',$filhos);
        $sql->bindValue(':necessidadeEspecial',$necessidade);
        $sql->bindValue(':tipoNecessidade',$tipoNecessidade);
        $sql->bindValue(':infoNecessidade',$infoNecessidade);
        $sql->bindValue(':sobre',$sobre);
		$sql->bindValue(':idCandidato',$idCandidato);
		
		$tabela='candidato_dadospessoais';
		if($sql->execute() === false){
			$erro=$sql->errorInfo();			
			echo '<small class="text-danger"><i class="fas fa-times"></i> Tabela: '.$tabela.'; Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}else{
			//echo '<small class="text-muted"><i class="far fa-check-circle text-success"></i> Tabela: '.$tabela.'; </small><br/>';
		}

      

        $sql = $this->db->prepare("UPDATE `candidato_endereco`
                                      SET `cep`=:cep,
                                          `rua`=:rua,
                                          `numero`=:numero,
                                          `bairro`=:bairro,
                                          `estado`=:estado,
                                          `cidade`=:cidade   
                                    WHERE `idCandidato`=:idCandidato");
        $sql->bindValue(':cep',$cep);
        $sql->bindValue(':rua',$rua);
        $sql->bindValue(':numero',$numero);
        $sql->bindValue(':bairro',$bairro);
        $sql->bindValue(':estado',$estado);
        $sql->bindValue(':cidade',$cidade);
        $sql->bindValue(':idCandidato',$idCandidato);                            
        
		$tabela='candidato_endereco';
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Tabela: '.$tabela.'; Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}else{
			//echo '<small class="text-muted"><i class="far fa-check-circle text-success"></i> Tabela: '.$tabela.'; </small><br/>';
		}
                               
        $sql = $this->db->prepare("UPDATE `candidato_contatos`
                                      SET `email`=:email,
                                          `celular`=:celular,
                                          `telFixo`=:telFixo,
                                          `facebook`=:facebook,
                                          `linkedin`=:linkedin,
                                          `portifolio`=:portifolio,
                                          `skype`=:skype
                                    WHERE `idCandidato`=:idCandidato");
        $sql->bindValue(':email',$email);
        $sql->bindValue(':celular',$celular);
        $sql->bindValue(':telFixo',$fixo);
        $sql->bindValue(':facebook',$facebook);
        $sql->bindValue(':linkedin',$linkedin);
        $sql->bindValue(':portifolio',$portifolio);
        $sql->bindValue(':skype',$skype);
        $sql->bindValue(':idCandidato',$idCandidato); 
		
		$tabela='candidato_contatos';
        if($sql->execute() === false){
			$erro=$sql->errorInfo();			
			echo '<small class="text-danger"><i class="fas fa-times"></i> Tabela: '.$tabela.'; Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}else{
			//echo '<small class="text-muted"><i class="far fa-check-circle text-success"></i> Tabela: '.$tabela.'; </small><br/>';
		}
	}
	
	public function listarObjetivos($idCandidato){
		$sql = $this->db->prepare("SELECT * FROM `candidato_lista_objetivos` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato); 
		$sql->execute();
		return $sql->fetchAll();
	}

	public function addObjetivo($idCandidato,$funcao,$hierarquia,$tempo,$medidaTempo){
		$sql = $this->db->prepare("INSERT INTO `candidato_lista_objetivos` 
		                                      (`idCandidato`,`idFuncao`,`idHierarquia`,`tempo`,`medidaTempo`)
									   VALUES (:idCandidato,:idFuncao,:hierarquia,:tempo,:medidaTempo)");
		$sql->bindValue(':idCandidato',$idCandidato); 
		$sql->bindValue(':idFuncao',$funcao); 
		$sql->bindValue(':hierarquia',$hierarquia); 
		$sql->bindValue(':tempo',$tempo); 
		$sql->bindValue(':medidaTempo',$medidaTempo); 

		$sql->execute();
	}

	public function delObjetivo($idObjetivo){
		$sql = $this->db->prepare("DELETE FROM `candidato_lista_objetivos` WHERE `id`=:idObjetivo");
		$sql->bindValue(':idObjetivo',$idObjetivo); 
		$sql->execute();
	}

	public function salvaFichaProfissional($idCandidato,$pretencaoSalarial,$disponibilidadeViagem,$disponibilidadeMudanca,$homeOffice,$minicurriculo){
		$sql = $this->db->prepare("UPDATE `candidato_objetivosprofissionais`
									  SET `pretencaoSalarial`=:pretencaoSalarial,
										  `podeViajar`=:disponibilidadeViagem,
										  `podeMudar`=:disponibilidadeMudanca,
										  `homeOffice`=:homeOffice,
										  `miniCurriculo`=:minicurriculo
									WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':pretencaoSalarial',$pretencaoSalarial);
		$sql->bindValue(':disponibilidadeViagem',$disponibilidadeViagem);
		$sql->bindValue(':disponibilidadeMudanca',$disponibilidadeMudanca);
		$sql->bindValue(':homeOffice',$homeOffice);
		$sql->bindValue(':minicurriculo',$minicurriculo);
		$sql->bindValue(':idCandidato',$idCandidato); 

		$tabela='candidato_objetivosprofissionais';
		if($sql->execute() === false){
		   $erro=$sql->errorInfo();
		   echo '<small class="text-danger"><i class="fas fa-times"></i> Tabela: '.$tabela.'; Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}
	}

	public function addEscolaridade($idCandidato,$escolaridade,$instituicao,$curso,$inicio,$termino,$horario){
		$sql = $this->db->prepare("INSERT INTO `candidato_escolaridade` 
		                                      (`idCandidato`,`escolaridade`,`instituicao`,`curso`,`inicio`,`termino`,`horario`)
									   VALUES (:idCandidato,:escolaridade,:instituicao,:curso,:inicio,:termino,:horario)");
		$sql->bindValue(':idCandidato',$idCandidato); 
		$sql->bindValue(':escolaridade',$escolaridade); 
		$sql->bindValue(':instituicao',$instituicao); 
		$sql->bindValue(':curso',$curso); 
		$sql->bindValue(':inicio',$inicio); 
		$sql->bindValue(':termino',$termino); 
		$sql->bindValue(':horario',$horario); 

		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i>Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		 }
	}

	public function setaOrigem($idCandidato,$origem,$complemento){
		$sql = $this->db->prepare("UPDATE `candidato_informacoes`
									  SET `origem`=:origem,
										  `complemento`=:complemento
									WHERE `id`=:idCandidato");
		$sql->bindValue(':origem',$origem);
		$sql->bindValue(':complemento',$complemento);
		$sql->bindValue(':idCandidato',$idCandidato); 

		if($sql->execute() === false){
		   $erro=$sql->errorInfo();
		   echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}
	}

	public function infoOrigem($idCandidato){
		$sql = $this->db->prepare("SELECT `origem`,`complemento` FROM `candidato_informacoes` WHERE `id`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}
	}

	public function concluirFicha($idCandidato){
		$sql = $this->db->prepare("UPDATE `candidato_informacoes`
									  SET `ativado`=1
									WHERE `id`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato); 

		if($sql->execute() === false){
		   $erro=$sql->errorInfo();
		   echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}
	}

	public function delEscolaridade($idEscolaridade){
		$sql = $this->db->prepare("DELETE FROM `candidato_escolaridade` WHERE `id`=:idEscolaridade");
		$sql->bindValue(':idEscolaridade',$idEscolaridade); 
		$sql->execute();
	}


	public function listarCandidatos($idCliente,$pag,$limit){
		$sql=$this->db->prepare("SELECT `id`,`desde`
								   FROM `candidato_informacoes`
								  WHERE `idCliente`=:idCliente
									AND `salvo`=1
								  LIMIT $pag,$limit");
		$sql->bindValue(':idCliente',$idCliente);
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		 }
		return $sql->fetchAll();
	}

	public function cargoCandidato($idCliente){
		$sql=$this->db->prepare("SELECT f.funcao, h.hierarquia
								   FROM `candidato_lista_objetivos` as `lo`
								   JOIN `vagas_lista_funcao` as `f`
								     ON f.id=lo.idFuncao
								   JOIN `vagas_lista_hierarquia` as `h`
								     ON h.id=lo.idHierarquia
								  WHERE lo.idCandidato=:idCliente
								  ORDER BY lo.id ASC
								  LIMIT 1");
		$sql->bindValue(':idCliente',$idCliente);
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		 }
		return $sql->fetch();
	}

	public function objetivosCandidato($idCliente){
		$sql=$this->db->prepare("SELECT f.funcao, h.hierarquia,lo.tempo,lo.medidaTempo
								   FROM `candidato_lista_objetivos` as `lo`
								   JOIN `vagas_lista_funcao` as `f`
								     ON f.id=lo.idFuncao
								   JOIN `vagas_lista_hierarquia` as `h`
								     ON h.id=lo.idHierarquia
								  WHERE lo.idCandidato=:idCliente");
		$sql->bindValue(':idCliente',$idCliente);
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		 }
		return $sql->fetchAll();
	}

	public function escolaridadeCandidato($idCliente){
		$sql=$this->db->prepare("SELECT *
								   FROM `candidato_escolaridade`
								  WHERE `idCandidato`=:idCliente");
		$sql->bindValue(':idCliente',$idCliente);
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		 }
		return $sql->fetchAll();
	}

	public function enderecoCandidato($idCliente){
		$sql=$this->db->prepare("SELECT *
								   FROM `candidato_endereco`
								  WHERE `idCandidato`=:idCliente");
		$sql->bindValue(':idCliente',$idCliente);
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		 }
		return $sql->fetch();
	}

	public function pretencaoSalarial($idCandidato){
		$sql = $this->db->prepare("SELECT `pretencaoSalarial` FROM `candidato_objetivosprofissionais` WHERE `idCandidato`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['pretencaoSalarial'];
	}

	public function ultimaAtualizacao($idCandidato){
		$sql = $this->db->prepare("SELECT `desde` FROM `candidato_informacoes` WHERE `id`=:idCandidato");
		$sql->bindValue(':idCandidato',$idCandidato);
		$sql->execute();
		$rs=$sql->fetch();
		return $rs['desde'];
	}


	public function buscarCandidato($vaga,$funcao,$hierarquia,$estado,$cidade,$palavraChave,$de,$ate,$ordenarPor,$ordem){
		//FILTROS
		//$vaga 
		if(!empty($funcao)){$flt_funcao="AND lo.idFuncao='".$funcao."'";}else{$flt_funcao="";}
		if(!empty($hierarquia)){
			$flt_hierarquia='';
			$i=0;
			foreach($hierarquia as $h):
				if($i==0){$s=" AND (";}else{$s="OR ";}
				$flt_hierarquia.=$s." lo.idHierarquia='".$h."'";
				++$i;
			endforeach;
			$flt_hierarquia.=')';
		
		}else{$flt_hierarquia="";}
		if(!empty($estado)){$flt_estado=" AND e.estado='".$estado."'";}else{$flt_estado="";}
		if(!empty($cidade)){
			$flt_cidade="";
			$i=0;
			foreach($cidade as $c):
				if($i==0){$s=" AND (";}else{$s="OR ";}
				$flt_cidade.=$s." e.cidade='".$c."'";
				++$i;
			endforeach;
			$flt_cidade.=')';
		}else{$flt_cidade="";}
		if(!empty($palavraChave)){$flt_palavraChave="";}else{$flt_palavraChave="";}
		if(!empty($de)){$flt_de="AND i.desde>='".$de."'";}else{$flt_de="";}
		if(!empty($ate)){$flt_ate="AND i.desde<='".$atee."'";}else{$flt_ate="";}
		if(!empty($ordenarPor)){$flt_ordenarPor="";}else{$flt_ordenarPor="";}
		if(!empty($ordem)){$flt_ordem="";}else{$flt_ordem="";}

		$sql = $this->db->prepare("SELECT DISTINCT(i.id)
		                             FROM `candidato_informacoes` AS `i` 
							    LEFT JOIN `candidato_lista_objetivos` AS `lo`
									   ON i.id=lo.idCandidato 
									 JOIN `candidato_endereco` AS `e` 
									   ON i.id=e.idCandidato 
									WHERE `status`=1
									/*FILTROS*/
									$flt_funcao
									$flt_hierarquia
									$flt_cidade
									$flt_estado
									$flt_de
									$flt_ate
									");
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar: :"'.$erro[2].'"</small><br/>';
		}
		/*echo "SELECT DISTINCT(i.id) FROM `candidato_informacoes` AS `i` LEFT JOIN `candidato_lista_objetivos` AS `lo`
		ON i.id=lo.idCandidato WHERE `status`=1 ".$flt_funcao.$flt_hierarquia.$flt_estado.$flt_de.$flt_ate;*/
		return $sql->fetchAll();
	}
}