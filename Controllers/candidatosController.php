<?php 
namespace Controllers;
use \Core\Controller;
use \Models\Candidatos;
use \Models\Vagas;

class candidatosController extends Controller{

    public function index(){
       $c = new Candidatos;
       $data['modulo']='candidatos';

       $data['totalCandidatos']=$c->totalCandidatos($this->idConta(),1);
       $data['cadastrosHoje']=$c->candidatosDeHoje($this->idConta());
       $data['homens']=$c->genero($this->idConta(),'M');
       $data['mulheres']=$c->genero($this->idConta(),'F');
       $data['total']=$data['homens']+$data['mulheres'];
       $data['topCidades']=$c->topCidades($this->idConta());
       $data['topFuncoes']=$c->topFuncoes($this->idConta());

       $this->loadTemplate('candidatos/main',$data);
    }

    public function nomeFuncao($idFuncao){
        $v = new Vagas();
        return $v->nomeFuncao($idFuncao);
    }

    public function faixaIdade($de,$ate){
        $c=new Candidatos();
        if((empty($de))){$filtro_de='1900-00-00';}else{$filtro_de=$de.'-01-01';}
        if((empty($ate))){$filtro_ate='3000-00-00';}else{$filtro_ate=$ate.'-12-31';}
        return $c->faixaIdade($this->idConta(),$filtro_de,$filtro_ate);

    }

    
    public function listarCandidatos(){
        $data['modulo']='candidatos';
        $data['tela']="listarCandidatos";

        $c = new Candidatos();

        $user=explode(':',base64_decode($_COOKIE['userId_people']));
        $account = $user[3];

        $data['totalCandidatos']=$c->totalCandidatos($account,1);
        $data['qtd']=30;
        
        if(empty($_POST['p'])){
			$data['page']=1;			
			$data['start']=($data['page']-1)*$data['qtd'];
		}else{
			$data['page']=$_POST['page'];
			$data['start']=($data['page']-1)*$data['qtd'];
        }
        
        $data['ordem']=null;
		$data['campo']=null;

		$data['f_id']=null;
		$data['f_desde']=null;
		$data['f_areaInteresse']=null;
		$data['f_nome']=null;
		$data['f_nascimento']=null;
		$data['f_cidade']=null;
		$data['f_estado']=null;
		$data['f_usuario']=null;
        
        $data['pages']=round($data['totalCandidatos']/$data['qtd']);

		$data['listCandidatos']=$c->listarCandidatos($account,$data['start'],$data['qtd']);




       $this->loadTemplate('candidatos/main',$data);
    }

    public function opcFiltro($campo,
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
			                  $f_usuario=""){
        $c = new Candidatos;
        
        $user=explode(':',base64_decode($_COOKIE['userId_people']));
        $conta = $user[3];

        return $c->opcoesFiltro($conta,
                                $campo,
			                    $value,
								$start,
		                        $qtd,
		                        //filtros
		                        $f_id,
		                        $f_desde,
			                    $f_areaInteresse,
			                    $f_nome,
			                    $f_nascimento,
			                    $f_cidade,
			                    $f_estado,
			                    $f_usuario
			                    );
    }

