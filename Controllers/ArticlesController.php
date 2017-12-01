<?php
// include_once ('AppController.php');
//SINGLETON
class Articles extends AppController
{

    function index(){
        $d = array();
        $this->loadModel('Article');//fait un require de la page Models/Article
        $d['articles'] = Article::getAll();
        $this->set($d);//rajoute dans l'array vars
        $this->render('index');//inclu les info dans indx

    }

    function view($id = null){
        if ($id == null) {
            toArticleManager();
        } else {
            $d = array();
            $this->loadModel('Article');
            $d['article'] = Article::get($id);
            if(empty($d['article'])){
                toArticles();
            } else {
                $this->set($d);
                $this->render('view');
            }

        }
    }

    function verif(){
        $this->loadModel('Article');

        array_filter($_POST, "self::secure_input");
        extract($_POST);
        $errors = [];

      if(strlen($title) > 30 || strlen($title) < 3){
        $errors[]= "Invalid Title.";
      }

      if(empty($content)){
          $errors[]= "Invalid Content.";
      }

      if(empty($errors) )
      {
          Article::addArticle($title, $content);
          setFlashMessage("Article added to database");
          if(isUserAdmin()){
              toArticleManager();
          }
        } else {//insert didn't work
            $message = implode($errors);
            setFlashMessage($message);
            $this->render('add_article');//show inscription
        }

    }








}

 ?>
