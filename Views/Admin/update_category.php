<?php
include_once 'include.php';
adminSecurity();//pour user non connecté qui ajoute un id dans url Inscription.php

$name = "";
$errors = [];
if (empty($_POST) ){
    $categories = $superCat->getAllCategories();
    $updateCategory = $superCat->getCategory("id", $_GET['id']);

    if($updateCategory){// si l'id correspond bien à un user en bdd
        $id = $updateCategory['id'];//on affecte les valeurs dans les Value des input...
        $name = $updateCategory['name'];//on affecte les valeurs dans les Value des input...
        $parent_id = $updateCategory['parent_id'];//on affecte les valeurs dans les Value des input...

    } else {
        toUserManager();//sinon on redirige vers User Manager
    }
}
else {
    sanitizePost();
    extract($_POST);

    if (!empty($name) ){
        if($superCat->verify_name_update($name, $id)){
            $errors[] = "This category already exists";
        }

        if(strlen($name)< 3 || strlen($name)> 10) {
            $errors[] = "Invalid name  - must have between 3 and 10 characters";
        }

    } else{
        $errors[] = "Invalid name";
    }


    if(empty($errors) ){

        if($superCat->updateAll($id,$name, $parent_id) ){
            $message = "Category has been updated";
            setFlashMessage($message);
            toCategoryManager();
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
    <form class="col s12" action="update_category.php" method="post">
      <div class="row">

          <input type="hidden" class="validate" name="id" value="<?=$id?>">
        <div class="input-field col s12 m6">
          <input id="name" type="text" class="validate" name="name" value="<?=$name?>">
          <label for="name">Name</label>
        </div>

        <div class="input-field col s12 m6">
             <select name="parent_id">
                 <option selected>Choose your option</option>
                 <?php foreach ($categories as $key => $value) :
                     $parent_id == $value['id']? $selected = "selected" :$selected = "";
                     ?>
                     <option value="<?=$value['id']?>" <?=$selected?>><?=$value['name']?></option>
                 <?php endforeach; ?>
             </select>
             <label>Parent Category</label>
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
