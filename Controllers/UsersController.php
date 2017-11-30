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

     function view($id){
         $d = array();
         $this->loadModel('User');
         $d['user'] = User::get($id);
         $this->set($d);
         $this->layout = 'super';
         $this->render('view');
     }

     function newUser(){
        $this->layout = 'super';
        $this->render('inscription');
     }

     function verif(){
         $this->loadModel('User');
         $this->loadModel('Inscription');//charge les classes
         $state = Inscription::verif();//checks input

         if($state[0] == true){//insert is successfull
             unset($state[0]);
             $message = implode('<br>',$state);
             setFlashMessage($message);
             $this->render('login');//show login page
         } else {//insert didn't work
             unset($state[0]);
             $message = implode('<br>',$state);
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
