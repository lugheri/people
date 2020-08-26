<?php 
namespace Controllers;
use \Core\Controller;
use \Models\Vagas;
use \Models\Clientes;
use \Models\Candidatos;
use \Models\Users;

class vagasController extends Controller{

    public function index(){
       $data['modulo']='vagas';
       $data['tela']='visaoGeral';
       $this->loadTemplate('vagas/main',$data);
    }
    //busca
    public function listarVagas(){
        $data['modulo']='vagas';
        $data['tela']='listarVagas';
        $this->loadTemplate('vagas/main',$data);
    }

    public function tipoBusca(){
        $data['tipoBusca']=$_POST['tipoBusca'];
        $this->loadView('vagas/tipoBusca',$data);
    }

    public function candidatosPorFaseVaga($idVaga,$fase){
        $v = new Vagas();
        return $v->candidatosPorFaseVaga($idVaga,$fase);
    }

    public function buscarVaga(){
        $v = new Vagas();
        $conta=$this->idConta();
        $status = $_POST['status'];
        $filial = $_POST['filial'];
        $buscarPor = $_POST['buscarPor'];
        $campoOrdem = $_POST['campo'];
        $ordem = $_POST['ordem'];
        $razao = null;
        $codigo = null;
        $selecionador = null;
        $de = null;
        $ate = null;
        $titulo = null;
        $celula = null;

        if($buscarPor=="razaoSocial"){
           $razao=$_POST['razao'];
        }
    
        if($buscarPor=="codigoVaga"){
            $codigo=$_POST['codigo'];
        }
    
        if($buscarPor=="selecionador"){
            $selecionador=$_POST['selecionador'];
        }
    
        if($buscarPor=="data"){
            $de=$_POST['de'];
            $ate=$_POST['ate'];
        }
    
        if($buscarPor=="tituloVaga"){
            $titulo=$_POST['titulo'];
        }
    
        if($buscarPor=="celula"){
            $celula=$_POST['celula'];
        }

        $data['resultadoBusca']=$v->buscarVagas($conta,$status,$filial,$buscarPor,$razao,$codigo,$selecionador,$de,$ate,$titulo,$celula,$campoOrdem,$ordem);

        $this->loadView('vagas/resultadoBusca',$data);




    }
    //cadastro de vagas

    public function cadastroVaga(){
        $v = new Vagas();
        $c = new Clientes();
        $u = new Users();

        $data['modulo']='vagas';
        $data['tela']='cadastroVaga';
       
        $data['idVaga']=$v->novaVaga($this->idConta());
        
        $data['infoVaga']=$v->getInfo($data['idVaga']);
        $data['listaClientes']=$c->listaClientes();
        $data['listaStatus']=$v->listarStatus($this->idConta());
        $data['listarTipoVaga']=$v->listarTipoVaga($this->idConta());
        $data['listarFuncao']=$v->listarFuncao($this->idConta());
        $data['listarHierarquia']=$v->listarHierarquia($this->idConta());
        $data['listarUsuarios']=$u->listarUsuarios($this->idConta());
        $data['selecionadores']=$v->listarSelecionadores($data['idVaga']);


        $this->loadTemplate('vagas/main',$data);
    }



    public function gravaCampoVaga(){
        $v = new Vagas();
        $idVaga = $_POST['idVaga'];
        $tabela = $_POST['tabela'];
        $campo = $_POST['campo'];
        $valor = $_POST['valor'];
        $v->gravaCampoVaga($idVaga,$tabela,$campo,$valor);
    }

    public function setaRequisitante(){
        $c = new Clientes();
        $idCliente=$_POST['idCliente'];
        $data['requisitantes']=$c->getContatos($idCliente);
        $this->loadView('vagas/setaRequisitante',$data);
    }
    

    public function setaEspecialidades(){
        $v = new Vagas();
        $idFuncao=$_POST['funcao'];
        $data['especialidades']=$v->especialidadesFuncao($idFuncao);
        $this->loadView('vagas/setaEspecialidades',$data);
    }
    
