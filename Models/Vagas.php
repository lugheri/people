<?php 
namespace Models;
use \Core\Model;

class Vagas extends Model{
    public function buscarVagas($conta,$status,$filial,$buscarPor,$razao,$codigo,$selecionador,$de,$ate,$titulo,$celula,$campoOrdem,$ordem){
        if($status=='todos'){$qSt='';}else{$qSt="AND v.status='".$status."'";}
        //if($filial=='todas'){}
        if($buscarPor=="razaoSocial"){            
            if(empty($razao)){
                $sql = $this->db->prepare("SELECT v.id,v.dataCadastro,v.titulo,v.numeroVagas,c.nome 
                                             FROM `vagas_informacoes` AS `v`
                                             JOIN `clientes` AS `c`
                                               ON v.idCliente=c.id WHERE 1=1 $qSt
                                               ORDER BY $campoOrdem $ordem
                                            LIMIT 20");
            }else{
                $sql = $this->db->prepare("SELECT v.id,v.dataCadastro,v.titulo,v.numeroVagas,c.nome
                                             FROM `vagas_informacoes` AS `v`
                                             JOIN `clientes` AS `c`
                                               ON v.idCliente=c.id
                                            WHERE c.nome like :razao
                                            ORDER BY $campoOrdem $ordem
                                              $qSt
                                            LIMIT 20");
                $sql->bindValue(':razao','%'.$razao.'%');
            }       
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
            return $sql->fetchAll();  
         }
     
         if($buscarPor=="codigoVaga"){
            $codigo=$_POST['codigo'];
            $sql = $this->db->prepare("SELECT v.id,v.dataCadastro,v.titulo,v.numeroVagas,c.nome
                                             FROM `vagas_informacoes` AS `v`
                                             JOIN `clientes` AS `c`
                                               ON v.idCliente=c.id
                                            WHERE v.id = :codigo
                                            ORDER BY $campoOrdem $ordem
                                              $qSt
                                            LIMIT 20");
            $sql->bindValue(':codigo',$codigo);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
            return $sql->fetchAll();  
         }
     
         if($buscarPor=="selecionador"){
             $selecionador=$_POST['selecionador'];
         }
     
         if($buscarPor=="data"){
             $de=$_POST['de'];
             $ate=$_POST['ate'];
             $sql = $this->db->prepare("SELECT v.id,v.dataCadastro,v.titulo,v.numeroVagas,c.nome
                                              FROM `vagas_informacoes` AS `v`
                                              JOIN `clientes` AS `c`
                                                ON v.idCliente=c.id
                                             WHERE v.dataCadastro >= :de
                                               AND v.dataCadastro <= :ate
                                             ORDER BY $campoOrdem $ordem
                                               $qSt
                                             LIMIT 20");
             $sql->bindValue(':de',$de);
             $sql->bindValue(':ate',$ate);
             if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
             return $sql->fetchAll();  
         }
     
         if($buscarPor=="tituloVaga"){
             $titulo=$_POST['titulo'];
             $sql = $this->db->prepare("SELECT v.id,v.dataCadastro,v.titulo,v.numeroVagas,c.nome
                                             FROM `vagas_informacoes` AS `v`
                                             JOIN `clientes` AS `c`
                                               ON v.idCliente=c.id
                                            WHERE v.titulo LIKE :titulo
                                            ORDER BY $campoOrdem $ordem
                                              $qSt
                                            LIMIT 20");
            $sql->bindValue(':titulo','%'.$titulo.'%');
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
            return $sql->fetchAll();  
         }
     
         if($buscarPor=="celula"){
             $celula=$_POST['celula'];
         }
    }


    public function novaVaga($cliente){
        //verifica se existe uma vaga vazia
        $sql = $this->db->prepare("SELECT `id` FROM `vagas_informacoes` WHERE `preenchido`=0 AND `idCliente`=:cliente");
        $sql->bindValue(':cliente',$cliente);
        $sql->execute();
    
        if($sql->rowCount() > 0) {
            //caso sim, retorna o id do mesmo
            $rs=$sql->fetch();
            return $rs['id'];
        }else{
            //do contrario, cadastra um novo
    
            //inserindo banco de informacoes
            $sql = $this->db->prepare("INSERT INTO `vagas_informacoes` 
                                                  (`dataCadastro`,`idCliente`,`preenchido`)
                                           VALUES (NOW(),:cliente,0)");
            $sql->bindValue(':cliente',$cliente);
            $sql->execute();
    
            $idVaga = $this->db->lastInsertId();
    
            $sql = $this->db->prepare("INSERT INTO `vagas_requisitos` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_local` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_idiomas` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_contratacao` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_entrevistas` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_encaminhamentos` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_email` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_arquivo` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();

            $sql = $this->db->prepare("INSERT INTO `vagas_caracteristica` (`idVaga`) VALUES ('$idVaga')");
            $sql->execute();               
            
            return $idVaga;
        }
    }

    public function gravaCampoVaga($idVaga,$tabela,$campo,$valor){
        if($tabela=='vagas_informacoes'){$id='id';$preenchido="`preenchido`='1',";}else{$id='idVaga';$preenchido="";}
        $sql = $this->db->prepare("UPDATE `$tabela` SET $preenchido `$campo`=:valor WHERE `$id`=:idVaga");
        $sql->bindValue(':valor',$valor);
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
    }

    public function idCliente($idVaga){
        $sql = $this->db->prepare("SELECT `idCliente` FROM `vagas_informacoes` WHERE `id`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['idCliente'];

    }

    public function listarSelecionadores($idVaga){
        $sql = $this->db->prepare("SELECT s.idSelecionador, u.nome 
                                     FROM `vagas_selecionadores` as s
                                     JOIN users as u 
                                       ON u.id=s.idSelecionador
                                     WHERE `idVaga`=:idVaga;");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function verificaSelecionador($idVaga,$idSelecionador){
        $sql = $this->db->prepare("SELECT `id` 
                                     FROM `vagas_selecionadores`
                                    WHERE `idVaga`=:idVaga
                                      AND `idSelecionador`=:idSelecionador
                                    LIMIT 1");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idSelecionador',$idSelecionador);
        $sql->execute();
        if($sql->rowCount() == 0) {
            return false;
        }else{
            return true;
        }
    }

    public function editaSelecionador($idVaga,$idUsuario,$acao){
        if($acao=="add"){
            if($this->verificaSelecionador($idVaga,$idUsuario)== false) {
                $sql=$this->db->prepare("INSERT INTO `vagas_selecionadores` 
                                                    (`idVaga`,`idSelecionador`)
                                            VALUES (:idVaga,:idSelecionador)");
                $sql->bindValue(':idVaga',$idVaga);
                $sql->bindValue(':idSelecionador',$idUsuario);
                $sql->execute();
            }
        
        }else if($acao=="del"){
            $sql=$this->db->prepare("DELETE FROM `vagas_selecionadores`
                                           WHERE `idVaga`=:idVaga
                                             AND `idSelecionador`=:idSelecionador");
            $sql->bindValue(':idVaga',$idVaga);
            $sql->bindValue(':idSelecionador',$idUsuario);
            $sql->execute();
        }
        
    }

    public function listarStatus($conta){
        $sql = $this->db->prepare("SELECT `id`, `status` FROM `vagas_lista_status` WHERE `default`=1 OR idCliente=:conta;");
        $sql->bindValue(':conta',$conta);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function nomeStatus($idStatus){
        $sql = $this->db->prepare("SELECT `status` FROM `vagas_lista_status` WHERE `id`=:idStatus");
        $sql->bindValue(':idStatus',$idStatus);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['status'];
    }

    public function listarTipoVaga($conta){
        $sql = $this->db->prepare("SELECT `id`, `tipoVaga` FROM `vagas_lista_tipovaga` WHERE `default`=1 OR idCliente=:conta;");
        $sql->bindValue(':conta',$conta);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function nomeTipoVaga($tipoVaga){
        $sql = $this->db->prepare("SELECT `tipoVaga` FROM `vagas_lista_tipovaga` WHERE `id`=:tipoVaga");
        $sql->bindValue(':tipoVaga',$tipoVaga);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['tipoVaga'];
    }   

    public function listarFuncao($conta){
        $sql = $this->db->prepare("SELECT `id`, `funcao` FROM `vagas_lista_funcao` WHERE `default`=1 OR idCliente=:conta;");
        $sql->bindValue(':conta',$conta);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function nomeFuncao($idFuncao){
        $sql = $this->db->prepare("SELECT `funcao` FROM `vagas_lista_funcao` WHERE `id`=:idFuncao");
        $sql->bindValue(':idFuncao',$idFuncao);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['funcao'];
    }

    public function especialidadesFuncao($idFuncao){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_especialidade` WHERE `idFuncao`=:idFuncao");
        $sql->bindValue(':idFuncao',$idFuncao);
        $sql->execute();
        return $sql->fetchAll();
    }


    public function listarHierarquia($conta){
        $sql = $this->db->prepare("SELECT `id`, `hierarquia` FROM `vagas_lista_hierarquia` WHERE `default`=1 OR idCliente=:conta;");
        $sql->bindValue(':conta',$conta);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function nomeHierarquia($idHierarquia){
        $sql = $this->db->prepare("SELECT `hierarquia` FROM `vagas_lista_hierarquia` WHERE `id`=:idHierarquia");
        $sql->bindValue(':idHierarquia',$idHierarquia);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['hierarquia'];
    }

    public function listarFormasContratacao(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_formacontratacao`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function listaBeneficios(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_beneficios`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function beneficiosVaga($idVaga){
        $sql = $this->db->prepare("SELECT b.idVaga,b.valor,b.id,l.beneficio
                                     FROM `vagas_beneficios` AS `b`
                                     JOIN `vagas_lista_beneficios` AS `l` 
                                       ON l.id=b.beneficio
                                    WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function addBeneficioVaga($idVaga,$beneficio,$valor){
        $sql = $this->db->prepare("INSERT INTO `vagas_beneficios` (`idVaga`,`beneficio`,`valor`) VALUE(:idVaga,:beneficio,:valor)");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':beneficio',$beneficio);
        $sql->bindValue(':valor',$valor);
        if($sql->execute() === false){
            $error = $sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao adicionar o benefício:".$error[2]."</small>";
        }
    }

    public function removeBeneficioVaga($idBeneficio){
        $sql = $this->db->prepare("DELETE FROM `vagas_beneficios` WHERE `id`=:idBeneficio");
        $sql->bindValue(':idBeneficio',$idBeneficio);
        if($sql->execute() === false){
            $error = $sql->errorInfo();
            echo "<small class='text-danger'>Ocorreu o seguinte erro ao remover o benefício:".$error[2]."</small>";
        }
    }

    public function listaEscolaridade(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_escolaridade`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function nomeEscolaridade($idEscolaridade){
        $sql = $this->db->prepare("SELECT `escolaridade` FROM `vagas_lista_escolaridade` WHERE `id`=:idEscolaridade");
        $sql->bindValue(':idEscolaridade',$idEscolaridade);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['escolaridade'];
    }


    public function listaSexo(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_sexo`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function nomeSexo($idSexo){
        $sql = $this->db->prepare("SELECT `sexo` FROM `vagas_lista_sexo` WHERE `id`=:idSexo");
        $sql->bindValue(':idSexo',$idSexo);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['sexo'];
    }

    public function listaAreasInformatica(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_areasinformatica`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function listaIdiomas(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_idiomas`");
        $sql->execute();
        return $sql->fetchAll();
    }


    public function getInfo($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_informacoes` WHERE `id`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetch();
    }
    public function getRequisitos($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_requisitos` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetch();
    }

    public function adicionarAreaInformatica($idVaga,$area,$nivel){

        $sql = $this->db->prepare("SELECT `id` FROM `vagas_tblareasinformatica` WHERE `idVaga`=:idVaga AND `area`=:area AND `nivel`=:nivel LIMIT 1");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':area',$area);
        $sql->bindValue(':nivel',$nivel);
        if($sql->execute() === false){
			$erro=$sql->errorInfo();
			echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
		}
        if($sql->rowCount() == 0) {
           $sql=$this->db->prepare("INSERT INTO `vagas_tblareasinformatica` 
                                                (`idVaga`,`area`,`nivel`)
                                         VALUES (:idVaga,:area,:nivel)");
           $sql->bindValue(':idVaga',$idVaga);
           $sql->bindValue(':area',$area);
           $sql->bindValue(':nivel',$nivel);
           if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
        }
    }

    public function removerAreaInformatica($idArea){
        $sql = $this->db->prepare("DELETE FROM `vagas_tblareasinformatica` WHERE `id`=:idArea");
        $sql->bindValue(':idArea',$idArea);
        $sql->execute();
    }

    
    public function adicionarIdioma($idVaga,$idioma,$nivel){

        $sql = $this->db->prepare("SELECT `id` FROM `vagas_idiomas` WHERE `idVaga`=:idVaga AND `ididioma`=:idioma AND `nivel`=:nivel LIMIT 1");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idioma',$idioma);
        $sql->bindValue(':nivel',$nivel);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
        }
        if($sql->rowCount() == 0) {
            $sql=$this->db->prepare("INSERT INTO `vagas_idiomas` 
                                                    (`idVaga`,`ididioma`,`nivel`)
                                            VALUES (:idVaga,:idioma,:nivel)");
            $sql->bindValue(':idVaga',$idVaga);
            $sql->bindValue(':idioma',$idioma);
            $sql->bindValue(':nivel',$nivel);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
        }
    }

    public function removerIdioma($idIdioma){
        $sql = $this->db->prepare("DELETE FROM `vagas_idiomas` WHERE `id`=:idIdioma");
        $sql->bindValue(':idIdioma',$idIdioma);
        $sql->execute();
        
    }
    
    public function getAreasInformatica($idVaga){
        $sql = $this->db->prepare("SELECT l.area,t.nivel,t.id 
                                     FROM `vagas_tblareasinformatica` AS `t`
                                     JOIN `vagas_lista_areasinformatica` AS `l`
                                       ON l.id=t.area
                                    WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }
            
    public function addEntrevista($idVaga,$dia,$hora,$localizacao,$contato){

        $sql = $this->db->prepare("SELECT `id` FROM `vagas_entrevistas` 
                                    WHERE `idVaga`=:idVaga AND `data`=:dia AND `hora`=:hora AND `local`=:localizacao LIMIT 1");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':dia',$dia);
        $sql->bindValue(':hora',$hora);
        $sql->bindValue(':localizacao',$localizacao);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
        }
        if($sql->rowCount() == 0) {
            $sql=$this->db->prepare("INSERT INTO `vagas_entrevistas` 
                                                    (`idVaga`,`data`,`hora`,`local`,`contato`)
                                            VALUES (:idVaga,:dia,:hora,:localizacao,:contato)");
            $sql->bindValue(':idVaga',$idVaga);
            $sql->bindValue(':dia',$dia);
            $sql->bindValue(':hora',$hora);
            $sql->bindValue(':localizacao',$localizacao);
            $sql->bindValue(':contato',$contato);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
        }
    }

    public function removerEntrevista($idEntrevista){
        $sql = $this->db->prepare("DELETE FROM `vagas_entrevistas` WHERE `id`=:idEntrevista");
        $sql->bindValue(':idEntrevista',$idEntrevista);
        $sql->execute();
        
    }

    public function getLocal($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_local` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetch();
    }

    public function getIdiomas($idVaga){
        $sql = $this->db->prepare("SELECT i.id,l.idioma,i.nivel
                                     FROM `vagas_idiomas` AS `i`
                                     JOIN `vagas_lista_idiomas` AS `l` 
                                       ON i.ididioma=l.id
                                    WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function getContratacao($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_contratacao` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetch();
    }

    public function getEntrevistas($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_entrevistas` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function getEncaminhamentos($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_encaminhamentos` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetch();
    }


    public function getEncaminhamentosCliente($idVaga){
        if(!empty($this->condicoesEncaminhamentoVaga($idVaga))){
            return $this->condicoesEncaminhamentoVaga($idVaga);
        }else{
            return $this->condicoesEncaminhamentoCliente($this->idCliente($idVaga));
        }
    }
    
    public function condicoesEncaminhamentoVaga($idVaga){
        $sql = $this->db->prepare("SELECT `condicoesCliente` FROM `vagas_encaminhamentos` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['condicoesCliente'];
    }

    public function condicoesEncaminhamentoCliente($idCliente){
        $sql = $this->db->prepare("SELECT `condicoesEncVaga` FROM `clientes` WHERE `id`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['condicoesEncVaga'];
    }

    public function getObservacaoCliente($idVaga){
        if(!empty($this->observacaoVaga($idVaga))){
            return $this->observacaoVaga($idVaga);
        }else{
            return $this->observacaoCliente($this->idCliente($idVaga));
        }
    }

    public function observacaoVaga($idVaga){
        $sql = $this->db->prepare("SELECT `observacoesVaga` FROM `vagas_encaminhamentos` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['observacoesVaga'];
    }

    public function observacaoCliente($idCliente){
        $sql = $this->db->prepare("SELECT `observacoes` FROM `clientes` WHERE `id`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['observacoes'];
    }



    public function getEmails($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_email` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetch();
    }

    public function getArquivos($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_arquivo` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function importarArquivoVaga($idVaga,$arquivo,$nome,$descricao,$tipo){
        //VERIFICA SE A IMAGEM JA FOI IMPORTADA
        $sql = $this->db->prepare("SELECT `id` FROM `vagas_arquivo` WHERE `idVaga`=:idVaga AND `arquivo`=:arquivo LIMIT 1");
        $sql->bindValue(':arquivo',$arquivo);
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();

        if($sql->rowCount()==0){//CASO NÃO, REALIZA A IMPORTACAO
            $sql = $this->db->prepare("INSERT INTO `vagas_arquivo` 
                                                  (`idVaga`,`nome`,`arquivo`,`descricao`,`tipo`)
                                           VALUES (:idVaga,:nome,:arquivo,:descricao,:tipo)");
            $sql->bindValue(':idVaga',$idVaga);
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':arquivo',$arquivo);
            $sql->bindValue(':descricao',$descricao);
            $sql->bindValue(':tipo',$tipo);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: "'.$erro[2].'"</small><br/>';
            }
        }
    }  
    
    public function removerArquivo($idArquivo){
        $sql = $this->db->prepare("DELETE FROM `vagas_arquivo` WHERE `id`=:idArquivo");
        $sql->bindValue(':idArquivo',$idArquivo);
        $sql->execute();
        
    }

    public function getCaracteristicas($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_caracteristica` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetch();
    }

    public function listarEtapas(){
        $sql = $this->db->prepare("SELECT * FROM `vagas_lista_etapasprocessoseletivo`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function etapasSelecionadas($idVaga){
        $sql = $this->db->prepare("SELECT s.idEtapa, e.nome 
                                    FROM `vagas_caracteristica_etapas` as s
                                    JOIN `vagas_lista_etapasprocessoseletivo` as e 
                                    ON e.id=s.idEtapa
                                    WHERE `idVaga`=:idVaga;");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function verificaEtapa($idVaga,$idEtapa){
        $sql = $this->db->prepare("SELECT `id` 
                                    FROM `vagas_caracteristica_etapas`
                                    WHERE `idVaga`=:idVaga
                                    AND `idEtapa`=:idEtapa
                                    LIMIT 1");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idEtapa',$idEtapa);
        $sql->execute();
        if($sql->rowCount() == 0) {
            return false;
        }else{
            return true;
        }
    }

    public function editaEtapas($idVaga,$idEtapa,$acao){
        if($acao=="add"){
            if($this->verificaEtapa($idVaga,$idEtapa)== false) {
                $sql=$this->db->prepare("INSERT INTO `vagas_caracteristica_etapas` 
                                                    (`idVaga`,`idEtapa`)
                                            VALUES (:idVaga,:idEtapa)");
                $sql->bindValue(':idVaga',$idVaga);
                $sql->bindValue(':idEtapa',$idEtapa);
                $sql->execute();
            }
        
        }else if($acao=="del"){
            $sql=$this->db->prepare("DELETE FROM `vagas_caracteristica_etapas`
                                        WHERE `idVaga`=:idVaga
                                            AND `idEtapa`=:idEtapa");
            $sql->bindValue(':idVaga',$idVaga);
            $sql->bindValue(':idEtapa',$idEtapa);
            $sql->execute();
        }
        
    }

    public function concluirVaga($idVaga){
        $sql = $this->db->prepare("UPDATE `vagas_informacoes` SET `concluida`=1 WHERE `id`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
    }

    public function nomeVaga($idVaga){
        $sql = $this->db->prepare("SELECT `titulo` FROM `vagas_informacoes` WHERE `id`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['titulo'];
    }

    public function selecionaCandidatoVaga($idVaga,$idCandidato,$fase){
        //verifica se o mesmo ja esta inserido nesta vaga
        $sql = $this->db->prepare("SELECT `id` FROM `vagas_candidatos` WHERE `idVaga`=:idVaga AND `idCandidato`=:idCandidato");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idCandidato',$idCandidato);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Select "'.$erro[2].'"</small><br/>';
        }
        if($sql->rowCount() == 0){
            $sql = $this->db->prepare("INSERT INTO `vagas_candidatos`
                                              (`idVaga`,`dataFase`,`idCandidato`,`fase`)
                                       VALUES (:idVaga,now(),:idCandidato,:fase)");
            $sql->bindValue(':idVaga',$idVaga);
            $sql->bindValue(':idCandidato',$idCandidato);
            $sql->bindValue(':fase',$fase);
            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Insert"'.$erro[2].'"</small><br/>';
            }
            return true;
        }else{
            return false;
        }
    }

    public function mudaFaseCandidatoVaga($idVaga,$idCandidato,$fase,$motivo=null){
        //muda a fase do candidato atual
        $sql = $this->db->prepare("UPDATE `vagas_candidatos`
                                  SET `dataFase`=now(),
                                      `fase`=:fase,
                                      `motivo`=:motivo
                                WHERE `idVaga`=:idVaga
                                  AND `idCandidato`=:idCandidato");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idCandidato',$idCandidato);
        $sql->bindValue(':fase',$fase);
        $sql->bindValue(':motivo',$motivo);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Update "'.$erro[2].'"</small><br/>';
        }
    }

    public function excluirCandidatoProcesso($idVaga,$idCandidato){
        $sql = $this->db->prepare("DELETE FROM `vagas_candidatos` WHERE `idVaga`=:idVaga AND `idCandidato`=:idCandidato");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idCandidato',$idCandidato);
        $sql->execute();
    }

    public function listarCandidatosVagaPorFase($idVaga,$fase){
        $sql = $this->db->prepare("SELECT *
                                     FROM `vagas_candidatos`
                                    WHERE `idVaga`=:idVaga 
                                      AND `fase`=:fase");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':fase',$fase);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function getFaseSelecao($idCandidato,$idVaga){
        $sql = $this->db->prepare("SELECT `fase` FROM `vagas_candidatos` WHERE `idVaga`=:idVaga AND `idCandidato`=:idCandidato");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idCandidato',$idCandidato);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Select "'.$erro[2].'"</small><br/>';
        }
        if($sql->rowCount() > 0){
            $rs=$sql->fetch();
            return $rs['fase'];
        }else{
            return 'Disponível';
        }        
    }

    public function candidatosPorFaseVaga($idVaga,$fase){
        $sql = $this->db->prepare("SELECT COUNT(`id`) AS `total`
                                     FROM `vagas_candidatos`
                                    WHERE `idVaga`=:idVaga
                                      AND `fase`=:fase");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':fase',$fase);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Select "'.$erro[2].'"</small><br/>';
        }
        $rs=$sql->fetch();
        return $rs['total'];
    }

    public function agendaEntrevista($idVaga,$idCandidato,$fase,$dia,$responsavel){
        $sql = $this->db->prepare("INSERT INTO `entrevistas`
                                              (`idVaga`,`idCandidato`,`fase`,`data`,`responsavel`)
                                       VALUES (:idVaga,:idCandidato,:fase,:dia,:responsavel)");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idCandidato',$idCandidato);
        $sql->bindValue(':fase',$fase);
        $sql->bindValue(':dia',$dia);
        $sql->bindValue(':responsavel',$responsavel);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Insert"'.$erro[2].'"</small><br/>';
        }
    }

    public function entrevistasCandidatoVagaFase($idVaga,$idCandidato){
        $sql = $this->db->prepare("SELECT * FROM `entrevistas` WHERE `idVaga`=:idVaga AND `idCandidato`=:idCandidato");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idCandidato',$idCandidato);
        if($sql->execute() === false){
            $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Select "'.$erro[2].'"</small><br/>';
        }
        return $sql->fetch();
    }

    public function datasEntrevistas($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_entrevistas` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function datasEntrevistasId($idData){
        $sql = $this->db->prepare("SELECT * FROM `vagas_entrevistas` WHERE `id`=:idData");
        $sql->bindValue(':idData',$idData);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['data'].' '.$rs['hora'];
    }
    
    public function enderecoEncaminhamento($idVaga){
        $sql = $this->db->prepare("SELECT * FROM `vagas_encaminhamentos` WHERE `idVaga`=:idVaga");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function encaminharUsuario($idVaga,$idCandidato,$encaminhamento,$tipoEnvio,$dataEntrevista,$endereco){
        //muda a fase do candidato atual
        $sql = $this->db->prepare("UPDATE `vagas_candidatos`
                                      SET `dataFase`=now(),
                                          `fase`=:fase,
                                          `tipoEncaminhamento`=:encaminhamento,
                                          `tipoEnvio`=:tipoEnvio,
                                          `dataEntrevista`=:dataEntrevista,
                                          `enderecoEntrevista`=:endereco
                                    WHERE `idVaga`=:idVaga
                                      AND `idCandidato`=:idCandidato");
        $sql->bindValue(':idVaga',$idVaga);
        $sql->bindValue(':idCandidato',$idCandidato);
        $sql->bindValue(':fase','Encaminhado');
        $sql->bindValue(':encaminhamento',$encaminhamento);
        $sql->bindValue(':tipoEnvio',$tipoEnvio);
        $sql->bindValue(':dataEntrevista',$dataEntrevista);
        $sql->bindValue(':endereco',$endereco);
        if($sql->execute() === false){
           $erro=$sql->errorInfo();
            echo '<small class="text-danger"><i class="fas fa-times"></i> Erro: Update "'.$erro[2].'"</small><br/>';
        }
   }

    

}