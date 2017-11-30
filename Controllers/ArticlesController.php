<?php
// include_once ('AppController.php');
//SINGLETON
class Articles extends AppController
{

    public function __construct() { } // Constructeur en privé pour empecher l'instanciation.

    //method articles

    function index(){
        $d = array();
        $this->loadModel('Article');//fait un require de la page Models/Article
        $d['articles'] = Article::getLast();
        $this->set($d);//rajoute dans l'array vars
        $this->render('index');//inclu les info dans indx

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
