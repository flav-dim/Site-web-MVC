<?php
//INITIALIZES ALL COMPONENTS (CONFIGURATIONS)
//INIT ALL CONTROLLERS, dATABASE DISPATCHER CLASSES AND ROUTER(MAP)
// define('RACINE', $_SERVER['DOCUMENT_ROOT']);
// define('CTRL', '/Controllers');
include_once '../Config/configuration.php';
include_once '../Config/db.php';
include_once '../Controllers/AppController.php';
include_once '../Controllers/ArticlesController.php';
include_once '../Controllers/UsersController.php';
include_once '../dispatcher.php';
include_once '../Src/router.php';

// ArticlesController::...


 ?>
