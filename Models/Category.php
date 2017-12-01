<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Category extends AppController
{
    protected $table = 'categories';

    public static function getAll(){
        $query = Db::connect()->prepare("SELECT * FROM categories");//order by
        $query->execute();
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function get($id){
        $query = Db::connect()->prepare("SELECT * FROM categories WHERE id = ?");
        $query->execute(array($id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    public static function addCategory($cat_title){
        $query = Db::connect()->prepare("INSERT INTO categories (cat_title)VALUES (?)");

        if ($query->execute(array($cat_title) ) ) {
            return true;
        } else {
            return false;
        }

    }

    public static function verify_name($cat_title)//checks if the email exists in DB
    {
        $query =  Db::connect()->prepare("SELECT cat_title FROM pool_php_rush.categories WHERE cat_title = ?");
        $query->execute(array($cat_title));
        $result = $query->fetchColumn();

        if ($result) {
            return true;//category exists
        } else {
            return false;//doesn't exist
        }

    }

    public static function delete($id){
       $query = Db::connect()->prepare("DELETE FROM categories WHERE id = ?");
       if ($query->execute(array($id)))
       {
           return true;
       } else {
          return false;
       }

    }


}


 ?>
