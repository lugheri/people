<?php 
namespace Controllers;
use \Core\Controller;
use \Models\Configuracoes;
use \Models\Vagas;

class configuracoesController extends Controller{

    public function index(){
        $c = new Configuracoes();
       $data['modulo']='configuracoes';
       $data['tela']='agencia';
       $data['totalFuncoes']=$c->totalFuncoesVaga();
       $data['totalEspecialidades']=$c->totalEspecialidadesVaga();
       $this->loadTemplate('configuracoes/main',$data);
    }
    //AGENCIA
    public function conf_funcoesAgencia(){
        $c = new Configuracoes();
        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $this->loadView('configuracoes/conf_funcoesVagas',$data);
    }

    public function addFuncaoVaga(){
        $c = new Configuracoes();
        $funcao=$_POST['funcao'];
        $c->addFuncaoVaga($funcao);

        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $this->loadView('configuracoes/conf_funcoesVagas',$data);
    }

    public function delFuncaoVaga(){
        $c = new Configuracoes;
        $idFuncao=$_POST['idFuncao'];
        $c->delFuncaoVaga($idFuncao);

        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $this->loadView('configuracoes/conf_funcoesVagas',$data);
    }

    public function editarFuncaoVaga(){
        $c = new Configuracoes;
        $idFuncao=$_POST['idFuncao'];
        $data['infoFuncao']=$c->infoFuncao($idFuncao);

        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $this->loadView('configuracoes/edit_funcoesVagas',$data);
    }

    public function salvaFuncaoVaga(){
        $c = new Configuracoes();
        $idFuncao=$_POST['idFuncao'];
        $funcao=$_POST['funcao'];
        $c->salvaFuncaoVaga($idFuncao,$funcao);

        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $this->loadView('configuracoes/conf_funcoesVagas',$data);
    }

    public function conf_especialidadesVaga(){
        $c=new Configuracoes();
        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $data['listarEspecialidadesVagas']=$c->listEspecialidadesVagas();
        $this->loadView('configuracoes/conf_especialidadesVagas',$data);
    }

    public function addEspecialidadeVaga(){
        $c=new Configuracoes();
        $especialidade=$_POST['especialidade'];
        $funcao=$_POST['funcao'];

        $c->addEspecialidadeVaga($especialidade,$funcao);
        
        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $data['listarEspecialidadesVagas']=$c->listEspecialidadesVagas();
        $this->loadView('configuracoes/conf_especialidadesVagas',$data);
    }

    public function delEspecialidadeVaga(){
        $c = new Configuracoes();
        
        $idEspecialidade = $_POST['idEspecialidade'];

        $c->delEspecialidadeVaga($idEspecialidade);

        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $data['listarEspecialidadesVagas']=$c->listEspecialidadesVagas();
        $this->loadView('configuracoes/conf_especialidadesVagas',$data);
    }

    public function editarEspecialidadeVaga(){
        $c = new Configuracoes();
        $data['infoEspecialidade']=$c->infoEspecialicade($_POST['idEspecialidade']);

        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $data['listarEspecialidadesVagas']=$c->listEspecialidadesVagas();
        $this->loadView('configuracoes/edit_especialidadesVagas',$data);
    }

    public function salvaEspecialidadeVaga(){
        $c = new Configuracoes();
        $idEspecialidade=$_POST['idEspecialidade'];
        $especialidade=$_POST['especialidade'];
        $idFuncao=$_POST['funcao'];

        $c->salvaEspecialidadeVaga($idEspecialidade,$especialidade,$idFuncao);

        $data['listarFuncoesVagas']=$c->listFuncoesVaga();
        $data['listarEspecialidadesVagas']=$c->listEspecialidadesVagas();
        $this->loadView('configuracoes/conf_especialidadesVagas',$data);
    }

    public function nomeFuncao($idFuncao){
        $v = new Vagas();
        return $v->nomeFuncao($idFuncao);
    }

    //VAGAS
    //Status
    public function vagas(){
        $c = new Configuracoes();
        $data['modulo']='configuracoes';
        $data['tela']='vagas';
        $data['totalStatus']=$c->totalStatusVaga();
        $data['totalBeneficios']=$c->totalBeneficiosVaga();
        $data['totalFormasContratacao']=$c->totalFormasContratacao();

        $this->loadTemplate('configuracoes/main',$data);
    }

    public function editar_statusVagas(){
        $c = new Configuracoes();
        $data['listarStatusVagas']=$c->listStatusVagas();
        $this->loadView('configuracoes/conf_statusVagas',$data);
    }

