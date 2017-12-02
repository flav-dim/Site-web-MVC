<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Category
{

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

    public static function add($cat_title){
        $query = Db::connect()->prepare("INSERT INTO categories (cat_title)VALUES (?)");

        if ($query->execute(array($cat_title) ) ) {
            return true;
        } else {
            return false;
        }

    }

    public static function verify_name($cat_title)//checks if the cat exists in DB
    {
        $query =  Db::connect()->prepare("SELECT cat_title FROM categories WHERE cat_title = ?");
        $query->execute(array($cat_title));
        $result = $query->fetchColumn();

        if ($result) {
            return true;//category exists
        } else {
            return false;//doesn't exist
        }

    }
    public static function verify_name_update($cat_title, $id)
    {
        $query =  Db::connect()->prepare("SELECT cat_title FROM categories WHERE cat_title = ? AND id != ?");
        $query->execute(array($cat_title, $id));
        $result = $query->fetchColumn();

        if ($result) {
            return true;//category exists
        } else {
            return false;//doesn't exist
        }

    }

    public static function update($title, $id){
        $query = Db::connect()->prepare("UPDATE categories SET cat_title = ? WHERE id = ?");

        if ($query->execute(array($title, $id ) ) ) {
            return true;
        } else {
            return false;
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
