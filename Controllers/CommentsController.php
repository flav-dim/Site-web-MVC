<?php
// include_once ('AppController.php');
//SINGLETON
class Comments extends AppController
{
    private static $_instance = null;

    private function __construct() {
    }

    public static function getInstance() {

      if(is_null(self::$_instance)) {
        self::$_instance = new Comments();
      }

      return self::$_instance;
    }

    function index(){
        $d = array();
        $this->loadModel('Comment');//fait un require de la page Models/Comment
        $d['comments'] = Comment::getAll();
        $this->set($d);//rajoute dans l'array vars
        $this->render('index');//inclu les info dans indx

    }

    function verif(){
        $this->loadModel('Comment');

        array_filter($_POST, "self::secure_input");
        extract($_POST);
        $errors = [];

      if(empty($com)){
          $errors[]= "Invalid Comment.";
      }

      if(empty($errors) )
      {
          Comment::addComment($article_id, $user_id, $com);
          setFlashMessage("Comment added ");

              AppController::toView($article_id);

        } else {//insert didn't work
            $message = implode($errors);
            setFlashMessage($message);
            AppController::toView($article_id);

        }

    }

    function delete($id){
        $this->loadModel('Comment');
        if (Comment::delete($id)) {
            setFlashMessage("The comment has been deleted");
            AppController::toCommentManager();
        }

    }






}

 ?>