    public function alteraFoto(){
        $c = new Candidatos(); 
        $data['idCandidato']=$_POST['idCandidato'];
        $arquivo=$_FILES['arquivo'];
        $nome='Foto Perfil '.$data['idCandidato'];
        $data['erro']=0;
        
        if(isset($arquivo) && $arquivo['size'] > 0)
		{
			$extensoes_aceitas = array('png','jpeg','jpg','gif');
			$array_extensoes   = explode('.', $arquivo['name']);
			$extensao = strtolower(end($array_extensoes));
			$size=$arquivo['size'];
			// Validamos se a extensão do arquivo é aceita
	    	if (array_search($extensao, $extensoes_aceitas) === false)
	    	{
                $data['erro']='Extensão Inválida ou não permitida!';
                $data['fotoPerfil']=$c->fotoPerfil($data['idCandidato']);
                $this->loadView('candidatos/fotoPerfil',$data);      
	   	   		exit;
	   	   	}

	    	// Verifica se o upload foi enviado via POST   
	   		if(is_uploaded_file($arquivo['tmp_name']))
	   		{
                   $diretorio = "biblioteca/conta_".$this->idConta()."/Imagens";  
		    	// Verifica se o diretório de destino existe, senão existir cria o diretório  
		    	if(!file_exists($diretorio))
		    	{
                    if(!file_exists("biblioteca/")){mkdir("biblioteca/"); }
                    if(!file_exists("biblioteca/conta_".$this->idConta())){mkdir("biblioteca/conta_".$this->idConta()); }
                    if(!file_exists("biblioteca/conta_".$this->idConta()."/Imagens")){mkdir("biblioteca/conta_".$this->idConta()."/Imagens"); }
	        	}

	        	// Monta o caminho de destino com o nome do arquivo  
		    	$nome_arquivo = md5(date('Ymd-').$arquivo['name']);// .$_FILES['arquivo']['name'];  

		    	// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
		    	if (!move_uploaded_file($arquivo['tmp_name'], $diretorio.'/'.$nome_arquivo)){
                    $data['erro']='Houve um erro ao gravar arquivo na pasta de destino:'.$diretorio.'/'.$nome_arquivo;
                    $data['fotoPerfil']=$c->fotoPerfil($data['idCandidato']);
                    $this->loadView('candidatos/fotoPerfil',$data);
					exit;
		    	}
		    }
		    $file=$diretorio.'/'.$nome_arquivo;
           
	    	$c->importaFoto($data['idCandidato'],$file,$nome,$extensao);
	    	
		}else{
			$data['erro'] = 'Falha ao receber o arquivo: '.$arquivo['name'];
			
        }
        $data['fotoPerfil']=$c->fotoPerfil($data['idCandidato']);
        $this->loadView('candidatos/fotoPerfil',$data);
    }

    public function fotoPerfil($idCandidato){
        $c = new Candidatos();
        return $c->fotoPerfil($idCandidato);
    }
    
    public function fichaCandidato($candidato){
		$c=new Candidatos();
		$data['conta']=$this->idConta();
        $candidato=explode(':',base64_decode($candidato));
		$data['idCandidato']=$candidato[0];
		
		$data['modulo']='candidatos';
		$data['tela']="fichaCandidato";
		
		$data['infoCandidato'] = $c->getInfo($data['idCandidato']);
        $data['dadosCandidato'] = $c->getDadosPessoais($data['idCandidato']);
        $data['endCandidato'] = $c->getEndereco($data['idCandidato']);
        $data['contCandidato'] = $c->getContatos($data['idCandidato']);
		$this->loadTemplate('candidatos/main',$data);
		
	}

	public function fichaProfissional($candidato){
        $v=new Vagas();
		$c=new Candidatos();
		$data['conta']=$this->idConta();
        $candidato=explode(':',base64_decode($candidato));
		$data['idCandidato']=$candidato[0];
		
		$data['modulo']='candidatos';
        $data['tela']="fichaProfissional";
        $data['objetivoCandidato'] = $c->getObjetivosProfissionais($data['idCandidato']);
        $data['listaFuncoes']=$v->listarFuncao($data['conta']);
        $data['listaHierarquia']=$v->listarHierarquia($data['conta']);
        $data['listarObjetivos']=$c->listarObjetivos($data['idCandidato']);
		$this->loadTemplate('candidatos/main',$data);
		
    }
    
    public function addObjetivo(){
        $c=new Candidatos();
        $data['idCandidato']=$_POST['idCandidato'];
        $funcao=$_POST['funcao'];
        $hierarquia=$_POST['hierarquia'];
        $tempo=$_POST['tempo'];
        $tipoTempo=$_POST['tipoTempo'];
        $c->addObjetivo($data['idCandidato'],$funcao,$hierarquia,$tempo,$tipoTempo);
        $data['listarObjetivos']=$c->listarObjetivos($data['idCandidato']);
        $this->loadView('candidatos/tblObjetivos',$data);       
    }

