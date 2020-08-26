<?php 
namespace Core;

class Core{

    public function run(){
        $url = '/';

        if(isset($_GET['url'])){
            $url.=$_GET['url'];
        }

        $vars = array();
        $prefix = '\Controllers\\';

        if(!empty($url) && $url != '/'){
            $url = explode('/',$url);
            //removendo 1 posicao que eh vazia da url
            array_shift($url);


            define("CLIENT",$url[0]);
            array_shift($url);

            if(isset($url[0]) && !empty($url[0])){
                $currentController = $url[0].'Controller';
                //remove o controller da url
                array_shift($url);

                if(isset($url[0]) && !empty($url[0])){
                   $currentAction = $url[0];
                   //removendo a action da url
                   array_shift($url);
                }else{
                    $currentAction='index';
                }

                if(count($url)>0){
                    $vars=$url;
                }

            }else{
                $currentController='homeController';
                $currentAction='index';
            }
        }else{
            define("CLIENT","rhadar");
            $currentController='homeController';
            $currentAction='index';  
        }    

       
        if(!file_exists('Controllers/'.$currentController.'.php') || !method_exists($prefix.$currentController,$currentAction)){
            $currentController = 'notFoundController';
            $currentAction = 'index';
        }
        
        define("LINK",BASE_URL.CLIENT."/");

        
       
        $newController=$prefix.$currentController;
        $c = new $newController();
        call_user_func_array(array($c,$currentAction),$vars);
    }
}