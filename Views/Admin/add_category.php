<?php
adminSecurity();
 ?>

<h1>Create Category</h1>

<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Categories/verif/" method="post">
     <div class="row">
         <?php
         Form::input_text('cat_title');
          ?>

     </div>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
