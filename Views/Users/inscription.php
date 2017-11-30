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
          ?>

     </div>


     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
