<?php
//EXECUTES INFROMATION SENT BY ROUTER.PHP
//CLASS
//REDIRECT DATAS RECEIVES BY CLIENT SIDE TO THE CORRESPONDING METHOD WITH THE ROUTER MAP INFORMATIONS
require_once('../Controllers/AppController.php');

class Dispatcher
{
    public function retrieveData($params){//récupere les données de index.php (paramètre de l'url)
        $controller = $params[0];

        $action = isset($params[1]) ? $params[1] : 'index';//si pas de 2e param, on affiche l'index

        if(file_exists('../Controllers/'.$controller.'Controller.php')){//si le controller existe...

            require_once('../Controllers/'.$controller.'Controller.php');

            $controller = $controller::getInstance();
            if(method_exists($controller, $action) ){
                unset($params[0]);
                unset($params[1]);

                call_user_func_array(array($controller, $action), $params);
            } else {
                echo "error 404";
            }
        } else {//si un mauvais paramètre est rentré dans l'url on renvoie à la home page
            AppController::toIndex();
        }
    }



}

 ?>