    public function addStatusVaga(){
        $c = new Configuracoes();
        $nome = $_POST['status'];
        $tipo = $_POST['tipo'];
        $c->addStatusVaga($this->idConta(),$nome,$tipo);
        $data['listarStatusVagas']=$c->listStatusVagas();
        $this->loadView('configuracoes/conf_statusVagas',$data);
    }

    public function delStatusVaga(){
        $c = new Configuracoes();
        $idStatus = $_POST['idStatus'];
        $c->delStatusVaga($idStatus);
        $data['listarStatusVagas']=$c->listStatusVagas();
        $this->loadView('configuracoes/conf_statusVagas',$data);
    }

    public function editarStatusVaga(){
        $c = new Configuracoes();
        $idStatus = $_POST['idStatus'];
        $data['infoStatus']=$c->infoVaga($idStatus);
        $data['listarStatusVagas']=$c->listStatusVagas();
        $this->loadView('configuracoes/conf_editaStatusVagas',$data);
    }

    public function salvaStatusVaga(){
        $c = new Configuracoes();
        $idStatus = $_POST['idStatus'];
        $nome = $_POST['status'];
        $tipo = $_POST['tipo'];
        $c->salvaStatusVaga($idStatus,$nome,$tipo);
        $data['listarStatusVagas']=$c->listStatusVagas();
        $this->loadView('configuracoes/conf_statusVagas',$data);
    }

    

    //Beneficios
    public function configurar_beneficiosVagas(){
        $c = new Configuracoes();
        $data['listarBeneficiosVagas']=$c->listBeneficiosVagas();
        $this->loadView('configuracoes/conf_beneficiosVagas',$data);
    }

    
    public function addBeneficioVaga(){
        $c = new Configuracoes();
        $beneficio = $_POST['beneficio'];
        $tipo = $_POST['tipo'];
        $complemento=$_POST['complemento'];
        $c->addBeneficioVaga($beneficio,$tipo,$complemento);

        $data['listarBeneficiosVagas']=$c->listBeneficiosVagas();
        $this->loadView('configuracoes/conf_beneficiosVagas',$data);
    }
        
    public function delBeneficioVaga(){
        $c = new Configuracoes();
        $idBeneficio = $_POST['idBeneficio'];
        $c->delBeneficioVaga($idBeneficio);
       
        $data['listarBeneficiosVagas']=$c->listBeneficiosVagas();
        $this->loadView('configuracoes/conf_beneficiosVagas',$data);
    }

    public function editarBeneficioVaga(){
        $c = new Configuracoes();
        $idBeneficio = $_POST['idBeneficio'];
        $data['infoBeneficio']=$c->infoBeneficio($idBeneficio);
        
        $data['listarBeneficiosVagas']=$c->listBeneficiosVagas();
        $this->loadView('configuracoes/conf_editaBeneficiosVagas',$data);
    }

    public function salvaBeneficioVaga(){
        $c = new Configuracoes();
        $idBeneficio = $_POST['idBeneficio'];
        $beneficio = $_POST['beneficio'];
        $tipo = $_POST['tipo'];
        $complemento=$_POST['complemento'];
        $c->salvaBeneficioVaga($idBeneficio,$beneficio,$tipo,$complemento);
        
        $data['listarBeneficiosVagas']=$c->listBeneficiosVagas();
        $this->loadView('configuracoes/conf_beneficiosVagas',$data);
    }

    public function conf_formasContratacaoVagas(){
        $c = new Configuracoes();
        $data['listarFormaContratacaoVagas']=$c->listarFormasContratacaoVagas();
        $this->loadView('configuracoes/conf_formasContratacaoVagas',$data);
    }

    public function addFormaContratacaoVaga(){
        $c=new Configuracoes();
        $forma=$_POST['forma'];
        $c->addFormaContratacaoVaga($forma);

        $data['listarFormaContratacaoVagas']=$c->listarFormasContratacaoVagas();
        $this->loadView('configuracoes/conf_formasContratacaoVagas',$data);
    }
                    
    public function delFormaContratacaoVaga(){
        $c = new Configuracoes();
        $idForma=$_POST['idForma'];

        $c->delFormaContratacaoVaga($idForma);

        $data['listarFormaContratacaoVagas']=$c->listarFormasContratacaoVagas();
        $this->loadView('configuracoes/conf_formasContratacaoVagas',$data);

    }

    public function editarFormaContratacaoVaga(){
        $c = new Configuracoes();
        $idForma=$_POST['idForma'];
        
        $data['infoForma']=$c->infoFormaContratacaoVaga($idForma);
       
        $data['listarFormaContratacaoVagas']=$c->listarFormasContratacaoVagas();
        $this->loadView('configuracoes/edit_formasContratacaoVagas',$data);
    }

                    

