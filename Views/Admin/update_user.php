<?php
include_once 'include.php';
adminSecurity();//pour user non connecté qui ajoute un id dans url Inscription.php

$username = $email = "";
$errors = [];
if (empty($_POST) ){

    $updateUser = $superUser->getUser("id", $_GET['id']);

    if($updateUser){// si l'id correspond bien à un user en bdd
        $id = $updateUser['id'];//on affecte les valeurs dans les Value des input...
        $username = $updateUser['username'];//on affecte les valeurs dans les Value des input...
        $email = $updateUser['email'];

    } else {
        toUserManager();//sinon on redirige vers User Manager
    }
}
else {
    sanitizePost();
    extract($_POST);

    if (empty($username) || strlen($username)< 3 || strlen($username)> 10) {
        $errors[] = "Invalid Username  - must have between 3 and 10 characters";
    }

    if ( empty($email)|| !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $errors[] = "Invalid email";
    } else {

        if($superUser->verify_email_update($email, $id) ){//Email must be unique
            $errors[] = "Email alreadry use by another User";
        }
    }

    if ( isset($admin) ){
        $admin = 1;
    } else {
        if (!isset($admin) && $superUser->isAdmin($id)) {
            $errors[] = "You can't change an admin rights";
        }
    }

    if(empty($errors) ){

        if($superUser->updateAll($id,$username, $email, $admin ) ){
            $message = "User has been updated";
            setFlashMessage($message);
            toUserManager();
        }

    } // fin empty $errors
} // fin !empty $_POST

include_once TOP;

 ?>
<h1>Update</h1>

<?php
    if(!empty($errors)){

        echo implode('<br>', $errors);
    }

 ?>

<div class="row">
   <form class="col s12" action="update_user.php" method="post">

     <div class="row">
         <input type="hidden" class="validate" name="id" value="<?=$id?>">
       <div class="input-field col s6">
         <input id="username" type="text" class="validate" name="username" value="<?=$username?>">
         <label for="username">User Name</label>
       </div>
       <div class="input-field col s6">
         <input id="email" type="text" class="validate" name="email" value="<?=$email?>" >
         <label for="email">Email</label>
       </div>

     </div>


<?php
    if ($superUser->isAdmin($id) ){
        $checked = "checked = 'checked'";
    } else {
        $checked = "";
    }
?>
    <p>
     <input type="checkbox" id="test6" <?=$checked?> name="admin"/>
     <label for="test6">Is Admin</label>
   </p>
     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>


<?php
include_once BOTTOM;

 ?>
