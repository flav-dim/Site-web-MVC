<?php
//INITIALIZES ALL COMPONENTS (CONFIGURATIONS)
//INIT ALL CONTROLLERS, dATABASE DISPATCHER CLASSES AND ROUTER(MAP)
session_start();

include_once '../Config/configuration.php';
include_once '../Config/db.php';
include_once '../Controllers/AppController.php';
include_once '../Controllers/ArticlesController.php';
include_once '../Controllers/UsersController.php';
include_once '../Controllers/AdminController.php';
include_once '../Controllers/CategoriesController.php';
include_once '../Controllers/CommentsController.php';
include_once '../dispatcher.php';
include_once '../Src/router.php';
include_once '../Models/Form.php';

$Articles = Articles::getInstance();
$Users = Users::getInstance();
$Admin = Admin::getInstance();
$Categories = Categories::getInstance();

if(isset($_COOKIE['user'] ) ){
    $_SESSION['user'] = unserialize($_COOKIE['user']);
}


 ?>
