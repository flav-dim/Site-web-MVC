<?php
//ALL CONFIGURATIONS CONCERNING THE PROJECT

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

/***********************SECURITY**********************/
    function isUserConnected(){//return true if user is connected
        return isset($_SESSION['user']);
    }

    function userSecurity(){
        if(!isUserConnected() ){
            toLogin();
        }
    }

    function isUserAdmin(){
        return isUserConnected() && $_SESSION['user']['user_group'] == 2 ;// return if user is admin
    }

    function adminSecurity(){
        if(!isUserAdmin() ){
            toIndex();//if not admin go to index if not connected go to login (via index)
        }
    }
    function my_cookie($name, $value){
        $year = 3600*24*365;
        setcookie("$name", serialize($value), (time() + $year));//unserialize in index.php after login.
    }

    function remove_cookie($cookie){
        if (isset($_COOKIE[$cookie] ) ) {
            unset($_COOKIE[$cookie]);
            setcookie($cookie, "", time() - (60*60*24*365));
        }
    }

 ?>
