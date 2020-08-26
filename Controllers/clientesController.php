<?php 
namespace Controllers;
use \Core\Controller;
use \Models\Biblioteca;
use \Models\Clientes;
use \Models\Vagas;
use \Models\Configuracoes;

class clientesController extends Controller{

    public function index(){
       $c = new Clientes();
       $data['modulo']='clientes';
       $data['tela']='visaoGeral';
       $this->loadTemplate('clientes/main',$data);
    }

    public function listarClientes(){
        $c = new Clientes();
        $data['modulo']='clientes';
        $data['tela']='listarClientes';

        $pagina=0;
        $limite=10;
        $status=1;
        $inicio=$pagina*$limite;
        $data['totalClientes']=$c->qtdClientes_byStatus($status);   

        $data['pagina']=$pagina+1;
        $data['totalPag']=round($data['totalClientes']/$limite);
        $data['resultadoBuscaCliente']=$c->listarCandidatos_paginados($status,$inicio,$limite);
        $this->loadTemplate('clientes/main',$data);
    }

    public function resumoCliente($idCliente){
        $c = new Clientes();
        return $c->resumoCliente($idCliente);
    }

    public function buscarCliente(){
        $c = new Clientes();
        $data['modulo']='clientes';
        $data['tela']='buscarCliente';
        $this->loadTemplate('clientes/main',$data);
    }

    public function novoCliente(){
        $c = new Clientes();
       
        $idCliente=base64_encode($c->novoCliente($this->idConta()).':idConta');
        header('Location:'.LINK.'clientes/editarCliente/'.$idCliente);

    }

    public function editarCliente($idCliente){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['modulo']='clientes';
        $data['tela']='editarCliente';
        $idCliente=explode(':',base64_decode($idCliente));
        $data['idCliente']=$idCliente[0];
        $data['dadosCliente']=$c->getInfo($data['idCliente']);
        $data['listarRamosClientes']=$cf->listRamosClientes();
        $data['listarGruposClientes']=$cf->listGruposClientes();
        $data['listarOrigensClientes']=$cf->listOrigensClientes();
        $data['listarStatusClientes']=$cf->listStatusClientes();
        $data['listarBeneficiosVaga']=$cf->listBeneficiosVagas();
        $data['listarFormasContratacao']=$cf->listFormasContratacao();
        $data['formasContratacaoSelecionadas']=$c->formasContratacaoSelecionadas($data['idCliente']);

        $data['telefones']=$c->telefonesCliente($idCliente[0]);
        $this->loadTemplate('clientes/main',$data);
    }

    public function alteraLogotipo(){
        $c = new Clientes(); 
        $data['idCliente']=$_POST['idCliente'];
        $arquivo=$_FILES['arquivo'];
        $nome='Logotipo '.$data['idCliente'];
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
                $data['logoEmpresa']=$c->logoEmpresa($data['idCliente']);
                $this->loadView('clientes/logoEmpresa',$data);      
	   	   		exit;
	   	   	}

	    	// Verifica se o upload foi enviado via POST   
	   		if(is_uploaded_file($arquivo['tmp_name']))
	   		{
                   $diretorio = "biblioteca/conta_".$data['idCliente']."/Logotipo";  
		    	// Verifica se o diretório de destino existe, senão existir cria o diretório  
		    	if(!file_exists($diretorio))
		    	{
                    if(!file_exists("biblioteca/")){mkdir("biblioteca/"); }
                    if(!file_exists("biblioteca/conta_".$data['idCliente'])){mkdir("biblioteca/conta_".$data['idCliente']); }
                    if(!file_exists("biblioteca/conta_".$data['idCliente']."/Logotipo")){mkdir("biblioteca/conta_".$data['idCliente']."/Logotipo"); }
	        	}

	        	// Monta o caminho de destino com o nome do arquivo  
		    	$nome_arquivo = md5(date('Ymd-').$arquivo['name']);// .$_FILES['arquivo']['name'];  

		    	// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
		    	if (!move_uploaded_file($arquivo['tmp_name'], $diretorio.'/'.$nome_arquivo)){
                    $data['erro']='Houve um erro ao gravar arquivo na pasta de destino:'.$diretorio.'/'.$nome_arquivo;
                    $data['logoEmpresa']=$c->logoEmpresa($data['idCliente']);
                    $this->loadView('clientes/logoEmpresa',$data);
					exit;
		    	}
		    }
		    $file=$diretorio.'/'.$nome_arquivo;
           
