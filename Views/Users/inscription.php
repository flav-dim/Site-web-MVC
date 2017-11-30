<h1>Inscription</h1>
<?php displayFlashMessage(); ?>
<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Users/verif/" method="post">
     <div class="row">
       <div class="input-field col s12 m6">
         <input id="username" type="text" class="validate" name="username">
         <label for="username">User Name</label>
       </div>
       <div class="input-field col s12 m6">
         <input id="email" type="text" class="validate" name="email" >
         <label for="email">Email</label>
       </div>

     </div>

     <div class="row">
       <div class="input-field col s12 m6">
         <input id="password" type="password" class="validate" name="password">
         <label for="password">Password</label>
       </div>
       <div class="input-field col s12 m6">
         <input id="password_conf" type="password" class="validate" name="password_conf">
         <label for="password_conf">Password Confirmation</label>
       </div>
     </div>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
