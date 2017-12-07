<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Tag
{

    public static function getAll(){
        $query = Db::connect()->prepare("SELECT * FROM tags");//order by
        $query->execute();
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function getAllArticles($tag_title){
        $tag_id = Tag::getId('tag_title', $tag_title);
        $query = Db::connect()->prepare("SELECT a.*
            FROM articles a
            JOIN articles_tags at ON at.article_id = a.id
            WHERE at.tag_id= ?");//order by
        $query->execute(array($tag_id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function getId($field, $value){
        $query = Db::connect()->prepare("SELECT id FROM tags WHERE $field = ?");
        $query->execute(array($value));
        $result = $query->fetchColumn();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function get($id){
        $query = Db::connect()->prepare("SELECT * FROM tags WHERE id = ?");
        $query->execute(array($id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function mostPopular($nb = 10){
        $query = Db::connect()->prepare("SELECT tag_title, tag_id, COUNT(*) AS popular
        FROM articles_tags
        JOIN tags
        ON tags.id = articles_tags.tag_id
        GROUP BY tag_id
        ORDER BY popular DESC 
        LIMIT $nb");
        $query->execute();
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    public static function add($tag_title){
        $query = Db::connect()->prepare("INSERT INTO tags (tag_title)VALUES (?)");

        if ($query->execute(array($tag_title) ) ) {
            return true;
        } else {
            return false;
        }

    }

    public static function verify_name($tag_title)//checks if the tag exists in DB
    {
        $query =  Db::connect()->prepare("SELECT tag_title FROM tags WHERE tag_title = ?");
        $query->execute(array($tag_title));
        $result = $query->fetchColumn();

        if ($result) {
            return true;//tag exists
        } else {
            return false;//doesn't exist
        }

    }
    public static function verify_name_update($tag_title, $id)
    {
        $query =  Db::connect()->prepare("SELECT tag_title FROM tags WHERE tag_title = ? AND id != ?");
        $query->execute(array($tag_title, $id));
        $result = $query->fetchColumn();

        if ($result) {
            return true;//tag exists
        } else {
            return false;//doesn't exist
        }

    }

    public static function update($title, $id){
        $query = Db::connect()->prepare("UPDATE tags SET tag_title = ? WHERE id = ?");

        if ($query->execute(array($title, $id ) ) ) {
            return true;
        } else {
            return false;
        }

    }

    public static function delete($id){
        $query = Db::connect()->prepare("DELETE FROM articles_tags WHERE article_id = ?");
        $query->execute(array($id));

       $query = Db::connect()->prepare("DELETE FROM tags WHERE id = ?");
       if ($query->execute(array($id)))
       {
           return true;
       } else {
          return false;
       }

    }


}


 ?>