	    	$c->importaLogo($data['idCliente'],$file,$nome,$extensao);
	    	
		}else{
			$data['erro'] = 'Falha ao receber o arquivo: '.$arquivo['name'];
			
        }
        $data['logoEmpresa']=$c->logoEmpresa($data['idCliente']);
        $this->loadView('clientes/logoEmpresa',$data);
    }

    public function logoEmpresa($idCandidato){
        $c = new Clientes();
        return $c->logoEmpresa($idCandidato);
    }

    

    public function checkBeneficio($idBeneficio,$idCliente){
        $c = new Clientes();
        return $c->checkBeneficio($idBeneficio,$idCliente);
    }

    public function addTelefoneCliente(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $ddd = $_POST['ddd'];
        $numero = $_POST['numero'];
        $ramal = $_POST['ramal'];
        $tipo = $_POST['tipo'];
        $principal = $_POST['principal'];
        $contato = $_POST['contato'];

        $c->addContato($data['idCliente'],$ddd,$numero,$ramal,$tipo,$principal,$contato);
        $data['telefones']=$c->telefonesCliente($data['idCliente']);
        $this->loadView('clientes/listaTelefones',$data);
    }

    public function removerTelefone(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $idTelefone = $_POST['idTelefone'];

        $c->removeTelefone($idTelefone);
        $data['telefones']=$c->telefonesCliente($data['idCliente']);
        $this->loadView('clientes/listaTelefones',$data);
    }

    public function addBeneficioCliente(){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['idCliente'] = $_POST['idCliente'];
        $idBeneficio = $_POST['idBeneficio'];

        $c->addBeneficioCliente($data['idCliente'],$idBeneficio);
        $data['listarBeneficiosVaga']=$cf->listBeneficiosVagas();
        
        $this->loadView('clientes/beneficioClientes',$data);
    }

    public function delBeneficioCliente(){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['idCliente'] = $_POST['idCliente'];
        $idBeneficio = $_POST['idBeneficio'];

        $c->delBeneficioCliente($data['idCliente'],$idBeneficio);
        $data['listarBeneficiosVaga']=$cf->listBeneficiosVagas();

        $this->loadView('clientes/beneficioClientes',$data);
    }

    public function gravaValorBeneficio(){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['idCliente'] = $_POST['idCliente'];
        $idBeneficio = $_POST['idBeneficio'];
        $valor = $_POST['valor'];

        $c->gravaValorBeneficio($data['idCliente'],$idBeneficio,$valor);

        $data['listarBeneficiosVaga']=$cf->listBeneficiosVagas();

        $this->loadView('clientes/beneficioClientes',$data);
    }

    public function addFormaContratacaoCli(){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['idCliente'] = $_POST['idCliente'];
        $idForma = $_POST['idForma'];

        $c->addFormaContratacaoCli($data['idCliente'],$idForma);
        $data['listarFormasContratacao']=$cf->listFormasContratacao();
        $data['formasContratacaoSelecionadas']=$c->formasContratacaoSelecionadas($data['idCliente']);
        $this->loadView('clientes/formasClientes',$data);

       
    }

    public function delFormaContratacaoCli(){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['idCliente'] = $_POST['idCliente'];
        $idForma = $_POST['idForma'];
        
        $c->delFormaContratacaoCli($data['idCliente'],$idForma);
        $data['listarFormasContratacao']=$cf->listFormasContratacao();
        $data['formasContratacaoSelecionadas']=$c->formasContratacaoSelecionadas($data['idCliente']);
        $this->loadView('clientes/formasClientes',$data);
    }

    public function checkFormaContratacao($idForma,$idCliente){
        $c = new Clientes();
        return $c->checkFormaContratacao($idForma,$idCliente);
    }

    public function gravaDadosCliente(){
        $c = new Clientes();
        $idCliente=$_POST['idCliente'];
        $razao=$_POST['razao'];
        $nome=$_POST['nome'];
        $cnpj=$_POST['cnpj'];
        $cpf=$_POST['cpf'];
        $ie=$_POST['ie'];
        $im=$_POST['im'];
        $ramo=$_POST['ramo'];
        $porte=$_POST['porte'];
        $site=$_POST['site'];
        $qtdFunc=$_POST['qtdFunc'];
        $gpoCli=$_POST['gpoCli'];
        $origem=$_POST['origem'];
        $statusCliente=$_POST['statusCliente'];
        $respSelecao=$_POST['respSelecao'];
        $filial=$_POST['filial'];
        $classificacao=$_POST['classificacao'];
        $respComercial=$_POST['respComercial'];
        $celula=$_POST['celula'];
        $condicoes=$_POST['condicoes'];
        $observacoes=$_POST['observacoes'];

        $error=$c->salvaDadosCliente($idCliente,$razao,$nome,$cnpj,$cpf,$ie,$im,$ramo,$porte,$site,$qtdFunc,$gpoCli,$origem,$statusCliente,$respSelecao,$filial,$classificacao,$respComercial,$celula,$condicoes,$observacoes);
        if(!empty($error)){
            echo $error;
        }else{
            $idCliente=base64_encode($idCliente.':cliente');
            header('Location:'.LINK.'clientes/editarCliente_enderecos/'.$idCliente);
        }
        

    }

    public function editarCliente_enderecos($idCliente){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['modulo']='clientes';
        $data['tela']='editarCliente_enderecos';
        $idCliente=explode(':',base64_decode($idCliente));

        $data['idCliente']=$idCliente[0];
        $data['enderecoCliente']=$c->getEnderecos($data['idCliente']);
        
        $this->loadTemplate('clientes/main',$data);
    }

    public function addEndereco(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        
        $cep = $_POST['cep'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $onibus = $_POST['onibus'];
        $referencia = $_POST['referencia'];
        if(empty($_POST['principal'])){$principal =0;}else{$principal = 1;}
        if(empty($_POST['faturamento'])){$faturamento =0;}else{$faturamento = 1;}
        $c->addEndereco($data['idCliente'],$cep,$logradouro,$numero,$bairro,$cidade,$estado,$onibus,$referencia,$principal,$faturamento);
        $data['enderecoCliente']=$c->getEnderecos($data['idCliente']);
        $this->loadView('clientes/editarEndereco',$data);
    }

    public function delEndereco(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $idEndereco = $_POST['idEndereco'];
        $c->delEndereco($idEndereco);
        $data['enderecoCliente']=$c->getEnderecos($data['idCliente']);
        $this->loadView('clientes/editarEndereco',$data);
        

    }

    public function editarCliente_contatos($idCliente){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['modulo']='clientes';
        $data['tela']='editarCliente_contatos';
        $idCliente=explode(':',base64_decode($idCliente));

        $data['idCliente']=$idCliente[0];
        $data['contatosCliente']=$c->getContatos($data['idCliente']);
        
        $this->loadTemplate('clientes/main',$data);
    }

    public function novoContato(){
        $c = new Clientes();
        $v = new Vagas();
        $data['idCliente'] = $_POST['idCliente'];
        $data['idContato']=$c->novoContato($data['idCliente']);
        $data['infoContato']=$c->infoContato($data['idContato']);
        $data['listarFuncao']=$v->listarFuncao($this->idConta());
        $data['listarHierarquia']=$v->listarHierarquia($this->idConta());

        $this->loadView('clientes/novoContato',$data);
    }

    public function editaContato(){
        $c = new Clientes();
        $v = new Vagas();
        $data['idCliente'] = $_POST['idCliente'];
        $data['idContato'] = $_POST['idContato'];
        $data['infoContato']=$c->infoContato($data['idContato']);
        $data['listarFuncao']=$v->listarFuncao($this->idConta());
        $data['listarHierarquia']=$v->listarHierarquia($this->idConta());

        $this->loadView('clientes/novoContato',$data);
    }

    public function  addTelefonesContato(){
        $c = new Clientes();
        $data['idContato']=$_POST['idContato'];
        $data['telefones']=$c->telefonesContato($data['idContato']);
        $this->loadView('clientes/addTelefonesContato',$data);
    }

    public function gravaTelefoneContato(){
        $c = new Clientes();
        $data['idContato'] = $_POST['idContato'];
        $ddd = $_POST['ddd'];
        $numero = $_POST['numero'];
        $ramal = $_POST['ramal'];
        $tipo = $_POST['tipo'];  
        $c->gravaTelefoneContato($data['idContato'],$ddd,$numero,$ramal,$tipo);
        $data['telefones']=$c->telefonesContato($data['idContato']);
        $this->loadView('clientes/addTelefonesContato',$data);
    }

    public function removerTelefoneContato(){
        $c = new Clientes();
        $data['idContato'] = $_POST['idContato'];
        $idTelefone = $_POST['idTelefone'];
        $c->removerTelefoneContato($idTelefone);
        $data['telefones']=$c->telefonesContato($data['idContato']);
        $this->loadView('clientes/addTelefonesContato',$data);
    }

    public function  addPresentesContato(){
        $c = new Clientes();
        $data['idContato']=$_POST['idContato'];
        $data['presentes']=$c->presentesContato($data['idContato']);
        $this->loadView('clientes/addPresentesContato',$data);
    }

    public function gravaPresenteContato(){
        $c = new Clientes();
        $data['idContato'] = $_POST['idContato'];
        $presente = $_POST['presente'];
        $dataEntrega = $_POST['dataEntrega'];
        $observacoes = $_POST['observacoes'];  
        $c->gravaPresenteContato($data['idContato'],$presente,$dataEntrega,$observacoes);
        $data['presentes']=$c->presentesContato($data['idContato']);
        $this->loadView('clientes/addPresentesContato',$data);
    }

    public function removerPresenteContato(){
        $c = new Clientes();
        $data['idContato'] = $_POST['idContato'];
        $idPresente = $_POST['idPresente'];
        $c->removerPresenteContato($idPresente);
        $data['presentes']=$c->presentesContato($data['idContato']);
        $this->loadView('clientes/addPresentesContato',$data);
    }

    public function salvarContato(){
        $c = new Clientes();
        $data['idCliente']=$_POST['idCliente'];
        $idContato=$_POST['idContato'];
        $nome=$_POST['nome'];
        $nasc=$_POST['nasc'];
        $email=$_POST['email'];
        $funcao=$_POST['funcao'];
        $especialidade=$_POST['especialidade'];
        $hierarquia=$_POST['hierarquia'];
        $observacoes=$_POST['observacoes'];

        $c->salvaContato($idContato,$nome,$nasc,$email,$funcao,$especialidade,$hierarquia,$observacoes);



        $data['contatosCliente']=$c->getContatos($data['idCliente']);
        $this->loadView('clientes/contatosCliente',$data);
    }

    public function delContato(){
        $c = new Clientes();
        $data['idCliente']=$_POST['idCliente'];
        $idContato=$_POST['idContato'];
        
        $c->delContato( $data['idCliente'],$idContato);

        $data['contatosCliente']=$c->getContatos($data['idCliente']);
        $this->loadView('clientes/contatosCliente',$data);
    }

    public function nomeFuncao($idFuncao){
        $v = new Vagas();
        if(!empty($idFuncao)){
            return $v->nomeFuncao($idFuncao);
        }else{
            return "Sem Função";
        }
    }

    public function editarCliente_arquivos($idCliente){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['modulo']='clientes';
        $data['tela']='editarCliente_arquivos';
        $idCliente=explode(':',base64_decode($idCliente));

        $data['idCliente']=$idCliente[0];
        $data['arquivos']=$c->getArquivos($data['idCliente']);
        
        $this->loadTemplate('clientes/main',$data);
    }

    public function enviaArquivoCliente(){
        $c = new Clientes();
        $arquivo=$_FILES['arquivo'];
        $data['idCliente']=$_POST['idCliente'];
		$nome=$_POST['nome'];
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
                $data['arquivos']=$c->getArquivos($data['idCliente']);
                $this->loadView('clientes/arquivosCliente',$data);      
	   	   		exit;
	   	   	}

	    	// Verifica se o upload foi enviado via POST   
	   		if(is_uploaded_file($arquivo['tmp_name']))
	   		{
                   $diretorio = "biblioteca/conta_".$data['idCliente']."/Arquivos";  
		    	// Verifica se o diretório de destino existe, senão existir cria o diretório  
		    	if(!file_exists($diretorio))
		    	{
                    mkdir("biblioteca/"); 
                    mkdir("biblioteca/conta_".$data['idCliente']); 
                    mkdir("biblioteca/conta_".$data['idCliente']."/Arquivos");   
	        	}

	        	// Monta o caminho de destino com o nome do arquivo  
		    	$nome_arquivo = md5(date('Ymd-').$arquivo['name']);// .$_FILES['arquivo']['name'];  

		    	// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
		    	if (!move_uploaded_file($arquivo['tmp_name'], $diretorio.'/'.$nome_arquivo)){
                    $data['erro']='Houve um erro ao gravar arquivo na pasta de destino:'.$diretorio.'/'.$nome_arquivo;
                    $data['arquivos']=$c->getArquivos($data['idCliente']);
                    $this->loadView('clientes/arquivosCliente',$data);
					exit;
		    	}
		    }
		    $file=$diretorio.'/'.$nome_arquivo;
           
	    	$c->importarArquivoCliente($data['idCliente'],$file,$nome,$extensao);
	    	
		}else{
			$data['erro'] = 'Falha ao receber o arquivo: '.$arquivo['name'];
			
        }
        $data['arquivos']=$c->getArquivos($data['idCliente']);
        $this->loadView('clientes/arquivosCliente',$data);  
    }

    public function delArquivo(){
        $c = new Clientes();
        $data['idCliente']=$_POST['idCliente'];
        $idArquivo=$_POST['idArquivo'];
        unlink($c->linkArquivo($idArquivo));
        $c->delArquivo($idArquivo);

        $data['arquivos']=$c->getArquivos($data['idCliente']);
        $this->loadView('clientes/arquivosCliente',$data);  
    }

    public function editarCliente_faturamento($idCliente){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['modulo']='clientes';
        $data['tela']='editarCliente_faturamento';
        $idCliente=explode(':',base64_decode($idCliente));
        $data['idCliente']=$idCliente[0];
        $c->novoFaturamento($data['idCliente']);
        
        $data['infoFaturamento']=$c->infoFaturamento($data['idCliente']);
        $data['servicos']=$cf->listServicosClientes();
        $this->loadTemplate('clientes/main',$data);
    }

    public function checkServicoCliente($idCliente,$idServico){
        $c = new Clientes();
        return $c->checkServicoCliente($idCliente,$idServico);
    }

    public function  incluiServicoCliente(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $idServico = $_POST['idServico'];
        $c->incluiServicoCliente($data['idCliente'],$idServico);
    }

    public function removeServicoCliente(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $idServico = $_POST['idServico'];
        $c->removeServicoCliente($data['idCliente'],$idServico);
    }

    public function salvaFaturamentoCliente(){
        $c = new Clientes();
        $cf = new Configuracoes();

        $data['idCliente'] = $_POST['idCliente'];
        
        if(empty($_POST['DSR'])){$DSR =0;}else{$DSR = 1;}
        if(empty($_POST['HE_Salario'])){$HE_Salario =0;}else{$HE_Salario = 1;}
        if(empty($_POST['HE_Ferias'])){$HE_Ferias =0;}else{$HE_Ferias = 1;}
        if(empty($_POST['beneficiosFatura'])){$beneficiosFatura =0;}else{$beneficiosFatura = 1;}
        if(empty($_POST['repassarDespesasAdm'])){$repassarDespesasAdm =0;}else{$repassarDespesasAdm = 1;}

        if(empty($_POST['IR'])){$IR =0;}else{$IR = 1;}
        if(empty($_POST['FGTS'])){$FGTS =0;}else{$FGTS = 1;}
        if(empty($_POST['INSS'])){$INSS =0;}else{$INSS = 1;}

        $outros = $_POST['outros'];
        $salario = $_POST['salario'];
        $vale = $_POST['vale'];
        $cargaHoraria = $_POST['cargaHoraria'];
        $diaPag = $_POST['diaPag'];
        $diaVale = $_POST['diaVale'];
        $forma = $_POST['forma'];
        $devolucao = $_POST['devolucao'];
        $tributos = $_POST['tributos'];
        $periculosidade = $_POST['periculosidade'];
        $insalubridade = $_POST['insalubridade'];
        $SAT = $_POST['SAT'];
        $informacoes = $_POST['informacoes'];

        $c->salvaFaturamentoCliente($data['idCliente'],$DSR,$HE_Salario,$HE_Ferias,$beneficiosFatura,$repassarDespesasAdm,$IR,$FGTS,$INSS,$outros,$salario,$vale,$cargaHoraria,$diaPag,$diaVale,$forma,$devolucao,$tributos,$periculosidade,$insalubridade,$SAT,$informacoes);
        $data['infoFaturamento']=$c->infoFaturamento($data['idCliente']);
        $data['servicos']=$cf->listServicosClientes();
        
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-save"></i></strong> Faturamento salvo!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';

    }


    
    public function editarCliente_taxas($idCliente){
        $c = new Clientes();
        $cf = new Configuracoes();
        $data['modulo']='clientes';
        $data['tela']='editarCliente_taxas';
        $idCliente=explode(':',base64_decode($idCliente));
        $data['idCliente']=$idCliente[0];
        $c->novoFaturamento($data['idCliente']);

        $data['taxas']=$c->listTaxas('taxa',$data['idCliente']);
        $data['taxasEspeciais']=$c->listTaxas('taxaEspecial',$data['idCliente']);
        
        $data['infoFaturamento']=$c->infoFaturamento($data['idCliente']);
        $this->loadTemplate('clientes/main',$data);
    }

    public function incluirTaxa(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $data['tipoTaxa'] = $_POST['tipoTaxa'];

        $data['formasContratacao']=$c->formasContratacaoCliente($data['idCliente']);
        $data['tipoVaga']=$c->tipoVagaCliente();

        $this->loadView('clientes/incluirTaxa',$data);

        


    }

    public function salvaTaxa(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $tipo = $_POST['tipo'];
        if(!empty($_POST['contratacao'])){$contratacao = $_POST['contratacao'];}else{$contratacao ="";}
        if(!empty($_POST['taxaEspecial'])){$taxaEspecial = $_POST['taxaEspecial'];}else{$taxaEspecial ="";}
        if(!empty($_POST['valorTaxaTipo'])){$valorTaxaTipo = $_POST['valorTaxaTipo'];}else{$valorTaxaTipo ="";}
        if(!empty($_POST['valorTaxa'])){$valorTaxa = $_POST['valorTaxa'];}else{$valorTaxa ="0";}
        if(!empty($_POST['encargoTipo'])){$encargoTipo = $_POST['encargoTipo'];}else{$encargoTipo ="";}
        if(!empty($_POST['encargo'])){$encargo = $_POST['encargo'];}else{$encargo ="0";}
        if(!empty($_POST['tributoTipo'])){$tributoTipo = $_POST['tributoTipo'];}else{$tributoTipo ="";}
        if(!empty($_POST['tributo'])){$tributo = $_POST['tributo'];}else{$tributo ="0";}
        if(!empty($_POST['tipoVaga'])){$tipoVaga = $_POST['tipoVaga'];}else{$tipoVaga ="";}
        if(!empty($_POST['prazo'])){$prazo = $_POST['prazo'];}else{$prazo ="";}
        if(!empty($_POST['observacoes'])){$observacoes = $_POST['observacoes'];}else{$observacoes ="";}

        $c->salvaTaxa($data['idCliente'],$tipo,$contratacao,$taxaEspecial,$valorTaxaTipo,$valorTaxa,$encargoTipo,$encargo,$tributoTipo,$tributo,$tipoVaga,$prazo,$observacoes);

        $data['taxas']=$c->listTaxas('taxa',$data['idCliente']);
        $data['taxasEspeciais']=$c->listTaxas('taxaEspecial',$data['idCliente']);
        $this->loadView('clientes/taxasClientes',$data);

    }

    function removeTaxaCliente(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $idTaxa = $_POST['idTaxa'];

        $c->removeTaxaCliente($idTaxa);

        $data['taxas']=$c->listTaxas('taxa',$data['idCliente']);
        $data['taxasEspeciais']=$c->listTaxas('taxaEspecial',$data['idCliente']);
        $this->loadView('clientes/taxasClientes',$data);
    }

    function gravaObsTaxaCliente(){
        $c = new Clientes();
        $data['idCliente'] = $_POST['idCliente'];
        $observacoes = $_POST['observacoes'];
        $c->gravaObsTaxaCliente($data['idCliente'],$observacoes);
    }




