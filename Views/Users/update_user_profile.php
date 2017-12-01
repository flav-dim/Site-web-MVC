<?php
include_once 'include.php';

$username = $email = "";

    $updateUser = $superUser->getUser("id", $_SESSION['user']['id']);

    if($updateUser){// si l'id correspond bien à un user en bdd
        $id = $updateUser['id'];//on affecte les valeurs dans les Value des input...
        $username = $updateUser['username'];//on affecte les valeurs dans les Value des input...
        $email = $updateUser['email'];

    } else {
        toIndex();//sinon on redirige vers User Manager
    }
    $errors = [];

if(!empty($_POST)) {

    sanitizePost();
    extract($_POST);

    if ( empty($username) ){
        $username = $updateUser['username'];

    } elseif ( strlen($username)< 3 || strlen($username)> 10 ) {
        $errors[] = "Invalid Username  - must have between 3 and 10 characters";
    }

    if ( empty($email) ){
        $email = $updateUser['email'];

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $errors[] = "Invalid email";

    } else {

        if($superUser->verify_email_update($email, $id) ){//Email must be unique
            $errors[] = "Email alreadry use by another User";
        }
    }


    if(empty($errors) ){

        if($superUser->updateAll($id,$username, $email, $admin = 0 ) ){
            $message = "User has been updated";
            setFlashMessage($message);
            toProfile($_SESSION['user']['id']);
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
   <form class="col s12" action="update_user_profile.php" method="post">

     <div class="row">
         <input type="hidden" class="validate" name="id" value="<?=$_SESSION['user']['id']?>">

       <div class="input-field col s6">
         <input id="username" type="text" class="validate" name="username" value="<?=$username?>">
         <label for="username">User Name</label>
       </div>

       <div class="input-field col s6">
         <input id="email" type="text" class="validate" name="email" value="<?=$email?>" >
         <label for="email">Email</label>
       </div>

     </div>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>


<?php
include_once BOTTOM;

 ?>