    public function cadVaga_inclusao($idVaga){
        $v = new Vagas();
        $c = new Clientes();
        $u = new Users();

        $data['modulo']='vagas';
        $data['tela']='cadastroVaga';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];

        $data['infoVaga']=$v->getInfo($data['idVaga']);
        $data['listaClientes']=$c->listaClientesFilhos($this->idConta());
        $data['listaStatus']=$v->listarStatus($this->idConta());
        $data['listarTipoVaga']=$v->listarTipoVaga($this->idConta());
        $data['listarFuncao']=$v->listarFuncao($this->idConta());
        $data['listarHierarquia']=$v->listarHierarquia($this->idConta());
        $data['listarUsuarios']=$u->listarUsuarios($this->idConta());
        $data['selecionadores']=$v->listarSelecionadores($data['idVaga']);

        
        $this->loadTemplate('vagas/main',$data);
    }

    public function editaSelecionador(){
        $u = new Users();
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $idUsuario=$_POST['idUsuario'];
        $acao=$_POST['acao'];

        $v->editaSelecionador($data['idVaga'],$idUsuario,$acao);
        $data['listarUsuarios']=$u->listarUsuarios($this->idConta());
        $data['selecionadores']=$v->listarSelecionadores($data['idVaga']);


        $this->loadView('vagas/selecionadores',$data);

    }

    public function verificaSelecionador($idVaga,$idSelecionador){
        $v = new Vagas();
        return $v->verificaSelecionador($idVaga,$idSelecionador);
    }

    public function cadVaga_requisitos($idVaga){
        $v = new Vagas();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_requisitos';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];

        $data['requisitosVaga']=$v->getRequisitos($data['idVaga']);
        $data['listaEscolaridade']=$v->listaEscolaridade();
        $data['listaSexo']=$v->listaSexo();
        $data['listaAreasInformatica']=$v->listaAreasInformatica();
        $data['areasInformatica']=$v->getAreasInformatica($data['idVaga']);

        $this->loadTemplate('vagas/main',$data);
    }

    public function adicionarAreaInformatica(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $areaInformatica=$_POST['areaInformatica'];
        $nivelInformatica=$_POST['nivelInformatica'];

        $v->adicionarAreaInformatica($data['idVaga'],$areaInformatica,$nivelInformatica);
        $data['areasInformatica']=$v->getAreasInformatica($data['idVaga']);

        $this->loadView('vagas/tblAreaInformatica',$data);

    }

    public function removerAreaInformatica(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $idArea=$_POST['idArea'];        

        $v->removerAreaInformatica($idArea);
        $data['areasInformatica']=$v->getAreasInformatica($data['idVaga']);

        $this->loadView('vagas/tblAreaInformatica',$data);

    }

    public function cadVaga_local($idVaga){
        $v = new Vagas();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_local';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];

        $data['localVaga']=$v->getLocal($data['idVaga']);

        $this->loadTemplate('vagas/main',$data);
    }

    public function cadVaga_conhecimento($idVaga){
        $v = new Vagas();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_conhecimento';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];
        $data['listaIdioma']=$v->listaIdiomas();
        $data['idiomaVaga']=$v->getIdiomas($data['idVaga']);
        $data['listaAreasInformatica']=$v->listaAreasInformatica();
        $data['areasInformatica']=$v->getAreasInformatica($data['idVaga']);


        $this->loadTemplate('vagas/main',$data);
    }

    public function addIdiomas(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $idioma=$_POST['idioma'];
        $nivel=$_POST['nivel'];

        $v->adicionarIdioma($data['idVaga'],$idioma,$nivel);
        $data['idiomaVaga']=$v->getIdiomas($data['idVaga']);

        $this->loadView('vagas/tblIdioma',$data);

    }

    public function removerIdioma(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $idIdioma=$_POST['idIdioma'];        

        $v->removerIdioma($idIdioma);
        $data['idiomaVaga']=$v->getIdiomas($data['idVaga']);

        $this->loadView('vagas/tblIdioma',$data);

    }

    public function addEntrevista(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $dia=$_POST['dia'];
        $hora=$_POST['hora'];
        $local=$_POST['local'];
        $contato=$_POST['contato'];

        $v->addEntrevista($data['idVaga'],$dia,$hora,$local,$contato);
        $data['entrevistasVaga']=$v->getEntrevistas($data['idVaga']);

        $this->loadView('vagas/tblEntrevistas',$data);

    }

    public function nomeContato($idContato){
        $c = new Clientes();
        return $c->nomeContato($idContato);
    }

    public function removerEntrevista(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $idEntrevista=$_POST['idEntrevista'];        

        $v->removerEntrevista($idEntrevista);
        $data['entrevistasVaga']=$v->getEntrevistas($data['idVaga']);

        $this->loadView('vagas/tblEntrevistas',$data);

    }

    public function cadVaga_contratacao($idVaga){
        $v = new Vagas();
        $c = new Clientes();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_contratacao';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];

        $data['listaClientes']=$c->listaClientesFilhos($this->idConta());
        $data['contratacaoVaga']=$v->getContratacao($data['idVaga']);
        $data['formaContratacao']=$v->listarFormasContratacao();
        $data['listaBeneficios']=$v->listaBeneficios();
       
        $data['beneficios']=$v->beneficiosVaga($data['idVaga']);

        $this->loadTemplate('vagas/main',$data);
    }

    public function addBeneficio(){
        $v = new Vagas();
        
        $data['idVaga'] = $_POST['idVaga'];
       
        $beneficio = $_POST['beneficio'];
        $valor = $_POST['valor'];
        $v->addBeneficioVaga($data['idVaga'],$beneficio,$valor);

        $data['beneficios']=$v->beneficiosVaga($data['idVaga']);

        
        $this->loadView('vagas/tbl_beneficios',$data);
    }

    
    public function removeBeneficioVaga(){
        $v = new Vagas();
        $data['idVaga'] = $_POST['idVaga'];
        $idBeneficio = $_POST['idBeneficio'];
        $v->removeBeneficioVaga($idBeneficio);

        $data['beneficios']=$v->beneficiosVaga($data['idVaga']);        
        $this->loadView('vagas/tbl_beneficios',$data);
    }

    public function cadVaga_entrevistas($idVaga){
        $v = new Vagas();
        $cli = new Clientes();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_entrevistas';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];
        $data['entrevistasVaga']=$v->getEntrevistas($data['idVaga']);
        $data['encaminhamentosVaga']=$v->getEncaminhamentos($data['idVaga']);
       
        $data['contatos']=$cli->getContatos($v->idCliente($data['idVaga']));
        $data['enderecos']=$cli->getEnderecos($v->idCliente($data['idVaga']));


        $this->loadTemplate('vagas/main',$data);
    }

    public function cadVaga_encaminhamentos($idVaga){
        $v = new Vagas();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_encaminhamentos';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];

        $data['encaminhamentosCliente']=$v->getEncaminhamentosCliente($data['idVaga']);
        $data['observacoesCliente']=$v->getObservacaoCliente($data['idVaga']);

        $this->loadTemplate('vagas/main',$data);
    }

    public function cadVaga_email($idVaga){
        $v = new Vagas();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_email';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];

        $data['emailVaga']=$v->getEmails($data['idVaga']);

        $this->loadTemplate('vagas/main',$data);
    }

    public function cadVaga_arquivos($idVaga){
        $v = new Vagas();

        $data['modulo']='vagas';
        $data['tela']='cadVaga_arquivos';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];
        $data['arquivosVaga']=$v->getArquivos($data['idVaga']);

        $this->loadTemplate('vagas/main',$data);
    }

    public function importadorArquivo(){
        $data['idVaga']=$_POST['idVaga'];
        $this->loadView('vagas/importadorArquivo',$data);
    }

    public function importarArquivo(){       
        $v = new Vagas(); 
        $data['idVaga']=$_POST['idVaga'];
        $arquivo=$_FILES['arquivo'];
		$nome=$_POST['nome'];
		$descricao =$_POST['descricao'];
		$data['erro']=0;
		
		if(isset($arquivo) && $arquivo['size'] > 0)
		{
			$extensoes_aceitas = array('png','jpeg','jpg','pdf','csv','xls','xlsx','ppt','pptx','doc','docx');
			$array_extensoes   = explode('.', $arquivo['name']);
			$extensao = strtolower(end($array_extensoes));
			$size=$arquivo['size'];
			// Validamos se a extensão do arquivo é aceita
	    	if (array_search($extensao, $extensoes_aceitas) === false)
	    	{
                $data['erro']='Extensão Inválida ou não permitida!';
                $data['arquivosVaga']=$v->getArquivos($data['idVaga']);
                $this->loadView('vagas/tblArquivos',$data);      
	   	   		exit;
	   	   	}

	    	// Verifica se o upload foi enviado via POST   
	   		if(is_uploaded_file($arquivo['tmp_name']))
	   		{
                   $diretorio = "biblioteca/conta_".$this->idConta()."/Arquivos";  
		    	// Verifica se o diretório de destino existe, senão existir cria o diretório  
		    	if(!file_exists($diretorio))
		    	{
                    mkdir("biblioteca/"); 
                    mkdir("biblioteca/conta_".$this->idConta()); 
                    mkdir("biblioteca/conta_".$this->idConta()."/Arquivos");   
	        	}

	        	// Monta o caminho de destino com o nome do arquivo  
		    	$nome_arquivo = md5(date('Ymd-').$arquivo['name']);// .$_FILES['arquivo']['name'];  

		    	// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
		    	if (!move_uploaded_file($arquivo['tmp_name'], $diretorio.'/'.$nome_arquivo)){
                    $data['erro']='Houve um erro ao gravar arquivo na pasta de destino:'.$diretorio.'/'.$nome_arquivo;
                    $data['arquivosVaga']=$v->getArquivos($data['idVaga']);
                    $this->loadView('vagas/tblArquivos',$data);
					exit;
		    	}
		    }
		    $file=$diretorio.'/'.$nome_arquivo;
           
	    	$v->importarArquivoVaga($data['idVaga'],$file,$nome,$descricao,$extensao);
	    	
		}else{
			$data['erro'] = 'Falha ao receber o arquivo: '.$arquivo['name'];
			
        }
        $data['arquivosVaga']=$v->getArquivos($data['idVaga']);
        $this->loadView('vagas/tblArquivos',$data);
    }

    public function removerArquivo(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $idArquivo=$_POST['idArquivo']; 
        $file=$_POST['file'];
        
        //deletando arquivo
        unlink($file);

        //removendo do banco
        $v->removerArquivo($idArquivo);
        
        $data['arquivosVaga']=$v->getArquivos($data['idVaga']);
        $this->loadView('vagas/tblArquivos',$data);
    }

    public function cadVaga_caracteristicas($idVaga){
        $v = new Vagas();
        $u = new Users();
        $data['modulo']='vagas';
        $data['tela']='cadVaga_caracteristicas';
        
        $idVaga=explode(':',base64_decode($idVaga));
        $data['idVaga']=$idVaga[0];

        $data['caracteristicasVaga']=$v->getCaracteristicas($data['idVaga']);

        $data['listarEtapas']=$v->listarEtapas();
        $data['etapasSelecionadas']=$v->etapasSelecionadas($data['idVaga']);   
        
        $data['listarUsuarios']=$u->listarUsuarios($this->idConta());

        $this->loadTemplate('vagas/main',$data);
    }

    public function editaEtapas(){
        $u = new Users();
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $idEtapa=$_POST['idEtapa'];
        $acao=$_POST['acao'];

        $v->editaEtapas($data['idVaga'],$idEtapa,$acao);
        $data['listarEtapas']=$v->listarEtapas();
        $data['etapasSelecionadas']=$v->etapasSelecionadas($data['idVaga']);

        $this->loadView('vagas/etapasProcesso',$data);
    }

    public function verificaEtapa($idVaga,$idEtapa){
        $v = new Vagas();
        return $v->verificaEtapa($idVaga,$idEtapa);
    }
    
    public function setaPermissoesConfidencial(){
        $v = new Vagas();
        $u = new Users();
        $data['idVaga'] = $_POST['idVaga'];
        $data['listarUsuarios']=$u->listarUsuarios($this->idConta());
        $data['caracteristicasVaga']=$v->getCaracteristicas($data['idVaga']);
        $this->loadView('vagas/usuarios_confidencial',$data);
    }

    public function concluirVaga(){
        $v= new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $data['acao']=$_POST['acao'];

        if($data['acao']=="confirmacao"){
            $data['infoVaga']=$v->getInfo($data['idVaga']); 
        }

        if($data['acao']=="salvar"){
            $v->concluirVaga($data['idVaga']); 
        }
        
        $this->loadView('vagas/concluirVaga',$data);
    }

    public function processoSeletivo(){
        $v = new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $data['aba']=$_POST['aba'];

        if($data['aba']=="vagas"){
            $data['infoVaga']=$v->getInfo($data['idVaga']);
            $data['requisitosVaga']=$v->getRequisitos($data['idVaga']);
            $data['localVaga']=$v->getLocal($data['idVaga']);
            $data['contratacaoVaga']=$v->getContratacao($data['idVaga']);
            $data['encaminhamentosVaga']=$v->getEncaminhamentos($data['idVaga']);
            $data['caracteristicasVaga']=$v->getCaracteristicas($data['idVaga']);
            $data['selecionadores']=$v->listarSelecionadores($data['idVaga']);
            
        }
        if($data['aba']=="recebidos"){
            $data['fase']="Recebido";
            $data['candidatosRecebidos']=$v->listarCandidatosVagaPorFase($data['idVaga'],$data['fase']);
        }

        if($data['aba']=="selecionados"){
            $data['fase']="Selecionado";
            $data['candidatosSelecionados']=$v->listarCandidatosVagaPorFase($data['idVaga'],$data['fase']);            
        }

        if($data['aba']=="aptos"){
            $data['fase']="Apto";
            $data['candidatosAptos']=$v->listarCandidatosVagaPorFase($data['idVaga'],$data['fase']);            
        }

        if($data['aba']=="encaminhados"){
            $data['fase']="Encaminhado";
            $data['candidatosEncaminhados']=$v->listarCandidatosVagaPorFase($data['idVaga'],$data['fase']);            
        }

        if($data['aba']=="aprovados"){
            $data['fase']="Aprovado";
            $data['candidatosAprovados']=$v->listarCandidatosVagaPorFase($data['idVaga'],$data['fase']);            
        }

        if($data['aba']=="recusados"){
            $data['fase']="Recusado";
            $data['candidatosRecusados']=$v->listarCandidatosVagaPorFase($data['idVaga'],$data['fase']);
            
        }
        
        $this->loadView('vagas/processoSeletivo',$data);
    }

    public function mudaFase(){
        $v = new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $fase=$_POST['fase'];

        $v->mudaFaseCandidatoVaga($data['idVaga'],$data['idCandidato'],$fase);
        $data['fase']=$this->converteNomeFase($fase);
        
        
        $this->loadView('vagas/mudaFase',$data);
    }

    public function converteNomeFase($fase){
        switch($fase){
            case "Selecionado";
            $nomeAba="selecionados";
            break;
            case "Apto";
            $nomeAba="aptos";
            break;
            case "Encaminhado";
            $nomeAba="encaminhados";
            break;
            case "Aprovado";
            $nomeAba="aprovados";
            break;
            case "Recusado";
            $nomeAba="recusados";
            break;
        }
        return $nomeAba;
    }

    public function selecionarCandidatos(){
        $v = new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $data['selecionados']=$_POST['selecionados'];
        $data['resposta']=array();
        foreach($data['selecionados'] as $s):
            if($s>0){
               $data['resposta'][$s]=$v->selecionaCandidatoVaga($data['idVaga'],$s,'Selecionado');
            }            
        endforeach;
        $this->loadView('vagas/selecionarCandidatos',$data);
    }

    public function acaoCandidato_processoSeletivo(){
        $data['idCandidato']=$_POST['idCandidato'];
        $data['idVaga']=$_POST['idVaga'];
        $data['fase']=$_POST['fase'];

        $this->loadView('vagas/processoSeletivo_acaoCandidato',$data);
    }

    public function chamarCandidato(){
        $c = new Candidatos();
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $data['fase']=$_POST['fase'];
        $data['contatos']=$c->getContatos($data['idCandidato']);

        $this->loadView('vagas/processoSeletivo_chamarCandidato',$data);

    }

    public function encaminharCandidato(){
        $v = new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $data['fase']=$_POST['fase'];
        $data['datasEntrevistas']=$v->datasEntrevistas($data['idVaga']);
        $data['enderecoEncaminhamento']=$v->enderecoEncaminhamento($data['idVaga']);


        $this->loadView('vagas/encaminharCandidato',$data);
    }

    public function concluirEncaminhamentoCandidato(){
        $v = new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $data['fase']=$this->converteNomeFase($_POST['fase']);
        $encaminhamento=$_POST['encaminhamento'];
        $tipoEnvio=$_POST['tipoEnvio'];
        $dataEntrevista=$_POST['dataEntrevista'];
        $endereco=$_POST['endereco'];
        $v->encaminharUsuario($data['idVaga'],$data['idCandidato'],$encaminhamento,$tipoEnvio,$dataEntrevista,$endereco);

        $this->loadView('vagas/mudaFase',$data);
    }

    public function resumoEndereco($idEndereco){
        $c = new Clientes();
        return $c->resumoEndereco($idEndereco);
    }

    public function dataEntrevistaEncaminhada($idData){
        $v = new Vagas();
        return $v->datasEntrevistasId($idData);
    }

    

    public function addObservacoes(){
        $c = new Candidatos();
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $data['fase']=$_POST['fase'];
        $data['observacoes']=$c->getObservacoes($data['idCandidato']);

        $this->loadView('vagas/addObservacoes',$data);

    }

    public function gravarObservacoes(){
        $c = new Candidatos();
        $criador=$this->idUser();
        $idCandidato=$_POST['idCandidato'];
        $observacao=$_POST['observacao'];
        $c->gravarObservacoes($criador,$idCandidato,$observacao);
        $data['observacoes']=$c->getObservacoes($idCandidato);
        $this->loadView('candidatos/tblObservacoes',$data);

    }

    public function addEntrevistaVaga(){
        $u = new Users();
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $data['fase']=$_POST['fase'];
        $data['usuarios']=$u->listarUsuarios($this->idConta());
        $this->loadView('vagas/addEntrevistaVaga',$data);
    }

    public function agendarEntrevista(){
        $v = new Vagas();
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $fase=$_POST['fase'];
        $dia=$_POST['data'].' '.$_POST['hora'];
        $responsavel=$_POST['responsavel'];
        $data['email']=$_POST['email'];

        $v->agendaEntrevista($data['idVaga'],$data['idCandidato'],$fase,$dia,$responsavel);

        $data['fase']=$this->converteNomeFase($fase);
        $this->loadView('vagas/concluiAgendamentoEntrevista',$data);
        
    }
    
    public function entrevistasCandidatoVagaFase($idVaga,$idCandidato){
        $v=new Vagas();
        return $v->entrevistasCandidatoVagaFase($idVaga,$idCandidato);
    }

    public function excluirCandidatoProcesso(){
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $data['fase']=$_POST['fase'];
        $data['acao']=$_POST['acao']; 

        if($data['acao']=="remover"){
            $v = new Vagas();
            $data['fase']=$this->converteNomeFase($data['fase']);
            //remover candidato
            $v->excluirCandidatoProcesso($data['idVaga'],$data['idCandidato']);
        }

        $this->loadView('vagas/excluirCandidatoProcesso',$data);
 
    }

    public function recusaCandidato(){
        $data['idVaga']=$_POST['idVaga'];
        $data['idCandidato']=$_POST['idCandidato'];
        $data['fase']=$_POST['fase'];
        $data['acao']=$_POST['acao']; 

        if($data['acao']=="remover"){
            $v = new Vagas();
            $motivo=$_POST['motivo'];
            $data['fase']=$this->converteNomeFase($data['fase']);
            //recusar candidato
            $v->mudaFaseCandidatoVaga($data['idVaga'],$data['idCandidato'],'Recusado',$motivo);
        }
        $this->loadView('vagas/recusaCandidato',$data);
 
    }




    public function nomeStatus($idStatus){
        $v = new Vagas();
        return $v->nomeStatus($idStatus);
    }

    public function nomeUser($idUser){
        $u = new Users();
        return $u->nomeUser($idUser);
    }

    public function nomeVaga($idVaga){
        $v = new Vagas();
        return $v->nomeVaga($idVaga);
    }

    public function nomeTipoVaga($tipoVaga){
        $v = new Vagas();
        return $v->nomeTipoVaga($tipoVaga);
    }

    public function nomeCliente($idCliente){
        $c = new Clientes();
        return $c->nomeCliente($idCliente);
    }

    public function nomeFuncao($idFuncao){
        $v = new Vagas();
        return $v->nomeFuncao($idFuncao);
    }
    public function nomeHierarquia($idHierarquia){
        $v = new Vagas();
        return $v->nomeHierarquia($idHierarquia);
    }

    public function nomeEscolaridade($idEscolaridade){
        $v = new Vagas();
        return $v->nomeEscolaridade($idEscolaridade);
    }

    public function nomeSexo($idSexo){
        $v = new Vagas();
        return $v->nomeSexo($idSexo);
    }

    public function nomeCandidato($idCandidato){
        $c = new Candidatos();
        return $c->nomeCandidato($idCandidato);
    }

    public function nascCandidato($idCandidato){
        $c = new Candidatos();
        return $c->nascCandidato($idCandidato);
    }
    
    public function getFaseSelecao($s,$idVaga){
        $v = new Vagas();
        return $v->getFaseSelecao($s,$idVaga);
    }

    public function old_buscarCandidato(){
        $v= new Vagas();
        $c= new Candidatos();
        
        //$data['tipoBusca']="buscaSimples";
        $data['idVaga']=$_POST['idVaga'];
        $data['idCliente']=$this->idConta();        
        $data['listaFuncoes']=$v->listarFuncao($this->idConta());
        $data['listaHierarquia']=$v->listarHierarquia($this->idConta());
        $data['totalCandidatos']=$c->totalCandidatos($this->idConta(),1);   
        $pagina=0;
        $limite=10;
        $inicio=$pagina*$limite;

        $data['pagina']=$pagina+1;
        $data['totalPag']=round($data['totalCandidatos']/$limite);
        $data['resultadoBusca']=$c->listarCandidatos($this->idConta(),$inicio,$limite);
        
       
       

        $this->loadView('vagas/buscarCandidato',$data);    
    }

    public function fontePesquisa(){
        $data['idVaga']=$_POST['idVaga'];
        $this->loadView('vagas/fontePesquisa',$data);
    }

    public function editarVaga(){
        $data['idVaga']=$_POST['idVaga'];
        $this->loadView('vagas/editarVaga',$data);
    }

    public function clonarVaga(){
        $data['idVaga']=$_POST['idVaga'];
        $this->loadView('vagas/clonarVaga',$data);
    }

    public function dadosCliente(){
        $data['idVaga']=$_POST['idVaga'];
        $this->loadView('vagas/dadosCliente',$data);
    }

   



    

   
 

}