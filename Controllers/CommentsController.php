<?php
// include_once ('AppController.php');
//SINGLETON
class Comments extends AppController
{

    function index(){
        $d = array();
        $this->loadModel('Comment');//fait un require de la page Models/Comment
        $d['comments'] = Comment::getAll();
        $this->set($d);//rajoute dans l'array vars
        $this->render('index');//inclu les info dans indx

    }

    // function view($id = null){
    //     if ($id == null) {
    //         toCommentManager();
    //     } else {
    //         $d = array();
    //         $this->loadModel('Comment');
    //         $d['comment'] = Comment::get($id);
    //         if(empty($d['comment'])){
    //             toComments();
    //         } else {
    //             $this->set($d);
    //             $this->render('view');
    //         }
    //
    //     }
//}

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
          setFlashMessage("Comment added to database");

              toView($article_id);

        } else {//insert didn't work
            $message = implode($errors);
            setFlashMessage($message);
            toView($article_id);

        }

    }

    function delete($id){
        $this->loadModel('Comment');
        if (Comment::delete($id)) {
            setFlashMessage("The comment has been deleted");
            toCommentManager();
        }

    }






}

 ?>