    public function removerObjetivo(){
        $c=new Candidatos();
        $data['idCandidato']=$_POST['idCandidato'];
        $idObjetivo=$_POST['idObjetivo'];
        $c->delObjetivo($idObjetivo);
        $data['listarObjetivos']=$c->listarObjetivos($data['idCandidato']);
        $this->loadView('candidatos/tblObjetivos',$data);   
    }

	public function fichaConhecimentos($candidato){
        $c=new Candidatos();
        $v = new Vagas();
		$data['conta']=$this->idConta();
        $candidato=explode(':',base64_decode($candidato));
		$data['idCandidato']=$candidato[0];
		
		$data['modulo']='candidatos';
        $data['tela']="fichaConhecimentos";
        $data['escolaridadeCandidato']=$c->getEscolaridade($data['idCandidato']);
        $data['listaEscolaridade']=$v->listaEscolaridade();
        $data['infoOrigem']=$c->infoOrigem($data['idCandidato']);
		$this->loadTemplate('candidatos/main',$data);
		
	}
	
	public function novoCandidato(){
		$c=new Candidatos();
		$data['conta']=$this->idConta();
		$data['modulo']='candidatos';
		$data['tela']="fichaCandidato";
		$data['idCandidato']=$c->novoCandidato($data['conta']);

		$data['infoCandidato'] = $c->getInfo($data['idCandidato']);
        $data['dadosCandidato'] = $c->getDadosPessoais($data['idCandidato']);
        $data['endCandidato'] = $c->getEndereco($data['idCandidato']);
        $data['contCandidato'] = $c->getContatos($data['idCandidato']);
        $this->loadTemplate('candidatos/main',$data);
	}

	public function setFilhos(){
        $data['filhos']=$_POST['filhos'];
        $this->loadView('candidatos/setFilhos',$data);
    }

    public function setNecessidade(){
        $data['necessidade']=$_POST['necessidade'];
        $this->loadView('candidatos/setNecessidade',$data);
    }

    public function salvarFicha(){
        $c = new Candidatos();
        $v = new Vagas();
        $data['idCandidato']=$_POST['idCandidato'];
        $foto=$_POST['foto'];
        $nome=$_POST['nome'];
        $apelido=$_POST['apelido'];
        $cpf=$_POST['cpf'];
        $pis=$_POST['pis'];
        $nascimento=$_POST['nascimento'];
        $sexo=$_POST['sexo'];
        $estadoCivil=$_POST['estadoCivil'];
        $habilitacao=$_POST['habilitacao'];
        $filhos=$_POST['filhos'];
        $necessidade=$_POST['necessidade'];
        $tipoNecessidade=$_POST['tipoNecessidade'];
        $infoNecessidade=$_POST['infoNecessidade'];
        $cep=$_POST['cep'];
        $rua=$_POST['rua'];
        $numero=$_POST['numero'];
        $bairro=$_POST['bairro'];
        $cidade=$_POST['cidade'];
        $estado=$_POST['estado'];
        $email=$_POST['email'];
        $celular=$_POST['celular'];
        $fixo=$_POST['fixo'];
        $facebook=$_POST['facebook'];
        $linkedin=$_POST['linkedin'];
        $portifolio=$_POST['portifolio'];
        $skype=$_POST['skype'];
        $sobre=$_POST['sobre'];
        if(!empty($_POST['listMail'])){$listMail=1;}else{$listMail=0;}

        $c->atualizaDados($data['idCandidato'],
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
						  $listMail);
						  
	    $data['modulo']='candidatos';
        $data['tela']="fichaProfissional";
        $data['objetivoCandidato'] = $c->getObjetivosProfissionais($data['idCandidato']);
        $data['listaFuncoes']=$v->listarFuncao($this->idConta());
        $data['listaHierarquia']=$v->listarHierarquia($this->idConta());
        $data['listarObjetivos']=$c->listarObjetivos($data['idCandidato']);
        $this->loadTemplate('candidatos/main',$data);

    }

