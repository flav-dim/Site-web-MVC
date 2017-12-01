<?php
// include_once ('AppController.php');
//SINGLETON
class Users extends AppController
{

     function index(){
         $d = array();
         $this->loadModel('User');
         $d['users'] = User::getAll();
         $this->set($d);
         $this->render('index');

     }

     function view($id = null){
         if ($id == null) {
             toUsersManager();
         } else {
             $d = array();
             $this->loadModel('User');
             $d['user'] = User::get($id);
             if(empty($d['article'])){
                 toUserManager();
             } else {
                 $this->set($d);
                 $this->layout = 'super';
                 $this->render('view');
             }
         }
     }

     function newUser(){
        $this->layout = 'super';
        $this->render('inscription');
     }

     function verif(){
         $this->loadModel('User');

         extract($_POST);
         $errors = [];
        //  $errors[0]= false;

       if(strlen($username) > 10 || strlen($username) < 3){
         $errors[]= "Invalid Name.";
       }

       if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email)) {

           $errors[] = "Invalid Email.";
       }
       if(User::verify_email($email) ){//Email must be unique

           $errors[] = "User already exists";
       }
       if( (strlen($password) < 8 || strlen($password) > 20) || $password != $password_conf){

         $errors[]= "Invalid password or password confirmation.";
     } else {
         $password = password_hash($password, PASSWORD_DEFAULT);
     }

     if ( !isset($user_group) ){
         $user_group = 0;
     }

       if(empty($errors) )
       {
           User::addUser($username, $password, $email, $user_group);
           setFlashMessage("user added to database");
           if(isUserAdmin()){
               toUserManager();
           } else {
               $this->render('login');//show login page

           }
         } else {//insert didn't work
             $message = implode($errors);
             setFlashMessage($message);
             $this->render('inscription');//show inscription
         }

     }

     function login(){
         $this->loadModel('User');
         $this->render('login');
         if(!empty($_POST)){
            User::logIn($_POST);//checks input
         }

     }

     function logout(){
         $this->render('logout');
     }

     function delete(){
         $this->loadModel('User');
         if (User::delete($_SESSION['user']['id'])) {
             setFlashMessage("The account has been deleted");
             $this->render('logout');//supprime la session et les cookies + renvoi à Home;
         }

     }


}


 ?>
