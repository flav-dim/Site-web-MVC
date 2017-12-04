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
         $this->loadModel('Category');//fait un require de la page Models/Category
         $d['articles'] = Article::getAll();
         $d['categories'] = Category::getAll();
         $d['authors'] = Article::getAllAuthors();
         $this->set($d);
         $this->layout = 'sideBar';
         $this->render('home');
     }



}


 ?>
