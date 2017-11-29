<?php
// include_once ('AppController.php');
//SINGLETON
class Articles extends AppController
{

    public function __construct() { } // Constructeur en privé pour empecher l'instanciation.

    //method articles

    function index(){
        $d = array();
        $this->loadModel('Article');
        $d['articles'] = Article::getLast();
        $this->set($d);
        $this->render('index');


    }

    function view($id){
        $d = array();
        $this->loadModel('Article');
        $d['article'] = Article::get($id);
        $this->set($d);
        $this->render('view');
    }






}

 ?>
