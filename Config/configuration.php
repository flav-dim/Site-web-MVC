<?php
//ALL CONFIGURATIONS CONCERNING THE PROJECT

//**************************Redirections*************/
function toLogin(){//redirect to login page
    header('Location: '.RACINE.'/Home/Users/login/');
    die;
}

//**************************Display*************/
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

function displayDate($day, $month, $year){
        $mois=[
            1=>'January',
            2=>'February',
            3=>'March',
            4=>'April',
            5=>'May',
            6=>'June',
            7=>'July',
            8=>'August',
            9=>'September',
            10=>'October',
            11=>'November',
            12=>'December',
        ];
        return $day.' '.$mois[$month].' '.$year;
    }

/***********************SECURITY**********************/
    
    function my_cookie($name, $value){
        $year = 3600*24*365;
        setcookie("$name", serialize($value), (time() + $year));//unserialize after login.
    }

    function remove_cookie($cookie){
        if (isset($_COOKIE[$cookie] ) ) {
            unset($_COOKIE[$cookie]);
            setcookie($cookie, "", time() - (60*60*24*365));
        }
    }

 ?>
