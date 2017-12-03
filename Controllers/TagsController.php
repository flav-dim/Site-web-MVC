<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Tags extends AppController
{
    private static $_instance = null;

    private function __construct() {
    }

    public static function getInstance() {

      if(is_null(self::$_instance)) {
        self::$_instance = new Tags();
      }

      return self::$_instance;
    }

    function index($tag_title){
        $this->loadModel('Tag');
        $d['articles'] = Tag::getAllArticles($tag_title);
        $this->set($d);
        $this->render('index');
    }
    function verif(){
        $this->loadModel('Tag');
        array_filter($_POST, "AppController::secure_input");
        extract($_POST);
        $errors = [];

        if(strlen($tag_title) > 30 || strlen($tag_title) < 3){
            $errors[]= "Invalid Title.";
        }

        if(Tag::verify_name($tag_title)){
            $errors[] = "This tag already exists";
        }

        if(empty($errors) ){

            if(Tag::add($tag_title) ){
                setFlashMessage("Tag created");
                AppController::toTagManager();
            } else {
                setFlashMessage("database error");
                AppController::toTagManager();
            }

        } else {
            $message = implode('<br>', $errors);
            setFlashMessage($message);
            AppController::toAddTag();

        }// fin empty $errors
    }


    function delete($id){
        $this->loadModel('Tag');
        if (Tag::delete($id)) {
            setFlashMessage("The Tag has been deleted");
            AppController::toTagManager();
        }

    }
}
 ?>
