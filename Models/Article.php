<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Article extends AppController
{
    protected $table = 'articles';

    public static function getAll(){
        $query = Db::connect()->prepare("SELECT a.*, c.cat_title
            FROM articles a
            JOIN categories c ON a.category_id = c.id");//order by
        $query->execute();
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function get($id){
        $query = Db::connect()->prepare("SELECT * FROM articles WHERE id = ?");
        $query->execute(array($id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function addArticle($title, $content, $category_id){
        $query = Db::connect()->prepare("INSERT INTO articles (title, content, creation_date, category_id)VALUES (?, ?,?, ?)");


        if ($query->execute(array($title, $content, date('Y-m-d H:i:s'),$category_id ) ) ) {
            return true;
        } else {
            return false;
        }

    }
    public static function update($id, $title, $content, $category_id){
        $query = Db::connect()->prepare("UPDATE articles SET title = ?, content= ?, modif_date = ?, category_id = ? WHERE id = ?");


        if ($query->execute(array($title, $content, date('Y-m-d H:i:s'), $category_id, $id ) ) ) {
            return true;
        } else {
            return false;
        }

    }

    public static function delete($id){
       $query = Db::connect()->prepare("DELETE FROM articles WHERE id = ?");
       if ($query->execute(array($id)))
       {
           return true;
       } else {
          return false;
       }

    }
}


 ?>
