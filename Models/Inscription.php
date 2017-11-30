<?php

class Inscription extends User
{

    public static function verif()
    {
        extract($_POST);
        $errors = [];
        $errors[0]= false;

      if(strlen($username) > 10 || strlen($username) < 3){
        $errors[]= "Invalid Name.";
      }

      if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email)) {

          $errors[] = "Invalid Email.";
      }
      if(User::verify_email($email) ){//Email must be unique

          $errors[] = "User already exists";
      }
      if( (strlen($password) < 8 || strlen($password) > 20) || $password != $password_conf){

        $errors[]= "Invalid password or password confirmation.";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

      if(empty($errors[1]))
      {
          User::addUser($username, $password, $email);
          $response = [];
          $response[0] = true;
          $response[]= "User added to db";
          return $response;
          //renvoi à UsersController verif()
      }

      return $errors;
  }


}
 ?>
