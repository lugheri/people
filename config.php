<?PHP

require 'environment.php';

if(ENVIRONMENT=="development"){
    define("BASE_URL","http://projetos/people.rhadar/");
    $config['dbname']='rhadar_people';
    $config['host']='localhost';
    $config['dbuser']='root';
    $config['dbpass']='';
}
if(ENVIRONMENT=="production"){
    define("BASE_URL","https://people.rhadar.com/");
    $config['dbname']='rhadarco_people';
    $config['host']='localhost';
    $config['dbuser']='rhadarco_people';
    $config['dbpass']='people@2017';
}

define('NOCACHE','0');

//Conexao ao banco
global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
    $db->exec("SET NAMES 'utf8'");
	$db->exec('SET character_set_connection=utf8');
	$db->exec('SET character_set_client=utf8');
	$db->exec('SET character_set_results=utf8');
}
catch(PDOException $e){
    echo "Erro ao conectar ao banco de dados: ".$e->getMessage();
    exit();
}?>