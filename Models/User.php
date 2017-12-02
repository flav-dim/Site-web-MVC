<?php
//FUNCTIONs TO MANAGE DB REQUESTS
class User
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

    public static function logIn($array){
        extract($array);
        $query = Db::connect()->prepare("SELECT * FROM users WHERE email = ? ");
        $query->execute(array($email));
        $result = $query->fetch();
        if($result['status'] == true ){//si il est banni, on empeche la connection
            setFlashMessage('You\'re account has been desactivated ');
            AppController::toIndex();
        }

        if(!empty($result)){
            if( password_verify($password, $result['password']) ){
                if(isset($remember_me) ){
                    my_cookie("user", $result);
                }
                $_SESSION['user'] = $result;
                AppController::toIndex();
            } else {
                setFlashMessage("Wrong Password");
                return false;
            }
        } else {
            setFlashMessage("Wrong email");
            return false;
        }
    }

    public static function addUser($username, $password, $email, $user_group = 0, $status = false ){
        $query = Db::connect()->prepare("INSERT INTO users (username, password, email, user_group, status, creation_date, modif_date) VALUES (?,?,?,?,?,?, ?)");

        if($query->execute(
            array(
                $username, $password, $email, $user_group, $status, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')
                )
            ) ){
            return true;
        } else {
            return false;
        }

     }

     public static function verify_email($email)//checks if the email exists in DB
     {
         $query =  Db::connect()->prepare("SELECT email FROM users WHERE email = ?");
         $query->execute(array($email));
         $result = $query->fetchColumn();

         if ($result) {
             return true;//user exists
         } else {
             return false;//doesn't exist
         }

     }

     public function verify_email_update($email, $id)//checks if the email exists in DB
     {
         $query =  Db::connect()->prepare("SELECT email FROM users WHERE email = ? AND id != ?");
         $query->execute(array($email, $id));
         $result = $query->fetchColumn();

         if ($result) {
             return true;//email registered
         } else {
             return false;//doesn't exist
         }

     }

     public static function update($id, $username, $email, $user_group, $status = false)
     {
         $query = Db::connect()->prepare("UPDATE users SET username = ?, email = ?, user_group = ? , status = ?, modif_date = ? WHERE id = ?");
         if(
             $query->execute(array($username, $email, $user_group, $status, date('Y-m-d H:i:s'), $id ) )
         ){
             return true;
         } else {
             return false;
         }
     }

     public static function updateOne($field, $value, $id)
     {
         $query = Db::connect()->prepare("UPDATE users SET $field = ? WHERE id = ?");
         if($query->execute(array($value, $id) ) ){
             return true;
         } else {
             return false;
         }
     }
     public static function isBanned($id){
         $user = self::get($id);
         if($user[0]['status']){
             return true;
         } else {
             return false;
         }
     }
     public static function delete($id){
        $query = Db::connect()->prepare("DELETE FROM users WHERE id = ?");
        if ($query->execute(array($id)))
        {
            return true;
        } else {
           return false;
        }

     }
}


 ?>