    public function salvaFormaContratacaoVaga(){
        $c = new Configuracoes();
        $idForma=$_POST['idForma'];
        $forma=$_POST['forma'];

        $c->salvarFormaContratacaoVaga($idForma,$forma);

        $data['listarFormaContratacaoVagas']=$c->listarFormasContratacaoVagas();
        $this->loadView('configuracoes/conf_formasContratacaoVagas',$data);
    }


    //USUÁRIOS
    public function usuarios(){
        $c = new Configuracoes();
        $data['modulo']='configuracoes';
        $data['tela']='usuarios';
        $data['totalCelulas']=$c->totalCelulas();
        $data['totalPerfis']=$c->totalPerfis();

        $this->loadTemplate('configuracoes/main',$data);
    }

    public function editar_perfis(){
        $c = new Configuracoes();
        $data['listarPerfisUsuarios']=$c->listPerfisUsuarios();
        $this->loadView('configuracoes/conf_Perfis',$data);
    }

    public function addPerfilUsuario(){
        $c = new Configuracoes();
        $perfil = $_POST['perfil'];
        $c->addPerfilUsuarios($perfil);

        $data['listarPerfisUsuarios']=$c->listPerfisUsuarios();
        $this->loadView('configuracoes/conf_Perfis',$data);
    }

    public function delPerfilUsuario(){
        $c = new Configuracoes();
        $idPerfil = $_POST['idPerfil'];
        $c->delPerfilUsuarios($idPerfil);

        $data['listarPerfisUsuarios']=$c->listPerfisUsuarios();
        $this->loadView('configuracoes/conf_Perfis',$data);
    }

    public function editarPerfilUsuario(){
        $c = new Configuracoes();
        $idPerfil = $_POST['idPerfil'];
        $data['infoPerfil']=$c->infoPerfil($idPerfil);

        $data['listarPerfisUsuarios']=$c->listPerfisUsuarios();
        $this->loadView('configuracoes/conf_editarPerfis',$data);
    }
        
    
    public function salvaPerfilUsuario(){
        $c = new Configuracoes();
        $idPerfil = $_POST['idPerfil'];
        $perfil = $_POST['perfil'];
        $c->salvaPerfilUsuario($idPerfil,$perfil);
        
        $data['listarPerfisUsuarios']=$c->listPerfisUsuarios();
        $this->loadView('configuracoes/conf_Perfis',$data);
    }
    

    public function editar_celulas(){
        $c = new Configuracoes();
        $data['listarCelulasUsuarios']=$c->listCelulasUsuarios();
        $this->loadView('configuracoes/conf_Celulas',$data);
    }

    public function addCelulaUsuario(){
        $c = new Configuracoes();
        $celula = $_POST['celula'];
        $c->addCelulaUsuarios($celula);

        $data['listarCelulasUsuarios']=$c->listCelulasUsuarios();
        $this->loadView('configuracoes/conf_Celulas',$data);
    }

    public function delCelulaUsuario(){
        $c = new Configuracoes();
        $idCelula = $_POST['idCelula'];
        $c->delCelulaUsuarios($idCelula);

        $data['listarCelulasUsuarios']=$c->listCelulasUsuarios();
        $this->loadView('configuracoes/conf_Celulas',$data);
    }

    public function editarCelulaUsuario(){
        $c = new Configuracoes();
        $idCelula = $_POST['idCelula'];
        $data['infoCelula']=$c->infoCelula($idCelula);

        $data['listarCelulasUsuarios']=$c->listCelulasUsuarios();
        $this->loadView('configuracoes/conf_editarCelulas',$data);
    }
        
    
    public function salvaCelulaUsuario(){
        $c = new Configuracoes();
        $idCelula = $_POST['idCelula'];
        $celula = $_POST['celula'];
        $c->salvaCelulaUsuario($idCelula,$celula);
        
        $data['listarCelulasUsuarios']=$c->listCelulasUsuarios();
        $this->loadView('configuracoes/conf_Celulas',$data);
    }

    //CANDIDATOS
    public function candidatos(){
        $c = new Configuracoes();
        $data['modulo']='configuracoes';
        $data['tela']='candidatos';

        $this->loadTemplate('configuracoes/main',$data);
    }

    //CLIENTES
    public function clientes(){
        $c = new Configuracoes();
        $data['modulo']='configuracoes';
        $data['tela']='clientes';

        $data['totalStatus']=$c->totalStatus();
        $data['totalOrigens']=$c->totalOrigens();
        $data['totalServicos']=$c->totalServicos();
        $data['totalHistoricos']=$c->totalHistoricos();
        $data['totalZonas']=$c->totalZonas();
        $data['totalRamos']=$c->totalRamos();
        $data['totalGPO']=$c->totalGPO();
        
        
        $this->loadTemplate('configuracoes/main',$data);
    }