/*


    public function cadastroCliente(){
        $data['modulo']='clientes';
        $data['tela']="cadastroCliente";
       $this->loadTemplate('clientes/main',$data);
    }

    public function cadastrarCliente(){
       
        $b = new Biblioteca;
        $c = new Clientes;
        $desde = $_POST['desde'];
        $img=$b->gravaArquivo($_FILES['logo']);
        $data['error_img']=$img['error'];
        $logo = $img['idImagem'];
        $status = $_POST['status'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $link = $_POST['link'];
        $idCliente=$c->cadastrarCliente($desde,$logo,$status,$nome,$descricao,$link);
        $data['infoCliente']=$c->getInfo($idCliente);

        $data['modulo']='clientes';
        $data['tela']="configurarCliente";
        $data['aba']="info";

        $this->loadTemplate('clientes/main',$data);



    }

    public function configurarCliente(){
        $c = new Clientes();
        $data['aba']=$_POST['aba'];
        $idCliente=$_POST['idCliente'];
        $data['infoCliente']=$c->getInfo($idCliente);      
        

        $this->loadView('clientes/configurarCliente',$data);

    }

    public function buscaCliente(){
        $data['modulo']='clientes';
        $data['tela']="buscaCliente";
       $this->loadTemplate('clientes/clientes',$data);
    }

    public function renderImg($idImg){
        $b = new Biblioteca();
        if($idImg==0){
            return "<small class='text-muted'>Sem Imagem</small>";
        }else{

            return "<img src='".BASE_URL.$b->linkImg($idImg)."' class='img-100'/>";
        }
    }*/
}