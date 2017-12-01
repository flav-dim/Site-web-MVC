<?php
adminSecurity();
 ?>
<h1>Update</h1>
<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Users/verifUpdate/" method="post">
     <div class="row">
         <?php
         foreach ($user as $usr) {

             Form::input_text('username', $usr['username']);
             Form::input_text('email', $usr['email']);
             Form::hidden('id', $usr['id']);
        }
          ?>

     </div>
     <div class="row">
         <select name="user_group" class="col s6 m3">
             <option value="">Choose User Group</option>
             <option value="0">User</option>
             <option value="1">Writer</option>
             <option value="2">Admin</option>
         </select>
     </div>


     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
