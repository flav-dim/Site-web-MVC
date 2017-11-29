<?php
//FUNCTIONs TO MANAGE DB REQUESTS
class Article extends AppController
{
    protected $table = 'articles';

    public static function getLast($num = 5){
        $query = Db::connect()->prepare("SELECT * FROM articles");
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
}


 ?>
