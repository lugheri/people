<?php 
namespace Controllers;

use \Core\Controller;
use \Models\Editor;

class editorPaginaController extends Controller{

    public function index($id){
        $data['id']=$id;
        $data['modulo']='home';
        $this->loadEditorTemplate('inicio',$id);
    }

    public function inicio($id){
        $e = new Editor();
        $idC=explode(':',base64_decode($id));
        $data['infoPage']=$e->getInfoPage($idC[0]);
        $data['modulo']='home';
        $this->loadEditorTemplate('inicio',$data);
    }

    public function editarPagina($id){
        $e = new Editor();
        $idC=explode(':',base64_decode($id));
        $data['plataforma']=$idC[1];
        $data['modulo']='editarPagina';
        $data['infoPage']=$e->getInfoPage($idC[0]);
        $this->loadEditorTemplate('editarPagina',$data);
    }

    public function editarLogo(){

        $this->loadEditorView('editarLogo');
    }
}