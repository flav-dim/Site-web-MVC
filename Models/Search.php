<?php
class Search
{
    public function byName($name){
        $name = "%$name%";
        $query =  Db::connect()->prepare(
            "SELECT *
            FROM articles
            WHERE title LIKE ?"
        );
        $query->execute(array($name));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    // public function byUserName($name){
    //     $name = "%$name%";
    //     $query =  Db::connect()->prepare(
    //         "SELECT *
    //         FROM articles
    //         WHERE username LIKE ?"
    //     );
    //     $query->execute(array($name));
    //     $result = $query->fetchAll();
    //
    //     if ($result) {
    //         return $result;
    //     } else {
    //         return false;
    //     }
    // }

    public function sortBy($sort){
        if($sort){

            $query = "SELECT * FROM articles ORDER BY $sort";

            $stmt= Db::connect()->query($query);

            $result = $stmt->fetchAll();

            if ($result) {
                return $result;
            } else {
                return false;
            }

        } else {
            $query = "SELECT * FROM articles";

            $stmt= Db::connect()->query($query);

            $result = $stmt->fetchAll();

            if ($result) {
                return $result;
            } else {
                return false;
            }
        }

    }

}



 ?>
