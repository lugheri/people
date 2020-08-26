<?php 
namespace Models;
use \Core\Model;

class Clientes extends Model{
    public function getInfo($idCliente){
        $sql = $this->db->prepare("SELECT * FROM `clientes` WHERE `id`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        return $sql->fetch();
    }
       
    public function getContatos($idCliente){
        $sql = $this->db->prepare("SELECT * FROM `cliente_contatos` WHERE `idCliente`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function nomeContato($idContato){
        $sql = $this->db->prepare("SELECT `nome` FROM `cliente_contatos` WHERE `id`=:idContato");
        $sql->bindValue(':idContato',$idContato);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['nome'];

    }

    public function getEnderecos($idCliente){
        $sql = $this->db->prepare("SELECT * FROM `cliente_enderecos` WHERE `idCliente`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
        }
        return $sql->fetchAll();
    }

    public function resumoEndereco($idEndereco){
        $sql = $this->db->prepare("SELECT * FROM `cliente_enderecos` WHERE `id`=:idEndereco");
        $sql->bindValue(':idEndereco',$idEndereco);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['logradouro'].', '.$rs['numero'].' '.$rs['bairro'].' - '.$rs['cidade'].'-'.$rs['estado'];
    }

    public function nomeCliente($idCliente){
        $sql = $this->db->prepare("SELECT `nome` FROM `clientes` WHERE `id`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['nome'];
    }

    public function listaClientes(){
        $sql = $this->db->prepare("SELECT * FROM `clientes` WHERE `status`=1");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function listarCandidatos_paginados($status,$pag,$limit){
		$sql=$this->db->prepare("SELECT `id`,`desde`
								   FROM `clientes`
								  WHERE `status`=:st
								  LIMIT $pag,$limit");
		$sql->bindValue(':st',$status);
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao listar :"'.$erro[2].'"</small><br/>';
		 }
		return $sql->fetchAll();
    }
    
    public function resumoCliente($idCliente){
        $sql=$this->db->prepare("SELECT `nome`,`razaoSocial`,`cnpj`,`cidade`,`estado`
								   FROM `clientes` AS `c`
                              LEFT JOIN `cliente_enderecos` AS `e`
                                     ON c.id=e.idCliente
								  WHERE c.id=:idCliente");
		$sql->bindValue(':idCliente',$idCliente);
		$sql->execute();
		return $sql->fetch();
    }

    public function qtdClientes_byStatus($status){
        $sql = $this->db->prepare("SELECT COUNT(`id`) AS `total` FROM `clientes` WHERE `status`=:st");
        $sql->bindValue(':st',$status);
        $sql->execute();
        $rs= $sql->fetch();
		return $rs['total'];
    }

    public function listaClientesFilhos($conta){
        $sql = $this->db->prepare("SELECT * FROM `clientes` WHERE `contaPai`=:conta AND `status`=1");
        $sql->bindValue(':conta',$conta);
        $sql->execute();
        return $sql->fetchAll();
    }

    function novoCliente($conta){
        $sql=$this->db->prepare("SELECT `id` FROM `clientes` WHERE `razaoSocial` is null AND `contaPai`=:conta LIMIT 1");
        $sql->bindValue(':conta',$conta);
        $sql->execute();
       
        if($sql->rowCount()==1){
            $rs=$sql->fetch();
            return $rs['id'];
        }else{
            $sql=$this->db->prepare("INSERT INTO `clientes` (`contaPai`,`desde`,`status`) 
                                                     VALUES (:conta,NOW(),2)");
            $sql->bindValue(':conta',$conta);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo "<small class='text-danger'>Erro ao gravar cliente: ".$erro."</small>";
                return 0;
            }else{
                return $this->db->lastInsertId();
            }
        }
    }


    public function cadastrarCliente($desde,$logo,$status,$nome,$descricao,$link){
        $sql = $this->db->prepare("INSERT INTO `clientes` 
                                              (`desde`,`logo`,`nome`,`descricao`,`nomeLink`,`status`)
                                       VALUES (NOW(),:logo,:nome,:descricao,:link,:st)");
        $sql->bindValue(':logo',$logo);
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':link',$link);
        $sql->bindValue(':st',$status);

        $sql->execute();

        $idCliente=$this->db->lastInsertId();

        $sql = $this->db->prepare("INSERT INTO `cliente_paginacandidatos` 
                                              (`idCliente`,`buscaVaga`,`comoFunciona`)
                                       VALUES ('$idCliente',1,1)");
        $sql->execute();
        return $idCliente;
    }

    public function importaLogo($idCliente,$file,$nome,$extensao){
		$logoAtual=$this->logoEmpresa($idCliente);
		//VERIFICA SE EXISTE FOTO NO PERFIL
		if($logoAtual!=false){
			//SIM APAGA A ATUAL
			unlink($logoAtual['arquivo']);
			$sql=$this->db->prepare("DELETE FROM `biblioteca` WHERE `id`=:arquivo");
			$sql->bindValue(':arquivo',$logoAtual['id']);
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
		$idLogo=$this->db->lastInsertId();
		$sql = $this->db->prepare("UPDATE `clientes` 
									  SET `logo`='$idLogo'
									WHERE `id`='$idCliente'");
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao gravar id da foto na ficha:"'.$erro[2].'"</small><br/>';
		}

    }
    
   public function logoEmpresa($idCliente){
		$sql = $this->db->prepare("SELECT `logo` FROM `clientes` WHERE `id`='$idCliente' AND logo >=0");
		if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao pegar id do logo na ficha:"'.$erro[2].'"</small><br/>';
		}
		if($sql->rowCount() > 0) {
			
			$rs=$sql->fetch();
			$sqlB = $this->db->prepare("SELECT * FROM `biblioteca` WHERE `id`=:idFoto");
			$sqlB->bindValue(':idFoto',$rs['logo']);
			if($sqlB->execute() === false){
				$erro=$sql->errorInfo();
				echo '<small class="text-danger"><i class="fas fa-times"></i> Erro ao selecionar informacoes da imagem:"'.$erro[2].'"</small><br/>';
			}
			return $sqlB->fetch();
		} else {
			return false;
		}

    }
    
    

    public function addContato($idCliente,$ddd,$numero,$ramal,$tipo,$principal,$contato){
        $sql = $this->db->prepare("INSERT INTO `cliente_telefones` 
                                               (`idCliente`,`ddd`,`numero`,`ramal`,`tipo`,`principal`,`contato`)
                                        VALUES (:idCliente,:ddd,:numero,:ramal,:tipo,:principal,:contato)");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':ddd',$ddd);
        $sql->bindValue(':numero',$numero);
        $sql->bindValue(':ramal',$ramal);
        $sql->bindValue(':tipo',$tipo);
        $sql->bindValue(':contato',$contato);
        $sql->bindValue(':principal',$principal);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo "<small class='text-danger'>Erro ao gravar telefone: ".$erro[2]."</small>";
        }

    }

    public function telefonesCliente($idCliente){
        $sql=$this->db->prepare("SELECT * 
                                   FROM `cliente_telefones`
                                  WHERE `idCliente`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function removeTelefone($idTelefone){
        $sql=$this->db->prepare("DELETE FROM `cliente_telefones`WHERE `id`=:idTelefone");
        $sql->bindValue(':idTelefone',$idTelefone);
        $sql->execute();
    }

    public function checkBeneficio($idBeneficio,$idCliente){
        $sql=$this->db->prepare("SELECT `id`,`valor`
                                   FROM `cliente_beneficios`
                                  WHERE `idCliente`=:idCliente
                                    AND `idBeneficio`=:idBeneficio");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':idBeneficio',$idBeneficio);
        $sql->execute();
        return $sql->fetch();
        
    }

    public function addBeneficioCliente($idCliente,$idBeneficio){
        if(empty($this->checkBeneficio($idBeneficio,$idCliente))){
            $sql=$this->db->prepare("INSERT INTO `cliente_beneficios` 
                                             (`idCliente`,`idBeneficio`,`valor`)
                                      VALUES (:idCliente,:idBeneficio,0)");
            $sql->bindValue(':idBeneficio',$idBeneficio);
            $sql->bindValue(':idCliente',$idCliente);
            $sql->execute();
        }
    }
    
    public function delBeneficioCliente($idCliente,$idBeneficio){
        $sql=$this->db->prepare("DELETE FROM `cliente_beneficios` WHERE `idCliente`=:idCliente AND `idBeneficio`=:idBeneficio");
        $sql->bindValue(':idBeneficio',$idBeneficio);
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
    }

    public function gravaValorBeneficio($idCliente,$idBeneficio,$valor){
        $sql = $this->db->prepare("UPDATE `cliente_beneficios` 
                                      SET `valor`=:valor
                                    WHERE `idCliente`= :idCliente
                                      AND `idBeneficio`=:idBeneficio"); 
        $sql->bindValue(':valor',$valor);
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':idBeneficio',$idBeneficio);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar o valor: '.$error[2].'</small>';
        }
    }

    public function formasContratacaoSelecionadas($idCliente){
        $sql = $this->db->prepare("SELECT f.*,l.forma 
                                     FROM `cliente_lista_formacontratacao` AS `l`
                                     JOIN `cliente_formascontratacao` AS `f`
                                       ON l.id=f.idForma
                                      AND f.idCliente=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();        
        return $sql->fetchAll();
    }

    public function checkFormaContratacao($idForma,$idCliente){
        $sql=$this->db->prepare("SELECT `id`
                                   FROM `cliente_formascontratacao`
                                  WHERE `idCliente`=:idCliente
                                    AND `idForma`=:idForma");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':idForma',$idForma);
        $sql->execute();
        return $sql->fetch();
        
    }

    public function addFormaContratacaoCli($idCliente,$idForma){
        if(empty($this->checkFormaContratacao($idForma,$idCliente))){
            $sql=$this->db->prepare("INSERT INTO `cliente_formascontratacao` 
                                             (`idCliente`,`idForma`)
                                      VALUES (:idCliente,:idForma)");
            $sql->bindValue(':idForma',$idForma);
            $sql->bindValue(':idCliente',$idCliente);
            $sql->execute();
        }
    }

    public function delFormaContratacaoCli($idCliente,$idForma){
        $sql=$this->db->prepare("DELETE FROM `cliente_formascontratacao` WHERE `idCliente`=:idCliente AND `id`=:idForma");
        $sql->bindValue(':idForma',$idForma);
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
    }

    public function salvaDadosCliente($idCliente,$razao,$nome,$cnpj,$cpf,$ie,$im,$ramo,$porte,$site,$qtdFunc,$gpoCli,$origem,$statusCliente,$respSelecao,$filial,$classificacao,$respComercial,$celula,$condicoes,$observacoes){
        $sql=$this->db->prepare("UPDATE `clientes` 
                                    SET `razaoSocial`=:razao,
                                        `nome`=:nome,
                                        `cnpj`=:cnpj,
                                        `cpf`=:cpf,
                                        `inscricaoEstadual`=:ie,
                                        `inscricaoMunicipal`=:im,
                                        `ramo`=:ramo,
                                        `porte`=:porte,
                                        `qtdFuncionarios`=:qtdFunc,
                                        `site`=:site,
                                        `gpoCliente`=:gpoCli,
                                        `origem`=:origem,
                                        `statusCliente`=:statusCliente,
                                        `respSelecao`=:respSelecao,
                                        `filial`=:filial,
                                        `classificacao`=:classificacao,
                                        `respComercial`=:respComercial,
                                        `celula`=:celula,
                                        `condicoesEncVaga`=:condicoes,
                                        `observacoes`=:observacoes,
                                        `status`=1
                                  WHERE `id`=:idCliente");
        $sql->bindValue(':razao',$razao);
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':cnpj',$cnpj);
        $sql->bindValue(':cpf',$cpf);
        $sql->bindValue(':ie',$ie);
        $sql->bindValue(':im',$im);
        $sql->bindValue(':ramo',$ramo);
        $sql->bindValue(':porte',$porte);
        $sql->bindValue(':qtdFunc',$qtdFunc);
        $sql->bindValue(':site',$site);
        $sql->bindValue(':gpoCli',$gpoCli);
        $sql->bindValue(':origem',$origem);
        $sql->bindValue(':statusCliente',$statusCliente);
        $sql->bindValue(':respSelecao',$respSelecao);
        $sql->bindValue(':filial',$filial);
        $sql->bindValue(':classificacao',$classificacao);
        $sql->bindValue(':respComercial',$respComercial);
        $sql->bindValue(':celula',$celula);
        $sql->bindValue(':condicoes',$condicoes);
        $sql->bindValue(':observacoes',$observacoes);
        $sql->bindValue(':idCliente',$idCliente);
        if($sql->execute()==false){
            $error = $sql->errorInfo();
            return "<small class='text-danger'><i class='fas fa-exclamation-triangle'></i> Ocorreu o seguinte erro ao gravar os dados do cliente: <b>".$error[2]."</b></small>";

        }else{
            return false;
        }
    }

    public function addEndereco($idCliente,$cep,$logradouro,$numero,$bairro,$cidade,$estado,$onibus,$referencia,$principal,$faturamento){
        $sql=$this->db->prepare("INSERT INTO `cliente_enderecos` 
                                             (`idCliente`,`cep`,`logradouro`,`numero`,`bairro`,`estado`,`cidade`,`onibus`,`referencia`,`endPrincipal`,`endFaturamento`)
                                      VALUES (:idCliente,:cep,:logradouro,:numero,:bairro,:estado,:cidade,:onibus,:referencia,:principal,:faturamento)");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':cep',$cep);
        $sql->bindValue(':logradouro',$logradouro);
        $sql->bindValue(':numero',$numero);
        $sql->bindValue(':bairro',$bairro);
        $sql->bindValue(':cidade',$cidade);
        $sql->bindValue(':estado',$estado);
        $sql->bindValue(':onibus',$onibus);
        $sql->bindValue(':referencia',$referencia);
        $sql->bindValue(':principal',$principal);
        $sql->bindValue(':faturamento',$faturamento);
        $sql->execute();
    
    }

    public function delEndereco($idEndereco){
        $sql=$this->db->prepare("DELETE FROM `cliente_enderecos` WHERE `id`=:idEndereco");
        $sql->bindValue(':idEndereco',$idEndereco);
        $sql->execute();
    }


    public function novoContato($idCliente){
        $sql=$this->db->prepare("SELECT `id` FROM `cliente_contatos` WHERE `nome` is null AND `idCliente`=:idCliente LIMIT 1");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
       
        if($sql->rowCount()==1){
            $rs=$sql->fetch();
            return $rs['id'];
        }else{
            $sql=$this->db->prepare("INSERT INTO `cliente_contatos` (`idCliente`) VALUES (:idCliente)");
            $sql->bindValue(':idCliente',$idCliente);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo "<small class='text-danger'>Erro ao gravar contato: ".$erro."</small>";
                return 0;
            }else{
                return $this->db->lastInsertId();
            }
        }
    }

    public function infoContato($idContato){
        $sql=$this->db->prepare("SELECT * FROM `cliente_contatos` WHERE `id`=:idContato");
        $sql->bindValue(':idContato',$idContato);
        $sql->execute();
        return $sql->fetch();
    }

    public function gravaTelefoneContato($idContato,$ddd,$numero,$ramal,$tipo){
        $sql=$this->db->prepare("INSERT INTO `cliente_contatos_telefones`
                                            (`idContato`,`ddd`,`numero`,`ramal`,`tipo`) 
                                     VALUES (:idContato,:ddd,:numero,:ramal,:tipo)");
        $sql->bindValue(':idContato',$idContato);
        $sql->bindValue(':ddd',$ddd);
        $sql->bindValue(':numero',$numero);
        $sql->bindValue(':ramal',$ramal);
        $sql->bindValue(':tipo',$tipo);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo "<small class='text-danger'>Erro ao gravar contato: ".$erro[2]."</small>";
            return 0;
        }else{
            return $this->db->lastInsertId();
        }
    }

    public function removerTelefoneContato($idTelefone){
        $sql=$this->db->prepare("DELETE FROM `cliente_contatos_telefones` WHERE `id`=:idTelefone");
        $sql->bindValue(':idTelefone',$idTelefone);
        $sql->execute();
    }

    public function telefonesContato($idContato){
        $sql=$this->db->prepare("SELECT * FROM `cliente_contatos_telefones` WHERE `idContato`=:idContato");
        $sql->bindValue(':idContato',$idContato);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function gravaPresenteContato($idContato,$presente,$dataEntrega,$observacoes){
        $sql=$this->db->prepare("INSERT INTO `cliente_contatos_presentes`
                                            (`idContato`,`presente`,`dataEntrega`,`observacoes`) 
                                     VALUES (:idContato,:presente,:dataEntrega,:observacoes)");
        $sql->bindValue(':idContato',$idContato);
        $sql->bindValue(':presente',$presente);
        $sql->bindValue(':dataEntrega',$dataEntrega);
        $sql->bindValue(':observacoes',$observacoes);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo "<small class='text-danger'>Erro ao gravar presente: ".$erro[2]."</small>";
            return 0;
        }else{
            return $this->db->lastInsertId();
        }
    }

    public function removerPresenteContato($idPresente){
        $sql=$this->db->prepare("DELETE FROM `cliente_contatos_presentes` WHERE `id`=:idPresente");
        $sql->bindValue(':idPresente',$idPresente);
        $sql->execute();
    }

    public function presentesContato($idContato){
        $sql=$this->db->prepare("SELECT * FROM `cliente_contatos_presentes` WHERE `idContato`=:idContato");
        $sql->bindValue(':idContato',$idContato);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function salvaContato($idContato,$nome,$nasc,$email,$funcao,$especialidade,$hierarquia,$observacoes){
        $sql=$this->db->prepare("UPDATE `cliente_contatos`
                                    SET `nome`=:nome,
                                        `nasc`=:nasc,
                                        `email`=:email,
                                        `funcao`=:funcao,
                                        `especialidade`=:especialidade,
                                        `hierarquia`=:hierarquia,
                                        `observacoes`=:observacoes
                                  WHERE `id`=:idContato");
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':nasc',$nasc);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':funcao',$funcao);
        $sql->bindValue(':especialidade',$especialidade);
        $sql->bindValue(':hierarquia',$hierarquia);
        $sql->bindValue(':observacoes',$observacoes);
        $sql->bindValue(':idContato',$idContato);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo "<small class='text-danger'>Erro ao gravar contato: ".$erro[2]."</small>";
            return 0;
        }
    }

    public function delContato($idCliente,$idContato){
        $sql=$this->db->prepare("DELETE FROM `cliente_contatos` WHERE `id`=:idContato");
        $sql->bindValue(':idContato',$idContato);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM `cliente_contatos_telefones` WHERE `idContato`=:idContato");
        $sql->bindValue(':idContato',$idContato);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM `cliente_contatos_presentes` WHERE `idContato`=:idContato");
        $sql->bindValue(':idContato',$idContato);
        $sql->execute();
    }

    public function importarArquivoCliente($idCliente,$file,$nome,$extensao){
        $sql=$this->db->prepare("SELECT `id` 
                                   FROM `cliente_arquivos`
                                  WHERE `arquivo`=:arquivo AND `idCliente`=:idCliente LIMIT 1");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':arquivo',$file);
        $sql->execute();       
        if($sql->rowCount()==0){
            $sql=$this->db->prepare("INSERT INTO `cliente_arquivos`
                                                (`idCliente`,`nome`,`arquivo`,`tipo`) 
                                        VALUES (:idCliente,:nome,:arquivo,:extensao)");
            $sql->bindValue(':idCliente',$idCliente);
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':arquivo',$file);
            $sql->bindValue(':extensao',$extensao);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo "<small class='text-danger'>Erro ao gravar arquivo: ".$erro[2]."</small>";
                return 0;
            }
        }
    }

    public function getArquivos($idCliente){
        $sql=$this->db->prepare("SELECT * FROM `cliente_arquivos` WHERE `idCliente`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function linkArquivo($idArquivo){
        $sql=$this->db->prepare("SELECT `arquivo` FROM `cliente_arquivos` WHERE `id`=:idArquivo");
        $sql->bindValue(':idArquivo',$idArquivo);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['arquivo'];
    }

    public function delArquivo($idArquivo){
        $sql=$this->db->prepare("DELETE FROM `cliente_arquivos` WHERE `id`=:idArquivo");
        $sql->bindValue(':idArquivo',$idArquivo);
        $sql->execute();
    }

    public function infoFaturamento($idCliente){
        $sql = $this->db->prepare("SELECT * FROM `cliente_faturamento` WHERE `idCliente`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        return $sql->fetch();
    }
    
    public function checkServicoCliente($idCliente,$idServico){
        $sql=$this->db->prepare("SELECT `id` 
                                   FROM `cliente_faturamento_servicos`
                                  WHERE `idCliente`=:idCliente
                                    AND `idServico`=:idServico
                                  LIMIT 1");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':idServico',$idServico);
        $sql->execute();
        if($sql->rowCount()==1){
            return true;
        }else{
            return false;
        }
    }

    public function incluiServicoCliente($idCliente,$idServico){
        if($this->checkServicoCliente($idCliente,$idServico)==false){
            $sql=$this->db->prepare("INSERT INTO `cliente_faturamento_servicos`
                                                (`idCliente`,`idServico`)
                                         VALUES (:idCliente,:idServico)");
            $sql->bindValue(':idCliente',$idCliente);
            $sql->bindValue(':idServico',$idServico);
            if($sql->execute()===false){
                $error=$sql->infoError();
                echo "<small class='text-danger'>Ocorreu o seguinte erro ao adicionar o serviço: ".$error[2]."</small>";
            }
        }
    }

    public function removeServicoCliente($idCliente,$idServico){
        $sql=$this->db->prepare("DELETE FROM `cliente_faturamento_servicos`
                                       WHERE `idCliente`=:idCliente AND `idServico`=:idServico");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':idServico',$idServico);
        $sql->execute();
    }

    public function novoFaturamento($idCliente){
        $sql=$this->db->prepare("SELECT `id` FROM `cliente_faturamento` WHERE `idCliente`=:idCliente LIMIT 1");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        if($sql->rowCount()==0){
            $sql=$this->db->prepare("INSERT INTO `cliente_faturamento` (`idCliente`) VALUE(:idCliente)");
            $sql->bindValue(':idCliente',$idCliente);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo "<small class='text-danger'>Erro ao inserir faturamento: ".$erro[2]."</small>";
                return 0;
             }        
        }
    }

    public function salvaFaturamentoCliente($idCliente,$DSR,$HE_Salario,$HE_Ferias,$beneficiosFatura,$repassarDespesasAdm,$IR,$FGTS,$INSS,$outros,$salario,$vale,$cargaHoraria,$diaPag,$diaVale,$forma,$devolucao,$tributos,$periculosidade,$insalubridade,$SAT,$informacoes){
        $sql=$this->db->prepare("UPDATE `cliente_faturamento`
                                    SET `DSR`=:DSR,
                                        `HE_Salario`=:HE_Salario,
                                        `HE_Ferias`=:HE_Ferias,
                                        `beneficiosFatura`=:beneficiosFatura,
                                        `repassarDespesasAdm`=:repassarDespesasAdm,
                                        `IR`=:IR,
                                        `FGTS`=:FGTS,
                                        `Outros`=:outros,
                                        `salario`=:salario,
                                        `vale`=:vale,
                                        `cargaHoraria`=:cargaHoraria,
                                        `diaPagamento`=:diaPag,
                                        `diaVale`=:diaVale,
                                        `forma`=:forma,
                                        `devolucao`=:devolucao,
                                        `tributos`=:tributos,
                                        `periculosidade`=:periculosidade,
                                        `insalubridade`=:insalubridade,
                                        `sat`=:SAT,
                                        `informacoesAdicionais`=:informacoes
                                  WHERE `idCliente`=:idCliente");
        $sql->bindValue(':DSR',$DSR);
        $sql->bindValue(':HE_Salario',$HE_Salario);
        $sql->bindValue(':HE_Ferias',$HE_Ferias);
        $sql->bindValue(':beneficiosFatura',$beneficiosFatura);
        $sql->bindValue(':repassarDespesasAdm',$repassarDespesasAdm);
        $sql->bindValue(':IR',$IR);
        $sql->bindValue(':FGTS',$FGTS);
        $sql->bindValue(':outros',$outros);
        $sql->bindValue(':salario',$salario);
        $sql->bindValue(':vale',$vale);
        $sql->bindValue(':cargaHoraria',$cargaHoraria);
        $sql->bindValue(':diaPag',$diaPag);
        $sql->bindValue(':diaVale',$diaVale);
        $sql->bindValue(':forma',$forma);
        $sql->bindValue(':devolucao',$devolucao);
        $sql->bindValue(':tributos',$tributos);
        $sql->bindValue(':periculosidade',$periculosidade);
        $sql->bindValue(':insalubridade',$insalubridade);
        $sql->bindValue(':SAT',$SAT);
        $sql->bindValue(':informacoes',$informacoes);
        $sql->bindValue(':idCliente',$idCliente);
        if($sql->execute() === false){
           $erro=$sql->errorInfo();
           echo "<small class='text-danger'>Erro ao atualizar faturamento: ".$erro[2]."</small>";
           return 0;
        }
    }

    public function formasContratacaoCliente($idCliente){
        $sql = $this->db->prepare("SELECT lf.id, lf.forma
                                     FROM `cliente_formascontratacao` AS `fc`
                                     JOIN `cliente_lista_formacontratacao` AS `lf`
                                       ON fc.idForma=lf.id
                                    WHERE fc.idCliente=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function listTaxas($tipoTaxa,$idCliente){
        $sql = $this->db->prepare("SELECT *
                                     FROM `cliente_taxas` 
                                    WHERE `idCliente`=:idCliente
                                      AND `tipoTaxa`=:tipoTaxa");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':tipoTaxa',$tipoTaxa);
        $sql->execute();
        return $sql->fetchAll();

    }

    public function tipoVagaCliente(){
        $sql = $this->db->prepare("SELECT * 
                                     FROM `vagas_lista_tipovaga`");
        $sql->execute();
        return $sql->fetchAll();
    }
        
    public function salvaTaxa($idCliente,$tipo,$contratacao,$taxaEspecial,$valorTaxaTipo,$valorTaxa,$encargoTipo,$encargo,$tributoTipo,$tributo,$tipoVaga,$prazo,$observacoes){
        $sql = $this->db->prepare("INSERT INTO `cliente_taxas`
                                               (`idCliente`,`tipoTaxa`,`contratacao`,`valorTaxa`,`taxaEspecial`,`valorTaxaTipo`,`encargo`,`encargoTipo`,`tributo`,`tributoTipo`,`tipoVaga`,`prazo`,`observacoes`)
                                        VALUES (:idCliente,:tipo,:contratacao,:valorTaxa,:taxaEspecial,:valorTaxaTipo,:encargo,:encargoTipo,:tributo,:tributoTipo,:tipoVaga,:prazo,:observacoes)");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':tipo',$tipo);
        $sql->bindValue(':contratacao',$contratacao);
        $sql->bindValue(':valorTaxa',$valorTaxa);
        $sql->bindValue(':taxaEspecial',$taxaEspecial);
        $sql->bindValue(':valorTaxaTipo',$valorTaxaTipo);
        $sql->bindValue(':encargo',$encargo);
        $sql->bindValue(':encargoTipo',$encargoTipo);
        $sql->bindValue(':tributo',$tributo);
        $sql->bindValue(':tributoTipo',$tributoTipo);
        $sql->bindValue(':tipoVaga',$tipoVaga);
        $sql->bindValue(':prazo',$prazo);
        $sql->bindValue(':observacoes',$observacoes);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo "<small class='text-danger'>Erro ao inserir a taxa: ".$erro[2]."</small>";
            return 0;
         }
    }

    public function removeTaxaCliente($idTaxa){
        $sql = $this->db->prepare("DELETE FROM `cliente_taxas` WHERE `id`=:idTaxa");
        $sql->bindValue(':idTaxa',$idTaxa);
        $sql->execute();
    }

    public function gravaObsTaxaCliente($idCliente,$observacoes){
        $sql=$this->db->prepare("UPDATE `cliente_faturamento`
                                    SET `observacaoTaxa`=:observacoes
                                  WHERE `idCliente`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->bindValue(':observacoes',$observacoes);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo "<small class='text-danger'>Erro ao inserir a taxa: ".$erro[2]."</small>";
            return 0;
         }
    }

    
}