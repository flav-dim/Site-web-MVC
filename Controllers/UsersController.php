<?php
//SINGLETON
class Users extends AppController
{
    private static $_instance = null;

    private function __construct() {
    }

    public static function getInstance() {

      if(is_null(self::$_instance)) {
        self::$_instance = new Users();
      }

      return self::$_instance;
    }

    //  function index(){
    //      $d = array();
    //      $this->loadModel('User');
    //      $d['users'] = User::getAll();
    //      $this->set($d);
    //      $this->render('index');
     //
    //  }

     function view($id = null){
         if ($id == null) {
             toUsersManager();
         } else {
             $d = array();
             $this->loadModel('User');
             $d['user'] = User::get($id);
             if(empty($d['article'])){
                 AppController::toUserManager();
             } else {
                 $this->set($d);
                 $this->render('view');
             }
         }
     }

     function newUser(){
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
           setFlashMessage("user added ");
           if(Admin::isUserAdmin()){
               AppController::toUserManager();
           } else {
               $this->render('login');//show login page
           }
         } else {//insert didn't work
             $message = implode('<br>', $errors);
             setFlashMessage($message, 'error');
             if(Admin::isUserWriter()){
                 $this->render('../Admin/inscription');//show inscription

             } else {
                 $this->render('inscription');//show inscription
             }
         }

     }
     function updateUser($id){
         $this->loadModel('User');
         $d['user'] = User::get($id);
         $this->set($d);
         $this->render('updateUser');
     }
     function updateUserProfil(){
         $this->loadModel('User');
         $d['user'] = User::get($_SESSION['user']['id']);
         $this->set($d);
         $this->render('updateUserProfil');
     }

     function verifUpdate(){
         $this->loadModel('User');

         extract($_POST);
         $errors = [];

       if(strlen($username) > 10 || strlen($username) < 3){
         $errors[]= "Invalid Name.";
       }

       if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email)) {
           $errors[] = "Invalid Email.";
       }
       if(User::verify_email_update($email, $id) ){//Email must be unique
           $errors[] = "User already exists";
       }

         if ( !isset($user_group) ){
             $user_group = 0;
         }

       if(empty($errors) )
       {
           $this->loadModel('User');
           if(User::update($id, $username, $email, $user_group)){
               setFlashMessage("Account modified");
               AppController::toUserManager();
           } else {
               setFlashMessage("database error", 'error');
               AppController::toUserManager();

           }
         } else {//insert didn't work
             $message = implode('<br>',$errors);
             setFlashMessage($message, 'error');
             AppController::toUpdateUser($id);//show inscription
         }

     }

     function login(){
         $this->loadModel('User');
         $this->render('login');
         if(!empty($_POST)){
            if(User::logIn($_POST) == "password"){//checks input
                setFlashMessage("Wrong Password", 'error');
            } else {
                setFlashMessage("Wrong Email", 'error');
            }
         }
     }

     function logout(){
         $this->render('logout');
     }

     function delete($id){
         $this->loadModel('User');
         if (User::delete($id)) {
             setFlashMessage("The user has been deleted");

             if (Admin::isUserWriter()) {
                 AppController::toUserManager();
             } else {
                 $this->logout();//supprime la session et les cookies + renvoi à Home;
            }
          }
       }

     function profil(){
          $this->render('profil');
       }

}


 ?>
