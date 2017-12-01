<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Categories extends AppController
{
    protected $table = 'categories';


    function verif(){
        $this->loadModel('Category');

        array_filter($_POST, "self::secure_input");
        extract($_POST);
        $errors = [];

        if(strlen($cat_title) > 30 || strlen($cat_title) < 3){
            $errors[]= "Invalid Title.";
        }

        if(Category::verify_name($cat_title)){
            $errors[] = "This category already exists";
        }

        if(empty($errors) ){

            if(Category::addCategory($cat_title) ){
                setFlashMessage("Category added to database");
                toCategoryManager();
            } else {
                $message = implode($errors);
                setFlashMessage($message);
                $this->render('add_category');
            }

        } // fin empty $errors
    }

}


 ?>
