<?php
Admin::adminSecurity();
 ?>

<h1>Update Category</h1>

<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Categories/verifUpdate/" method="post">
     <div class="row">
         <?php
          foreach ($category as $cat) {
         Form::input_text('cat_title', $cat['cat_title']);
         Form::hidden('id', $cat['id']);
     }
          ?>

     </div>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
