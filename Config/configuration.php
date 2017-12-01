<?php
//ALL CONFIGURATIONS CONCERNING THE PROJECT

//**************************Redirections*************/
function toLogin(){//redirect to login page
    header('Location: '.RACINE.'/Home/Users/login/');
    die;
}
function toIndex(){//redirect to index page
    header('Location: '.RACINE.'/Home');
    die;
}
function toArticleManager(){//redirect to index page
    header('Location: '.RACINE.'/Home/Admin/articles/');
    die;
}
function toCategoryManager(){//redirect to index page
    header('Location: '.RACINE.'/Home/Admin/categories/');
    die;
}
function toCommentManager(){//redirect to index page
    header('Location: '.RACINE.'/Home/Admin/comments/');
    die;
}
function toView($id){//redirect to index page
    header('Location: '.RACINE.'/Home/Articles/view/'.$id.'/');
    die;
}
function toUpdateUser($id){//redirect to index page
    header('Location: '.RACINE.'/Home/Users/updateUser/'.$id.'/');
    die;
}
function toAddArticle($id){//redirect to index page
    header('Location: '.RACINE.'/Home/Admin/newArticle/');
    die;
}
function toUpdateArticle($id){//redirect to index page
    header('Location: '.RACINE.'/Home/Articles/updateArticle/'.$id.'/');
    die;
}
function toAddCategory($id){//redirect to index page
    header('Location: '.RACINE.'/Home/Admin/newCategory/');
    die;
}
function toUpdateCategory($id){//redirect to index page
    header('Location: '.RACINE.'/Home/Categories/updateCategory/'.$id.'/');
    die;
}
// function toUsers(){//redirect to index page
//     header('Location: '.RACINE.'/Home/Users');
//     die;
// }
function toUserManager(){//redirect to index page
    header('Location: '.RACINE.'/Home/Admin/users/');
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
    function isUserConnected(){//return true if user is connected
        return isset($_SESSION['user']);
    }

    function userSecurity(){
        if(!isUserConnected() ){
            toLogin();
        }
    }
    // function isBanned($id){
    //     return
    // }
    function isUserAdmin(){
        return isUserConnected() && $_SESSION['user']['user_group'] == 2 ;// return if user is admin
    }
    function isUserWriter(){
        return isUserConnected() && ($_SESSION['user']['user_group'] == 1 || $_SESSION['user']['user_group'] == 2) ;// return if user is admin or writer
    }

    function adminSecurity(){
        if(!isUserAdmin() ){
            toIndex();//if not admin go to index
        }
    }
    function writerSecurity(){
        if(!isUserWriter() ){
            toIndex();//if not writer go to index
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
