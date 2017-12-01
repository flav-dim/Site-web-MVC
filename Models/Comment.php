<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Comment extends AppController
{
    protected $table = 'comments';

    public static function getAll(){
        $query = Db::connect()->prepare("SELECT c.*, u.username, a.title
            FROM comments c
            JOIN users u ON u.id = c.user_id
            JOIN articles a on a.id = c.article_id");//order by
        $query->execute();
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function get($article_id){
        $query = Db::connect()->prepare("SELECT c.*, u.* FROM comments c JOIN users u ON u.id = c.user_id WHERE article_id = ?");
        $query->execute(array($article_id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function addComment($article_id, $user_id, $com){
        $query = Db::connect()->prepare("INSERT INTO comments (article_id, user_id, com, creation_date )VALUES (?, ?, ?, ?)");

        if ($query->execute(array($article_id, $user_id, $com, date('Y-m-d H:i:s') ) ) ) {
            return true;
        } else {
            return false;
        }

    }

    public static function delete($id){
       $query = Db::connect()->prepare("DELETE FROM comments WHERE id = ?");
       if ($query->execute(array($id)))
       {
           return true;
       } else {
          return false;
       }

    }
}


 ?>
