<?php 
namespace Models;
use \Core\Model;

class Configuracoes extends Model{
    
    //AGENCIA
    public function totalFuncoesVaga(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `vagas_lista_funcao`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listFuncoesVaga(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_funcao`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addFuncaoVaga($funcao){
        $sql = $this->db->prepare("INSERT INTO `vagas_lista_funcao` 
                                              (`funcao`) 
                                         VALUE(:funcao)");
        $sql->bindValue(':funcao',$funcao);
        if($sql->execute()===false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao inserir a função: ".$error[2]."</small>";
        }
    }

    public function delFuncaoVaga($idFuncao){
        $sql = $this->db->prepare("DELETE FROM `vagas_lista_funcao` WHERE `id`=:idFuncao");
        $sql->bindValue(':idFuncao',$idFuncao);
        if($sql->execute()===false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a função:".$error[2]."</small>";
        };
    }

    public function infoFuncao($idFuncao){
        $sql=$this->db->prepare("SELECT * FROM `vagas_lista_funcao` WHERE `id`=:idFuncao");
        $sql->bindValue(":idFuncao",$idFuncao);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvaFuncaoVaga($idFuncao,$funcao){
        $sql = $this->db->prepare("UPDATE `vagas_lista_funcao` 
                                      SET `funcao`=:funcao
                                    WHERE `id`=:idFuncao");
        $sql->bindValue(':funcao',$funcao);
        $sql->bindValue(':idFuncao',$idFuncao);
        if($sql->execute()===false){
            $error = $sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao salvar a função:".$error[2]."</small>";
        };
    }

    public function totalEspecialidadesVaga(){
        $sql=$this->db->prepare("SELECT COUNT(*) AS `total` FROM `vagas_lista_especialidade`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }
    
    public function listEspecialidadesVagas(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_especialidade`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addEspecialidadeVaga($especialidade,$funcao){
        $sql = $this->db->prepare("INSERT INTO `vagas_lista_especialidade` 
                                               (`idFuncao`,`especialidade`)
                                          VALUE(:funcao,:especialidade)");
        $sql->bindValue(':funcao',$funcao);
        $sql->bindValue(':especialidade',$especialidade);
        if($sql->execute()===false){
            $error=errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguine erro ao inserir a especialidade: ".$error[2]."</small>";
        }
    }

    public function delEspecialidadeVaga($idEspecialidade){
        $sql = $this->db->prepare("DELETE FROM `vagas_lista_especialidade` WHERE `id`=:idEspecialidade");
        $sql->bindValue(':idEspecialidade',$idEspecialidade);
        if($sql->execute()===false){
            $error=errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a especialidade:".$error[2]."</small>";
        }
    }

    public function infoEspecialicade($idEspecialidade){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_especialidade` WHERE `id`=:idEspecialidade");
        $sql->bindValue(':idEspecialidade',$idEspecialidade);
        $sql->execute();
        return $sql->fetch();
    }  

    public function salvaEspecialidadeVaga($idEspecialidade,$especialidade,$idFuncao){
        $sql = $this->db->prepare("UPDATE `vagas_lista_especialidade`
                                      SET `especialidade`=:especialidade,
                                          `idFuncao`=:idFuncao
                                    WHERE `id`=:idEspecialidade");
        $sql->bindValue(':idEspecialidade',$idEspecialidade);
        $sql->bindValue(':especialidade',$especialidade);
        $sql->bindValue(':idFuncao',$idFuncao);
        if($sql->execute()===false){
            $error=errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao atualizar a especialidade:".$error[2]."</small>";
        }
    }

    //VAGAS
    //Status
    public function totalStatusVaga(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `vagas_lista_status`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listStatusVagas(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_status`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addStatusVaga($cliente,$nome,$tipo){
        $sql = $this->db->prepare("INSERT INTO `vagas_lista_status`
                                               (`idCliente`,`status`,`tipo`,`default`)
                                        VALUES (:cliente,:nome,:tipo,0)");
        $sql->bindValue(':cliente',$cliente);
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':tipo',$tipo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o status: '.$error[2].'</small>';
        }
    }

    public function delStatusVaga($idStatus){
        $sql = $this->db->prepare("DELETE FROM `vagas_lista_status` WHERE `id`=:idStatus");
        $sql->bindValue(':idStatus',$idStatus);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover o status: ".$error[2]."</small>";
        }
    }

    public function infoVaga($idStatus){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_status` WHERE `id`=:idStatus");
        $sql->bindValue(':idStatus',$idStatus);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvaStatusVaga($idStatus,$nome,$tipo){
        $sql = $this->db->prepare("UPDATE `vagas_lista_status`
                                      SET `status`=:nome,
                                          `tipo`=:tipo
                                    WHERE `id`= :idStatus");        
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':tipo',$tipo);
        $sql->bindValue(':idStatus',$idStatus);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar a status: '.$error[2].'</small>';
        }
    }


    //Beneficios
    public function totalBeneficiosVaga(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `vagas_lista_beneficios`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listBeneficiosVagas(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_beneficios`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addBeneficioVaga($beneficio,$tipo,$complemento){
        $sql = $this->db->prepare("INSERT INTO `vagas_lista_beneficios`
                                               (`beneficio`,`tipo`,`complemento`)
                                        VALUES (:beneficio,:tipo,:complemento)");
        $sql->bindValue(':beneficio',$beneficio);
        $sql->bindValue(':tipo',$tipo);
        $sql->bindValue(':complemento',$complemento);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o benefício: '.$error[2].'</small>';
        }
    }
    public function delBeneficioVaga($idBeneficio){
        $sql = $this->db->prepare("DELETE FROM `vagas_lista_beneficios` WHERE `id`=:idBeneficio");
        $sql->bindValue(':idBeneficio',$idBeneficio);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover o benefício: ".$error[2]."</small>";
        }
    }

    public function infoBeneficio($idBeneficio){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_beneficios` WHERE `id`=:idBeneficio");
        $sql->bindValue(':idBeneficio',$idBeneficio);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvaBeneficioVaga($idBeneficio,$beneficio,$tipo,$complemento){
        $sql = $this->db->prepare("UPDATE `vagas_lista_beneficios`
                                      SET `beneficio`=:beneficio,
                                          `tipo`=:tipo,
                                          `complemento`=:complemento
                                    WHERE `id`= :idBeneficio");        
        $sql->bindValue(':beneficio',$beneficio);
        $sql->bindValue(':tipo',$tipo);
        $sql->bindValue(':complemento',$complemento);
        $sql->bindValue(':idBeneficio',$idBeneficio);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar a benefício: '.$error[2].'</small>';
        }
    }
    
    public function totalFormasContratacao(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `vagas_lista_formacontratacao`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listarFormasContratacaoVagas(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_formacontratacao`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addFormaContratacaoVaga($forma){
        $sql = $this->db->prepare("INSERT INTO `vagas_lista_formacontratacao` (`forma`) VALUE (:forma)");
        $sql->bindValue(':forma',$forma);
        if($sql->execute()===false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao adicionar a forma:".$error[2]."</small>";
        }
    }

    public function delFormaContratacaoVaga($idForma){
        $sql = $this->db->prepare("DELETE FROM `vagas_lista_formacontratacao` WHERE `id`=:idForma");
        $sql->bindValue(':idForma',$idForma);
        if($sql->execute()===false){
            $error = $sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a forma:".$error[2]."</small>";
        }
    }

    public function infoFormaContratacaoVaga($idForma){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_formacontratacao` WHERE `id`=:idForma");
        $sql->bindValue(':idForma',$idForma);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvarFormaContratacaoVaga($idForma,$forma){
        $sql = $this->db->prepare("UPDATE `vagas_lista_formacontratacao` SET `forma`=:forma WHERE `id`=:idForma");
        $sql->bindValue(':idForma',$idForma);
        $sql->bindValue(':forma',$forma);
        if($sql->execute()===false){
            $error = $sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao atualizar a forma:".$error[2]."</small>";
        }
    }

    //USUARIOS
    public function totalPerfis(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `users_perfis`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listPerfisUsuarios(){
        $sql = $this->db->prepare("SELECT * FROM `users_perfis`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addPerfilUsuarios($perfil){
        $sql = $this->db->prepare("INSERT INTO `users_perfis` (`perfil`) VALUE (:perfil)");
        $sql->bindValue(':perfil',$perfil);
        if($sql->execute()===false){
            $error = $sql->errorInfo();
            echo "<small class='text-danfer'>Ocorreu o seguinte erro ao gravar o perfil: ".$error[2]."</small>";
        }
    }

    public function delPerfilUsuarios($idPerfil){
        $sql = $this->db->prepare("DELETE FROM `users_perfis` WHERE `id`=:idPerfil");
        $sql->bindValue(':idPerfil',$idPerfil);
        if($sql->execute() === false){
            $error = $sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a célula:".$error[2]."</small>";
        }
    }

    public function infoPerfil($idPerfil){
        $sql = $this->db->prepare("SELECT * FROM `users_perfis` WHERE `id`=:idPerfil");
        $sql->bindValue(':idPerfil',$idPerfil);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvaPerfilUsuario($idPerfil,$perfil){
        $sql = $this->db->prepare("UPDATE `users_perfis`
                                      SET `perfil`=:perfil
                                    WHERE `id`= :idPerfil");        
        $sql->bindValue(':idPerfil',$idPerfil);
        $sql->bindValue(':perfil',$perfil);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar o perfil: '.$error[2].'</small>';
        }
    }


    public function totalCelulas(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `users_celulas`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listCelulasUsuarios(){
        $sql = $this->db->prepare("SELECT * FROM `users_celulas`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addCelulaUsuarios($celula){
        $sql = $this->db->prepare("INSERT INTO `users_celulas` (`celula`) VALUE (:celula)");
        $sql->bindValue(':celula',$celula);
        if($sql->execute()===false){
            $error = $sql->errorInfo();
            echo "<small class='text-danfer'>Ocorreu o seguinte erro ao gravar a célula: ".$error[2]."</small>";
        }
    }

    public function delCelulaUsuarios($idCelula){
        $sql = $this->db->prepare("DELETE FROM `users_celulas` WHERE `id`=:idCelula");
        $sql->bindValue(':idCelula',$idCelula);
        if($sql->execute() === false){
            $error = $sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a célula:".$error[2]."</small>";
        }
    }

    public function infoCelula($idCelula){
        $sql = $this->db->prepare("SELECT * FROM `users_celulas` WHERE `id`=:idCelula");
        $sql->bindValue(':idCelula',$idCelula);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvaCelulaUsuario($idCelula,$celula){
        $sql = $this->db->prepare("UPDATE `users_celulas`
                                      SET `celula`=:celula
                                    WHERE `id`= :idCelula");        
        $sql->bindValue(':idCelula',$idCelula);
        $sql->bindValue(':celula',$celula);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar a célula: '.$error[2].'</small>';
        }
    }

    //CANDIDATOS


    //CLIENTES
    public function totalStatus(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_status`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listStatusClientes(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_status`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addStatusCliente($nome,$tipo){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_status`
                                               (`status`,`tipo`,`default`)
                                        VALUES (:nome,:tipo,0)");
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':tipo',$tipo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o status: '.$error[2].'</small>';
        }
    }

    public function delStatusCliente($idStatus){
        $sql = $this->db->prepare("DELETE FROM `cliente_lista_status` WHERE `id`=:idStatus");
        $sql->bindValue(':idStatus',$idStatus);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover o status: ".$error[2]."</small>";
        }
    }


    public function totalOrigens(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_origens`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listOrigensClientes(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_origens`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addOrigemCliente($nome){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_origens`
                                               (`origem`)
                                        VALUES (:nome)");
        $sql->bindValue(':nome',$nome);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar a origem: '.$error[2].'</small>';
        }
    }

    public function delOrigemCliente($idOrigem){
        $sql = $this->db->prepare("DELETE FROM `cliente_lista_origens` WHERE `id`=:idOrigem");
        $sql->bindValue(':idOrigem',$idOrigem);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a origem: ".$error[2]."</small>";
        }
    }


    public function totalServicos(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_servicos`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listServicosClientes(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_servicos`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addServicoCliente($nome){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_servicos`
                                               (`servico`)
                                        VALUES (:nome)");
        $sql->bindValue(':nome',$nome);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o serviço: '.$error.'</small>';
        }
    }



    public function totalHistoricos(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_tiposhistoricos`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listHistoricosClientes(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_tiposhistoricos`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addHistoricoCliente($cod,$descricao,$visita){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_tiposhistoricos`
                                               (`cod`,`descricao`,`visita`)
                                        VALUES (:cod,:descricao,:visita)");
        $sql->bindValue(':cod',$cod);
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':visita',$visita);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o histórico: '.$error[2].'</small>';
        }
    }

    public function delHistoricoCliente($idHistorico){
        $sql = $this->db->prepare("DELETE FROM `cliente_lista_tiposhistoricos` WHERE `id`=:idHistorico");
        $sql->bindValue(':idHistorico',$idHistorico);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover o histórico: ".$error[2]."</small>";
        }
    }



    public function totalZonas(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_zonas`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listZonasClientes(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_zonas`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function getInfoZona($idZona){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_zonas` WHERE `id`=:idZona");
        $sql->bindValue(':idZona',$idZona);
        $sql->execute();
        return $sql->fetch();
    }


    public function addZonaCliente($descricao,$estado,$cidade){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_zonas`
                                               (`descricao`,`estado`,`cidade`)
                                        VALUES (:descricao,:estado,:cidade)");        
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':estado',$estado);
        $sql->bindValue(':cidade',$cidade);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o histórico: '.$error[2].'</small>';
        }
        return $this->db->lastInsertId();
    }

    public function addFaixaCep($idZona,$cepInicio,$cepFinal){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_zonas_faixas_cep`
                                               (`idZona`,`CepInicio`,`CepFinal`)
                                        VALUES (:idZona,:cepInicio,:cepFinal)");
        $sql->bindValue(':idZona',$idZona);
        $sql->bindValue(':cepInicio',$cepInicio);
        $sql->bindValue(':cepFinal',$cepFinal);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o histórico: '.$error[2].'</small>';
        }
    }

    public function salvaZonaCliente($idZona,$descricao,$estado,$cidade){
        $sql = $this->db->prepare("UPDATE `cliente_lista_zonas`
                                      SET `descricao`=:descricao,
                                          `estado`=:estado,
                                          `cidade`=:cidade
                                    WHERE `id`= :idZona");        
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':estado',$estado);
        $sql->bindValue(':cidade',$cidade);
        $sql->bindValue(':idZona',$idZona);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar a zona: '.$error[2].'</small>';
        }
    }

    public function qtdFaixaCeps($idZona){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_zonas_faixas_cep` WHERE `idZona`=:idZona");
        $sql->bindValue(':idZona',$idZona);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function faixasCepsZona($idZona){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_zonas_faixas_cep` WHERE `idZona`=:idZona");
        $sql->bindValue(':idZona',$idZona);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function delZonaCliente($idZona){
        $sql = $this->db->prepare("DELETE FROM `cliente_lista_zonas` WHERE `id`=:idZona");
        $sql->bindValue(':idZona',$idZona);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a zona: ".$error[2]."</small>";
        }
        $this->delFaixasCep($idZona);
    }

    public function delFaixasCep($idZona){
        $sql = $this->db->prepare("DELETE FROM `cliente_lista_zonas_faixas_cep` WHERE `idZona`=:idZona");
        $sql->bindValue(':idZona',$idZona);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover a zona: ".$error[2]."</small>";
        }
    }


    public function totalRamos(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_ramos`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listRamosClientes(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_ramos`");
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function addRamoCliente($ramo){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_ramos`
                                               (`ramo`)
                                        VALUES (:ramo)");
        $sql->bindValue(':ramo',$ramo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o ramo: '.$error[2].'</small>';
        }
    }
    public function delRamoCliente($idRamo){
        $sql = $this->db->prepare("DELETE FROM `cliente_lista_ramos` WHERE `id`=:idRamo");
        $sql->bindValue(':idRamo',$idRamo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover o ramo: ".$error[2]."</small>";
        }
    }
    public function getInfoRamo($idRamo){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_ramos` WHERE `id`= :idRamo");
        $sql->bindValue(':idRamo',$idRamo);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvaRamoCliente($idRamo,$ramo){
        $sql = $this->db->prepare("UPDATE `cliente_lista_ramos`
                                      SET `ramo`=:ramo
                                    WHERE `id`= :idRamo");        
        $sql->bindValue(':idRamo',$idRamo);
        $sql->bindValue(':ramo',$ramo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar o ramo: '.$error[2].'</small>';
        }
    }



    public function totalGPO(){
        $sql = $this->db->prepare("SELECT COUNT(*) AS `total` FROM `cliente_lista_grupos`");
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function listGruposClientes(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_grupos`");
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function addGrupoCliente($grupo){
        $sql = $this->db->prepare("INSERT INTO `cliente_lista_grupos`
                                               (`nome`)
                                        VALUES (:grupo)");
        $sql->bindValue(':grupo',$grupo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao gravar o grupo: '.$error[2].'</small>';
        }
    }
    public function delGrupoCliente($idGrupo){
        $sql = $this->db->prepare("DELETE FROM `cliente_lista_grupos` WHERE `id`=:idGrupo");
        $sql->bindValue(':idGrupo',$idGrupo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover o grupo: ".$error[2]."</small>";
        }
    }
    public function getInfoGrupo($idGrupo){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_grupos` WHERE `id`= :idGrupo");
        $sql->bindValue(':idGrupo',$idGrupo);
        $sql->execute();
        return $sql->fetch();
    }

    public function salvaGrupoCliente($idGrupo,$grupo){
        $sql = $this->db->prepare("UPDATE `cliente_lista_grupos`
                                      SET `nome`=:grupo
                                    WHERE `id`= :idGrupo");        
        $sql->bindValue(':idGrupo',$idGrupo);
        $sql->bindValue(':grupo',$grupo);
        if($sql->execute() === false){
            $error=$sql->errorInfo();
            echo '<small class="text-danger">Ocorreu o seguinte erro ao salvar o grupo: '.$error[2].'</small>';
        }
    }      
    
    
    public function listFormasContratacao(){
        $sql = $this->db->prepare("SELECT * FROM `cliente_lista_formacontratacao`");
        $sql->execute();
        return $sql->fetchAll();
    }
}



