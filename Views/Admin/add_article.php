<?php
adminSecurity();
 ?>
<h1>Add Article</h1>
<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Articles/verif/" method="post">
     <div class="row">
         <?php
         Form::input_text('title');
          ?>
          <div class="input-field col s12 m6">
               <select name="category_id">
                   <option selected>Choose your option</option>
                   <?php foreach ($categories as $cat) : ?>
                       <option value="<?=$cat['id']?>"><?=ucfirst($cat['cat_title'])?></option>
                   <?php endforeach; ?>
               </select>
               <label for="password_conf">Category</label>
          </div>

     </div>
     <div class="row">
         <?php
         Form::input_textarea('content');
          ?>

     </div>




     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
