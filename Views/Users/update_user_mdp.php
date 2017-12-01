<?php
include_once 'include.php';


    $updateUser = $superUser->getUser("id", $_SESSION['user']['id']);

    if($updateUser){// si l'id correspond bien à un user en bdd
        $password = $updateUser['id'];

    } else {
        toIndex();//sinon on redirige vers index
    }
    $errors = [];

if(!empty($_POST)) {
    sanitizePost();
    extract($_POST);

    if(empty($password) ){
        setFlashMessage("No changes");
        toProfile($id);

    } elseif (empty($password_conf) || ($password !== $password_conf ) ){
        $errors[] = "Invalid password or password confirmation";

    } else {

        $password = password_hash($password, PASSWORD_DEFAULT);
        if($superUser->update("password", $password, $id) ){// query to add a user in Class User. If succeed..
                setFlashMessage("Password edited");
                toProfile($id); // .. we redirect to Login page
            }

        }

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
   <form class="col s12" action="update_user_mdp.php" method="post">

       <div class="row">
         <input type="hidden" class="validate" name="id" value="<?=$_SESSION['user']['id']?>">
         <div class="input-field col s12 m6">
           <input id="password" type="password" class="validate" name="password">
           <label for="password">Password</label>
         </div>
         <div class="input-field col s12 m6">
           <input id="password_conf" type="password" class="validate" name="password_conf">
           <label for="password_conf">Password Confirmation</label>
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
