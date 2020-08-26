<?php 
namespace Models;
use \Core\Model;

class Biblioteca extends Model{
    public function gravaArquivo($arquivo,$pasta=""){
        $data['error']=false;
		if(isset($arquivo) && $arquivo['size'] > 0)
		{
			$extensoes_aceitas = array('png','jpeg','jpg');
			$array_extensoes   = explode('.', $arquivo['name']);
			$extensao = strtolower(end($array_extensoes));
			$size=$arquivo['size'];
			// Validamos se a extensão do arquivo é aceita
	    	if (array_search($extensao, $extensoes_aceitas) === false)
	    	{
                $data['error']='Extensão Inválida!';
                $data['idImagem']=0;
	   	   		return $data;
	   	   	}

	    	// Verifica se o upload foi enviado via POST   
	   		if(is_uploaded_file($arquivo['tmp_name']))
	   		{
	   			$diretorio = 'biblioteca/';    
		    	// Verifica se o diretório de destino existe, senão existir cria o diretório  
		    	if(!file_exists($diretorio))
		    	{
		    		mkdir($diretorio);  
	        	}

	        	// Monta o caminho de destino com o nome do arquivo  
		    	$nome_arquivo = md5(date('Ymd-').$arquivo['name']);// .$_FILES['arquivo']['name'];  

		    	// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
		    	if (!move_uploaded_file($arquivo['tmp_name'], $diretorio.'/'.$nome_arquivo)){
		    		$data['error']='Houve um erro ao gravar arquivo na pasta de destino:'.$diretorio.'/'.$nome_arquivo;
					$data['idImagem']=0;
	   	   		    return $data;
		    	}
		    }
		    $imagem=$diretorio.'/'.$nome_arquivo;
            $dimen = GetImageSize($imagem); // pegamos a largura e altura e jogamos em um array.
            
            $sql = $this->db->prepare("INSERT INTO `biblioteca` 
                                                  (`data`,`pasta`,`arquivo`,`lixeira`)
                                           VALUES (NOW(),:pasta,:arquivo,0)");
            if(empty($pasta)){$pasta=0;}
            $sql->bindValue(':pasta',$pasta);
            $sql->bindValue(':arquivo',$imagem);

            if($sql->execute() === false){
                $erro=$sql->errorInfo();
                $data['error']=$erro[2];
                $data['idImagem']=0;
                return $data;
            }else{
                $data['error']=false;
                $data['idImagem']=$this->db->lastInsertId();
                return $data;
            }

		}else{
            $data['error'] = 'Falha ao recever o arquivo: '.$arquivo['name'];
            $data['idImagem']=0;
	   	   	return $data;
			
        }
        
    }

    public function linkImg($img){
        $sql = $this->db->prepare("SELECT `arquivo` FROM `biblioteca` WHERE `id`=:img");
        $sql->bindValue(':img',$img);
        $sql->execute();
        $rs=$sql->fetch();
        return $rs['arquivo'];
    }
}