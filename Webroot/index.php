<?php

require_once('../Controllers/AppController.php');

$params = explode('/', $_GET['page']);

$controller = $params[0];

$action = isset($params[1]) ? $params[1] : 'index';


require('../Controllers/'.$controller.'Controller.php');
$controller = new $controller();
if(method_exists($controller, $action) ){
    // $controller->$action();
    unset($params[0]);
    unset($params[1]);
    call_user_func_array(array($controller, $action), $params);

} else {
    echo "error 404";
}











 ?>