    public function salvaFichaProfissional(){
        $c = new Candidatos();
        $v=new Vagas();
        $data['idCandidato']=$_POST['idCandidato'];
        $pretencaoSalarial=$_POST['pretencaoSalarial'];
        $disponibilidadeViagem=$_POST['disponibilidadeViagem'];
        $disponibilidadeMudanca=$_POST['disponibilidadeMudanca'];
        $homeOffice=$_POST['homeOffice'];
        $minicurriculo=$_POST['minicurriculo'];
        $c->salvaFichaProfissional($data['idCandidato'],$pretencaoSalarial,$disponibilidadeViagem,$disponibilidadeMudanca,$homeOffice,$minicurriculo);

        $data['modulo']='candidatos';
        $data['tela']="fichaConhecimentos";
        $data['escolaridadeCandidato']=$c->getEscolaridade($data['idCandidato']);
        $data['listaEscolaridade']=$v->listaEscolaridade();
        $data['infoOrigem']=$c->infoOrigem($data['idCandidato']);
        $this->loadTemplate('candidatos/main',$data);
    }
    
    public function addEscolaridade(){
        $c=new Candidatos();
        $data['idCandidato']=$_POST['idCandidato'];
		$escolaridade=$_POST['escolaridade'];
		$instituicao=$_POST['instituicao']; 
		$curso=$_POST['curso']; 
		$inicio=$_POST['inicio'];
		$termino=$_POST['termino'];
		$horario=$_POST['horario'];
        $c->addEscolaridade($data['idCandidato'],$escolaridade,$instituicao,$curso,$inicio,$termino,$horario);
        $data['escolaridadeCandidato']=$c->getEscolaridade($data['idCandidato']);
        $this->loadView('candidatos/tblEscolaridade',$data);    
    }

    public function delEscolaridade(){
        $c=new Candidatos();
        $data['idCandidato']=$_POST['idCandidato'];
        $idEscolaridade=$_POST['idEscolaridade'];
        $c->delEscolaridade($idEscolaridade);
        $data['escolaridadeCandidato']=$c->getEscolaridade($data['idCandidato']);
        $this->loadView('candidatos/tblEscolaridade',$data);   
    }
    
    public function setaOrigem(){
        $c=new Candidatos();
        $data['idCandidato']=$_POST['idCandidato'];
        $data['origem']=$_POST['origem'];
        $complemento=$_POST['complemento'];
        $c->setaOrigem($data['idCandidato'],$data['origem'],$complemento);
        $data['infoOrigem']=$c->infoOrigem($data['idCandidato']);

        $this->loadView('candidatos/setaOrigem',$data);   

    }

    public function concluirFicha(){
        $c=new Candidatos();
        $data['idCandidato']=$_POST['idCandidato'];
        $c->concluirFicha($data['idCandidato']);
        $data['modulo']='candidatos';
        $data['tela']="inicio";
        $this->loadView('candidatos/inicio',$data);   
    }    

    //BUSCA DE CANDIDATO

    public function busca(){
        $v= new Vagas();
        $c= new Candidatos();
        $data['modulo']='candidatos';
        $data['tela']="busca";
        
        if(!empty($_POST['idVaga'])){$data['idVaga']=$_POST['idVaga'];}else{$data['idVaga']=0;}
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
        
        if(!empty($_POST['modal'])){
            $data['modal']=$_POST['modal'];
            $this->loadView('candidatos/busca',$data);
        }else{
            $this->loadTemplate('candidatos/main',$data);
        }        
    }

    public function novaBusca(){
        $v= new Vagas();
        $c= new Candidatos();
        $filtros[] = array();

        $data['idVaga']=$_POST['idVaga'];
        $data['idCliente']=$_POST['idCliente'];

        $data['listaFuncoes']=$v->listarFuncao($data['idCliente']);
        $data['listaHierarquia']=$v->listarHierarquia($data['idCliente']);

         //FILTROS
        //PRETENÇÃO SALÁRIAL
        $filtros['salario_de']=$_POST['salario_de'];
        $filtros['salario_ate']=$_POST['salario_ate'];

        //DADOS GERAIS
        
        //PROFISSIONAL

        //PESSOAL
        
        //ESCOLARIDADE

        //LOCALIZACAO
        $filtros['estado']=$_POST['estado'];
        $filtros['cidade']=$_POST['cidade'];

        //ordenacao
        $ordenacao['campo']='i.id';
        $ordenacao['ordem']="ASC";

        $status=$_POST['status'];

        $pagina=$_POST['pagina'];
        $limite=$_POST['limite'];
        $inicio=$pagina*$limite;
        $data['pagina']=$pagina+1;

        //busca
        $data['totalCandidatos']=$c->totalCandidatosFiltrados($data['idCliente'],$filtros,$status); 
        $data['resultadoBusca']=$c->filtrarCandidatos($data['idCliente'],$filtros,$ordenacao,$inicio,$limite,$status);

       
        $data['totalPag']=round(($data['totalCandidatos']/$limite)+.1);

       

        $this->loadView('candidatos/resultadoBusca',$data);

    }

