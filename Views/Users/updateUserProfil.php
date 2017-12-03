<h1>Update</h1>
<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Users/verifUpdate/" method="post">
     <div class="row">
         <?php
         foreach ($user as $usr) {

             Form::input_text('username', $usr['username']);
             Form::input_text('email', $usr['email']);
             Form::hidden('id', $_SESSION['user']['id']);
             Form::hidden('user_group', $_SESSION['user']['user_group']);
        }
          ?>

     </div>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
