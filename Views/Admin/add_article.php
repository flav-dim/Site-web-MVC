<?php
Admin::writerSecurity();
$title = $content = "";
if (isset($_POST)) {
    extract($_POST);
}
 ?>
<h1>Add Article</h1>
<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Articles/verif/" method="post" enctype="multipart/form-data">
     <div class="row">
         <?php
         Form::input_text('title', $title);
          ?>
          <div class="input-field col s12 m6">
               <select name="category_id">
                   <option selected>Choose your option</option>
                   <?php foreach ($categories as $cat) : ?>
                       <option value="<?=$cat['id']?>"><?=ucfirst($cat['cat_title'])?></option>
                   <?php endforeach; ?>
               </select>
               <label for="category_id">Category</label>
          </div>

     </div>
     <div class="row">
         <?php
         Form::input_textarea('content', $content);
          ?>

     </div>
     <div class="file-field input-field s6 m6">
         <div class="btn">
             <span>Photo</span>
             <input type="file" name="photo">
         </div>
         <div class="file-path-wrapper">
             <div class="imgContainer">
                 <img src="" alt="" class="default">
             </div>
             <input class="file-path validate" type="text">
         </div>
     </div>




     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