    public function editar_statusClientes(){
        $c = new Configuracoes();
        $data['listarStatusClientes']=$c->listStatusClientes();
        $this->loadView('configuracoes/conf_statusClientes',$data);
    }

    public function addStatusCliente(){
        $c = new Configuracoes();
        $nome = $_POST['status'];
        $tipo = $_POST['tipo'];
        $c->addStatusCliente($nome,$tipo);
        $data['listarStatusClientes']=$c->listStatusClientes();
        $this->loadView('configuracoes/conf_statusClientes',$data);
    }

    public function delStatusCliente(){
        $c = new Configuracoes();
        $idStatus = $_POST['idStatus'];
        $c->delStatusCliente($idStatus);
        $data['listarStatusClientes']=$c->listStatusClientes();
        $this->loadView('configuracoes/conf_statusClientes',$data);
    }


    public function editar_origensClientes(){
        $c = new Configuracoes();
        $data['listarOrigensClientes']=$c->listOrigensClientes();
        $this->loadView('configuracoes/conf_origensClientes',$data);
    }

    public function addOrigemCliente(){
        $c = new Configuracoes();
        $nome = $_POST['origem'];
        $c->addOrigemCliente($nome);
        $data['listarOrigensClientes']=$c->listOrigensClientes();
        $this->loadView('configuracoes/conf_origensClientes',$data);
    }

    public function delOrigemCliente(){
        $c = new Configuracoes();
        $idOrigem = $_POST['idOrigem'];
        $c->delOrigemCliente($idOrigem);
        $data['listarOrigensClientes']=$c->listOrigensClientes();
        $this->loadView('configuracoes/conf_origensClientes',$data);
    }


    public function editar_servicosClientes(){
        $c = new Configuracoes();
        $data['listarServicosClientes']=$c->listServicosClientes();
        $this->loadView('configuracoes/conf_servicosClientes',$data);
    }

    public function addServicoCliente(){
        $c = new Configuracoes();
        $nome = $_POST['servico'];
        $c->addServicoCliente($nome);
        $data['listarServicosClientes']=$c->listServicosClientes();
        $this->loadView('configuracoes/conf_servicosClientes',$data);
    }

    public function delServicoCliente(){
        $c = new Configuracoes();
        $idServico = $_POST['idServico'];
        $c->delServicoCliente($idServico);
        $data['listarServicosClientes']=$c->listServicosClientes();
        $this->loadView('configuracoes/conf_servicosClientes',$data);
    }


    public function editar_historicosClientes(){
        $c = new Configuracoes();
        $data['listarHistoricosClientes']=$c->listHistoricosClientes();
        $this->loadView('configuracoes/conf_historicosClientes',$data);
    }

    public function addHistoricoCliente(){
        $c = new Configuracoes();
        $cod = $_POST['cod'];
        $descricao = $_POST['descricao'];
        $visita = $_POST['visita'];
        $c->addHistoricoCliente($cod,$descricao,$visita);
        $data['listarHistoricosClientes']=$c->listHistoricosClientes();
        $this->loadView('configuracoes/conf_historicosClientes',$data);
    }

    public function delHistoricoCliente(){
        $c = new Configuracoes();
        $idHistorico = $_POST['idHistorico'];
        $c->delHistoricoCliente($idHistorico);
        $data['listarHistoricosClientes']=$c->listHistoricosClientes();
        $this->loadView('configuracoes/conf_historicosClientes',$data);
    }    

    public function editar_zonasClientes(){
        $c = new Configuracoes();
        $data['listarZonasClientes']=$c->listZonasClientes();
        $this->loadView('configuracoes/conf_zonasClientes',$data);
    }

    public function qtdFaixaCeps($idZona){
        $c = new Configuracoes();
        return $c->qtdFaixaCeps($idZona);
    }
    public function addZonaCliente(){
        $c = new Configuracoes();
        
        $descricao = $_POST['descricao'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];

        $cepInicio = $_POST['cepInicio'];
        $cepFinal = $_POST['cepFinal'];

        $idZona=$c->addZonaCliente($descricao,$estado,$cidade);

        $ceps=count($cepInicio);
        for ($i=0; $i < $ceps; $i++) { 
            $c->addFaixaCep($idZona,$cepInicio[$i],$cepFinal[$i]);
        }
        
        $data['listarZonasClientes']=$c->listZonasClientes();
        $this->loadView('configuracoes/conf_zonasClientes',$data);
    }

