<?php
// include_once ('AppController.php');
//SINGLETON
class Home extends AppController
{

     function index(){
         $d = array();
         $this->loadModel('Article');//fait un require de la page Models/Article
         $d['articles'] = Article::getAll();
         $this->set($d);
         $this->render('home');
     }



}


 ?>
