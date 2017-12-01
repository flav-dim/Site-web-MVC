<h1>Inscription</h1>
<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Users/verif/" method="post">
     <div class="row">
         <?php
         Form::input_text('username');
         Form::input_text('email');
          ?>

     </div>
     <div class="row">
         <?php
         Form::input_password('password');
         Form::input_password('password_conf');
         Form::hidden('id');
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
