<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Categories extends AppController
{
    private static $_instance = null;

    private function __construct() {
    }

    public static function getInstance() {

      if(is_null(self::$_instance)) {
        self::$_instance = new Categories();
      }

      return self::$_instance;
    }

    function verif(){
        $this->loadModel('Category');
        array_filter($_POST, "AppController::secure_input");
        extract($_POST);
        $errors = [];

        if(strlen($cat_title) > 30 || strlen($cat_title) < 3){
            $errors[]= "Invalid Title.";
        }

        if(Category::verify_name($cat_title)){
            $errors[] = "This category already exists";
        }

        if(empty($errors) ){

            if(Category::add($cat_title) ){
                setFlashMessage("Category created");
                AppController::toCategoryManager();
            } else {
                setFlashMessage("database error");
                AppController::toCategoryManager();
            }

        } else {
            $message = implode('<br>', $errors);
            setFlashMessage($message);
            AppController::toAddCategory();

        }// fin empty $errors
    }
    function verifUpdate(){
        $this->loadModel('Category');
        array_filter($_POST, "AppController::secure_input");
        extract($_POST);
        $errors = [];

        if(strlen($cat_title) > 30 || strlen($cat_title) < 3){
            $errors[]= "Invalid Title.";
        }

        if(Category::verify_name_update($cat_title, $id)){
            $errors[] = "This category already exists";
        }

        if(empty($errors) ){

            if( Category::update($cat_title, $id) ){
                setFlashMessage("Category modified");
                AppController::toCategoryManager();
            } else {
                setFlashMessage("database error");
                AppController::toCategoryManager();
            }

        } else {
            $message = implode('<br>', $errors);
            setFlashMessage($message);
            AppController::toUpdateCategory($id);

        }// fin empty $errors
    }

    function delete($id){
        $this->loadModel('Category');
        if (Category::delete($id)) {
            setFlashMessage("The Category has been deleted");
            AppController::toCategoryManager();
        }

    }
}
 ?>
