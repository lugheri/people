<?php 
namespace Models;
use \Core\Model;

class Editor extends Model{
    public function getInfoPage($idCliente){
        $sql = $this->db->prepare("SELECT * FROM `cliente_paginacandidatos` WHERE `idCliente`=:idCliente");
        $sql->bindValue(':idCliente',$idCliente);
        $sql->execute();
        return $sql->fetch();
    }

   
}