    public function cargoCandidato($idCandidato){
        $c = new Candidatos();
        return $c->cargoCandidato($idCandidato);
    }

    public function enderecoCandidato($idCandidato){
        $c = new Candidatos();
        return $c->enderecoCandidato($idCandidato);
    }

    public function objetivosCandidato($idCandidato){
        $c = new Candidatos();
        return $c->objetivosCandidato($idCandidato);
    }

    public function escolaridadeCandidato($idCandidato){
        $c = new Candidatos();
        return $c->escolaridadeCandidato($idCandidato);
    }

    public function nomeCandidato($idCandidato){
        $c = new Candidatos();
        return $c->nomeCandidato($idCandidato);
    }

    public function pretencaoSalarial($idCandidato){
        $c = new Candidatos();
        $salario=$c->pretencaoSalarial($idCandidato);
        if($salario>0){
            return 'R$ '.$salario;
        }else{
            return "A Combinar";
        }
    }

    public function ultimaAtualizacao($idCandidato){
        $c = new Candidatos();
        $data=$c->ultimaAtualizacao($idCandidato);
        if(date('Y-m-d', strtotime($data))==date('Y-m-d')){
            echo "Hoje";
        }else{
            echo date('d/m/Y', strtotime($data));
        }
    }

    public function idadeCandidato($idCandidato){
        $c = new Candidatos();
        $anoNasc=date('Y', strtotime($c->nascCandidato($idCandidato)));
        $anoAtual=date('Y');
        return $anoAtual-$anoNasc;
        return $c->idadeCandidato($idCandidato);
    }
    
    

    
    public function setaBusca(){
        $v= new Vagas();
        $c= new Candidatos();
        if(!empty($_POST['idVaga'])){ $data['idVaga']=$_POST['idVaga'];}else{$data['idVaga']="";}
        $data['tipoBusca']=$_POST['tipoBusca'];
        $data['listaFuncoes']=$v->listarFuncao($this->idConta());
        $data['listaHierarquia']=$v->listarHierarquia($this->idConta());
        $data['listarCidades']=$c->listarCidades($this->idConta());
        $this->loadView('candidatos/busca',$data);
    }

    public function resultadoBusca(){
        $c=new Candidatos();
        if($_POST['tipoBusca']=="buscaSimples"){
            $data['idVaga']=$_POST['idVaga'];
            $funcao=$_POST['funcao'];
            if(!empty($_POST['hierarquia'])){$hierarquia=$_POST['hierarquia'];}else{$hierarquia='';}
            $estado=$_POST['estado'];
            if(!empty($_POST['cidade'])){$cidade=$_POST['cidade'];}else{$cidade='';}
            $palavraChave=$_POST['palavraChave'];
            $de=$_POST['de'];
            $ate=$_POST['ate'];
            $ordenarPor=$_POST['ordenarPor'];
            $ordem=$_POST['ordem'];

            $data['resultadoBusca']=$c->buscarCandidato($data['idVaga'],$funcao,$hierarquia,$estado,$cidade,$palavraChave,$de,$ate,$ordenarPor,$ordem);            
        }

       $this->loadView('candidatos/resultadoBusca',$data);

    }

    public function nomeVaga($idVaga){
        $v = new Vagas();
        return $v->nomeVaga($idVaga);
    }

    public function dadosPessoaisCandidatos($idCandidato){
        $c = new Candidatos();
        return $c->getDadosPessoais($idCandidato);   
    }
}