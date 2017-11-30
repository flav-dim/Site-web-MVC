<?php
require_once('../dispatcher.php');
define ('RACINE', '/PHP_Rush_MVC');

$params = explode('/', $_GET['page']);

Dispatcher::retrieveData($params);





 ?>
