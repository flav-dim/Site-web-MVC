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

function setFlashMessage($message, $type = 'success' ){
    $_SESSION['flashMessage']=[
        'message'=>$message,
        'type'=> $type,
    ];
}

function displayFlashMessage(){
    if( isset($_SESSION['flashMessage']) ){
        $type = $_SESSION['flashMessage']['type'] == 'error' ? 'danger': $_SESSION['flashMessage']['type'];

        $alert ='<div class="alert #81d4fa light-blue lighten-3 alert-'.$type.'" statut="alert"><strong>' . $_SESSION['flashMessage']['message'].'</strong></div>';
            echo $alert;
            unset($_SESSION['flashMessage']); //supprime le msg une fois affiché
    }
}

 ?>
