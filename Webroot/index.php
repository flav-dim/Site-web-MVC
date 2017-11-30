<?php
require_once('../Config/core.php');
define ('RACINE', '/PHP_Rush_MVC');

$params = explode('/', $_GET['page']);

Dispatcher::retrieveData($params);


 ?>
