<?php
Admin::writerSecurity();
 ?>
<h1>Update Article</h1>
<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Articles/verifUpdate/" method="post">
     <div class="row">
         <?php
         foreach ($article as $art) {
             Form::input_text('title', $art['title']);
             Form::input_textarea('content', $art['content']);
             Form::hidden('id', $art['id']);

          ?>
          <div class="input-field col s12 m6">
               <select name="category_id">
                   <option selected>Choose your option</option>
                   <?php foreach ($categories as $cat) :
                       $art['category_id'] == $cat['id']? $selected = "selected" :$selected = "";
                      ?>
                       <option value="<?=$cat['id']?>" <?=$selected?>><?=ucfirst($cat['cat_title'])?></option>
                   <?php endforeach; ?>

               </select>
               <label for="category_id">Category</label>
          </div>
      <?php } ?>
     </div>


     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
