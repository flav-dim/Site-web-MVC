<?php
//EXECUTES INFROMATION SENT BY ROUTER.PHP
//CLASS
//REDIRECT DATAS RECEIVES BY CLIENT SIDE TO THE CORRESPONDING METHOD WITH THE ROUTER MAP INFORMATIONS
require_once('../Controllers/AppController.php');

class Dispatcher
{
    public function retrieveData($params){//récupere les données de index.php (paramètre de l'url)
        $controller = $params[0];

        $action = isset($params[1]) ? $params[1] : 'index';


        require_once('../Controllers/'.$controller.'Controller.php');

        $controller = new $controller();
        if(method_exists($controller, $action) ){
            // $controller->$action();
            unset($params[0]);
            unset($params[1]);
            call_user_func_array(array($controller, $action), $params);
        } else {
            echo "error 404";
        }
    }



}

 ?>
