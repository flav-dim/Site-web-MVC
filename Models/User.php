<?php
//FUNCTIONs TO MANAGE DB REQUESTS
class User extends AppController
{
    protected $table = 'users';

    public static function getAll(){
        $query = Db::connect()->prepare("SELECT * FROM users");
        $query->execute();
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
    public static function get($id){
        $query = Db::connect()->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute(array($id));
        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    public static function addUser($username, $password, $email, $user_group = 0, $status = false ){
        $query = $this->model->prepare("INSERT INTO users (username, password, email, user_group, status, creation_date) VALUES (?,?,?,?,?,?)");

        if($query->execute(
            array(
                $username, $password, $email, $user_group, $status, date('Y-m-d H:i:s')
                )
            ) ){
            return true;
        } else {
            return false;
        }

     }

     public function update($id, $username, $password, $email, $user_group = 0, $status = false)
     {
         $query = $this->model->prepare("UPDATE users SET username = ?, password = ?, email = ?, user_group = ? , status = ?, modif_date = ? WHERE id = ?");
         if(
             $query->execute(array($username, $password, $email, $user_group, $status, date('Y-m-d H:i:s'), $id ) )
         ){
             return true;
         } else {
             return false;
         }
     }
}


 ?>
