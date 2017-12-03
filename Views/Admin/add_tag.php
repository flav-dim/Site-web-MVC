<?php
Admin::adminSecurity();
$tag_title = "";
if (isset($_POST)) {
    extract($_POST);
}
 ?>

<h1>Create Tag</h1>

<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Tags/verif/" method="post">
     <div class="row">
         <?php
         Form::input_text('tag_title', $tag_title);
          ?>

     </div>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
