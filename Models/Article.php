<?php
//FUNCTIONS TO MANAGE DB REQUESTS
class Article
{

    public static function getAll($order = "modif_date DESC"){
        $query = Db::connect()->prepare("SELECT a.*, c.cat_title
            FROM articles a
            JOIN categories c ON a.category_id = c.id
            ORDER BY $order ");//order by
        $query->execute();
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function getAllTags($id){
        $query = Db::connect()->prepare("SELECT a.*, t.tag_title, at.tag_id
            FROM articles a
            JOIN  articles_tags at ON a.id = at.article_id
            JOIN  tags t ON t.id = at.tag_id
            WHERE article_id = ?");//order by
        $query->execute(array($id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function getAllArticleTags($id){
        $query = Db::connect()->prepare("SELECT t.*
            FROM tags t
            JOIN articles_tags at ON t.id = at.tag_id
            WHERE article_id = ?");
        $query->execute(array($id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function getAllAuthors(){
        $query = Db::connect()->prepare("SELECT DISTINCT u.*
            FROM articles a
            JOIN  users u ON a.author_id = u.id"
            );
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
    public static function getId($field, $value){
        $query = Db::connect()->prepare("SELECT id FROM articles WHERE $field = ?");
        $query->execute(array($value));
        $result = $query->fetchColumn();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function addArticle($title, $content, $category_id, $photo, $author_id){
        $query = Db::connect()->prepare("INSERT INTO articles (title, content, creation_date, modif_date, category_id, photo, author_id)VALUES (?, ?,?,?, ?, ?, ?)");


        if ($query->execute(array($title, $content, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),$category_id, $photo, $author_id ) ) ) {
            return true;
        } else {
            return false;
        }

    }
    public static function addTag($article_id, $tag_id){
        $query = Db::connect()->prepare("INSERT INTO articles_tags (article_id, tag_id)VALUES (?, ?)");

        if ($query->execute(array($article_id, $tag_id ) ) ) {
            return true;
        } else {
            return false;
        }

    }
    public static function deleteTag($article_id){
        $query = Db::connect()->prepare("DELETE FROM articles_tags WHERE article_id = ?");

        if ($query->execute(array($article_id ) ) ) {
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
        $query = Db::connect()->prepare("DELETE FROM comments WHERE article_id = ?");
        $query->execute(array($id));

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
