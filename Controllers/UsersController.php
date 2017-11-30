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
         $this->render('view');
     }



}


 ?>
