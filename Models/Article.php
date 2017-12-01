<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Article extends AppController
{
    protected $table = 'articles';

    public static function getAll(){
        $query = Db::connect()->prepare("SELECT * FROM articles");//order by
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
    public static function addArticle($title, $content){
        $query = Db::connect()->prepare("INSERT INTO articles (title, content, creation_date)VALUES (?, ?,?)");


        if ($query->execute(array($title, $content, date('Y-m-d H:i:s') ) ) ) {
            return true;
        } else {
            return false;
        }

    }
}


 ?>
