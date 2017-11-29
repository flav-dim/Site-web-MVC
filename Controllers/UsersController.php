<?php
include_once ('AppController.php');
//SINGLETON
class Users extends AppController
{

protected function __construct() { } // Constructeur en privé pour empecher l'instanciation.

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

UsersController::update(4, "pouet3","123(((4", "email@poeut2" );

 ?>