    public function editarZona(){
        $c = new Configuracoes();
        $idZona=$_POST['idZona'];
        $data['infoZona'] = $c->getInfoZona($idZona);
        $data['faixaCeps'] = $c->faixasCepsZona($idZona);
        
        $data['listarZonasClientes']=$c->listZonasClientes();
        $this->loadView('configuracoes/conf_editaZonaClientes',$data);
    }

    
    public function salvaZonaCliente(){
        $c = new Configuracoes();
        $idZona= $_POST['idZona'];
        $descricao = $_POST['descricao'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];

        $cepInicio = $_POST['cepInicio'];
        $cepFinal = $_POST['cepFinal'];
        $c->delFaixasCep($idZona);
        $c->salvaZonaCliente($idZona,$descricao,$estado,$cidade);
        
        $ceps=count($cepInicio);
        for ($i=0; $i < $ceps; $i++) { 
            $c->addFaixaCep($idZona,$cepInicio[$i],$cepFinal[$i]);
        }
        
        $data['listarZonasClientes']=$c->listZonasClientes();
        $this->loadView('configuracoes/conf_zonasClientes',$data);
    }

    public function delZonaCliente(){
        $c = new Configuracoes();
        $idZona = $_POST['idZona'];
        $c->delZonaCliente($idZona);
        $data['listarZonasClientes']=$c->listZonasClientes();
        $this->loadView('configuracoes/conf_zonasClientes',$data);
    }    

    

    public function configurar_ramosClientes(){
        $c = new Configuracoes();
        $data['listarRamosClientes']=$c->listRamosClientes();
        $this->loadView('configuracoes/conf_ramosClientes',$data);
    }

    public function addRamoCliente(){
        $c = new Configuracoes();
        
        $ramo = $_POST['ramo'];

        $c->addRamoCliente($ramo);
        
        $data['listarRamosClientes']=$c->listRamosClientes();
        $this->loadView('configuracoes/conf_ramosClientes',$data);
    }

    public function delRamoCliente(){
        $c = new Configuracoes();
        $idRamo = $_POST['idRamo'];
        $c->delRamoCliente($idRamo);
        $data['listarRamosClientes']=$c->listRamosClientes();
        $this->loadView('configuracoes/conf_ramosClientes',$data);
    }    

    public function editarRamoCliente(){
        $c = new Configuracoes();
        $idRamo = $_POST['idRamo'];
        $data['infoRamo'] = $c->getInfoRamo($idRamo);
        
        $data['listarRamosClientes']=$c->listRamosClientes();
        $this->loadView('configuracoes/conf_editaRamosClientes',$data);
    }

    
    public function salvaRamoCliente(){
        $c = new Configuracoes();
        $idRamo = $_POST['idRamo'];
        $ramo = $_POST['ramo'];
        
        $c->salvaRamoCliente($idRamo,$ramo);
        
        $data['listarRamosClientes']=$c->listRamosClientes();
        $this->loadView('configuracoes/conf_ramosClientes',$data);
    }


    public function configurar_gruposClientes(){
        $c = new Configuracoes();

        $data['listGruposClientes']=$c->listGruposClientes();
        $this->loadView('configuracoes/conf_grupoClientes',$data);
    }

    public function addGrupoCliente(){
        $c = new Configuracoes();
        $grupo = $_POST['grupo'];
        $c->addGrupoCliente($grupo);

        $data['listGruposClientes']=$c->listGruposClientes();
        $this->loadView('configuracoes/conf_grupoClientes',$data);
    }

    public function delGrupoCliente(){
        $c = new Configuracoes();
        $idGrupo = $_POST['idRamo'];
        $c->delGrupoCliente($idGrupo);

        $data['listGruposClientes']=$c->listGruposClientes();
        $this->loadView('configuracoes/conf_grupoClientes',$data);
    }

    public function editarGrupoCliente(){
        $c = new Configuracoes();
        $idGrupo = $_POST['idGrupo'];
        $data['infoGrupo'] = $c->getInfoGrupo($idGrupo);
        
        $data['listGruposClientes']=$c->listGruposClientes();
        $this->loadView('configuracoes/conf_editagrupoClientes',$data);
    }

    public function salvaGrupoCliente(){
        $c = new Configuracoes();
        
        $idGrupo = $_POST['idGrupo'];
        $grupo = $_POST['grupo'];
        
        $c->salvaGrupoCliente($idGrupo,$grupo);
        $data['listGruposClientes']=$c->listGruposClientes();
        $this->loadView('configuracoes/conf_grupoClientes',$data);
    }

}