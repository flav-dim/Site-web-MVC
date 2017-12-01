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
            $this->loadModel('Comment');
            $d['article'] = Article::get($id);
            $d['comments'] = Comment::get($id);
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
      if(empty($category_id)){
          $errors[]= "Invalid Category.";
      }

      if(empty($errors) )
      {
          Article::addArticle($title, $content, $category_id);
          setFlashMessage("Article added to database");
          if(isUserAdmin()){
              toArticleManager();
          }
        } else {//insert didn't work
            $message = implode('<br>', $errors);
            setFlashMessage($message);
            $this->render('add_article');//show inscription
        }

    }

    function updateArticle($id){
        $this->loadModel('Article');
        $this->loadModel('Category');
        $d['article'] = Article::get($id);
        $d['categories'] = Category::getAll();
        $this->set($d);
        $this->render('updateArticle');
    }

    function verifUpdate(){
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
      if(empty($category_id)){
          $errors[]= "Invalid Category.";
      }

      if(empty($errors) )
      {
          Article::update($id, $title, $content, $category_id);
          setFlashMessage("Article modified");
              toArticleManager();

        } else {//insert didn't work
            $message = implode('<br>', $errors);
            setFlashMessage($message);
            toUpdateArticle($id);//show inscription
        }

    }


    function delete($id){
        $this->loadModel('Article');
        if (Article::delete($id)) {
            setFlashMessage("The Article has been deleted");
            toArticleManager();
        }

    }






}

 ?>
