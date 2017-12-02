<?php
// include_once ('AppController.php');
//SINGLETON
class Home extends AppController
{
    private static $_instance = null;

    private function __construct() {
    }

    public static function getInstance() {

      if(is_null(self::$_instance)) {
        self::$_instance = new Home();
      }

      return self::$_instance;
    }
     function index(){
         $d = array();
         $this->loadModel('Article');//fait un require de la page Models/Article
         $d['articles'] = Article::getAll();
         $this->set($d);
         $this->render('home');
     }



}


 ?>
