<?php
// include_once ('AppController.php');
//SINGLETON
class Articles extends AppController
{
    private static $_instance = null;

    private function __construct() {
    }

    public static function getInstance() {

      if(is_null(self::$_instance)) {
        self::$_instance = new Articles();
      }

      return self::$_instance;
    }

    function index($order = null){
        $d = array();
        $this->loadModel('Article');//fait un require de la page Models/Article
        $d['articles'] = Article::getAll();
        if($order != null){
            if(in_array($order, array('title_asc', 'title_desc', 'date_asc', 'date_desc') ) ){
                switch ($order) {
                    case 'title_asc':
                        $order = 'title ASC';
                        break;
                    case 'date_asc':
                        $order = 'modif_date ASC';
                        break;
                    case 'title_desc':
                        $order = 'title DESC';
                        break;
                    case 'date_desc':
                        $order = 'modif_date DESC';
                        break;

                    default:
                        break;
                }
            }
            $d['articles'] = Article::getAll($order);
            $this->set($d);//rajoute dans l'array vars
            $this->loadModel('Category');//fait un require de la page Models/Category
            $d['categories'] = Category::getAll();
            $d['authors'] = Article::getAllAuthors();

            $this->set($d);
            $this->layout = 'sideBar';
            $this->render('../Home/home');
            return;
        }
        $this->set($d);//rajoute dans l'array vars
        $this->render('index');//inclu les info dans indx

    }
    function indexTag($tag_title){
        $this->loadModel('Tag');
        if(!Tag::verify_name($tag_title)){//name doesn't exist
            AppController::toIndex();
        }
        $d['articles'] = Tag::getAllArticles($tag_title);
        $this->set($d);
        $this->render('index');
    }
    function indexCat($cat_title){
        $this->loadModel('Category');
        if(!Category::verify_name($cat_title)){//name doesn't exist
            AppController::toIndex();
        }
        $d['articles'] = Category::getAllArticles($cat_title);
        $this->set($d);
        $this->render('index');
    }

    function view($id = null){
        if ($id == null) {
            AppController::toArticleManager();
        } else {
            $d = array();
            $this->loadModel('Article');
            $this->loadModel('Comment');
            $this->loadModel('User');
            $d['article'] = Article::get($id);
            $d['writer'] = User::get($d['article'][0]['author_id']);
            $d['comments'] = Comment::get($id);
            $d['tags'] = Article::getAllTags($id);
            if(empty($d['article'])){//si l'article n'existe pas
                AppController::toIndex();
            } else {
                $this->set($d);
                $this->render('view');
            }

        }
    }

    function verif(){
        $this->loadModel('Article');
        $this->loadModel('Tag');

        extract($_POST);
        $errors = [];

      if(strlen($title) > 30 || strlen($title) < 3){
        $errors[]= "Invalid Title.";
    } else{
        AppController::secure_input($title);
    }

      if(empty($content)){
          $errors[]= "Invalid Content.";
      } else {
          AppController::secure_input($content);
          $content = nl2br($content);
      }
      if(empty($category_id)){
          $errors[]= "Invalid Category.";
      }

      if(!empty($_FILES['photo']['tmp_name']) ){

          $photo = uniqid().'_'.$_FILES['photo']['name'];// uniqid crée un id unique pour chaque photo

          move_uploaded_file($_FILES['photo']['tmp_name'], "/home/kay/Rendu/PHP_Rush_MVC/Webroot/Img/".$photo);// on déplace l'img dans le dossier Img

          if ($_FILES['photo']['size'] >1000000) {
              $errors[]= 'your photo can\'t be more than 1Mo';
          }

          if (!in_array($_FILES['photo']['type'], array('image/jpeg','image/gif','image/png')) ){
              $errors[] = 'your photo must be a JPG, GIF or PNG';
          }
      }
      else{
          $errors[]='you have to add a photo';
      }

      if(empty($errors) )
      {
          if($tag){
              $tag_id = [];
              $tag_title = explode(' ', $tag);
              array_filter($tag_title, 'AppController::secure_input');
              foreach ($tag_title as $key => $tag_name) {
                  if(!Tag::verify_name($tag_name)){
                      Tag::add($tag_name);
                  }

              }
              foreach ($tag_title as $key => $value) {
                  $tag_id[] = Tag::getId('tag_title', $value);
              }
          }

          if(Article::addArticle($title, $content, $category_id, $photo, $author_id)) {
              if(!empty($tag_id) ){
                  $article_id = Article::getId('photo', $photo);//on récupère l'article qu'on vien de créer grace a son nom photo(unique) pour avoir son id.
                  foreach ($tag_id as $tag) {
                      Article::addTag($article_id, $tag);
                  }
              }
              setFlashMessage("Article added ");
              AppController::toArticleManager();
          } else {
              setFlashMessage("database error");
            AppController::toArticleManager();
          }

        } else {//insert didn't work
            $message = implode('<br>', $errors);
            setFlashMessage($message);
            AppController::toAddArticle();
        }

    }

    function updateArticle($id){
        $this->loadModel('Article');
        $this->loadModel('Tag');

        if(!Article::get($id)){
            AppController::toIndex();
        }
        $this->loadModel('Category');
        $d['article'] = Article::get($id);
        $d['tags'] = Article::getAllArticleTags($id);
        $d['categories'] = Category::getAll();
        $this->set($d);
        $this->render('updateArticle');
    }

    function verifUpdate(){
        $this->loadModel('Article');
        $this->loadModel('Tag');

        array_filter($_POST, "AppController::secure_input");
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
          if($tag){
              Tag::delete($id);
              $tag_id = [];
              $tag_title = explode(' ', $tag);
              array_filter($tag_title, 'AppController::secure_input');
              foreach ($tag_title as $key => $tag_name) {
                  if(!Tag::verify_name($tag_name)){
                      Tag::add($tag_name);
                  }

              }
              foreach ($tag_title as $key => $value) {
                  $tag_id[] = Tag::getId('tag_title', $value);
              }
          }

          if(Article::update($id, $title, $content, $category_id)){
              if(!empty($tag_id) ){
                  $article_id = $id;
                  foreach ($tag_id as $tag) {
                      Article::addTag($article_id, $tag);
                  }
              }
              AppController::toArticleManager();
          } else {
              setFlashMessage("database error");
              AppController::toArticleManager();

          }

      } else {//insert didn't work
            $message = implode('<br>', $errors);
            setFlashMessage($message);
            AppController::toUpdateArticle($id);//show inscription
        }

    }

    function delete($id){
        $this->loadModel('Article');
        if (Article::delete($id)) {
            setFlashMessage("The Article has been deleted");
            AppController::toArticleManager();
        }

    }






}

 ?>
