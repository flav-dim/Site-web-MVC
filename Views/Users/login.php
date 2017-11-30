<h1>Login</h1>

<?php displayFlashMessage(); print_r($_POST); ?>

<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Users/login/" method="post">
     <div class="row">

       <div class="input-field col s12 m6">
         <input id="email" type="text" class="validate" name="email" >
         <label for="email">Email</label>
       </div>
       <div class="input-field col s12 m6">
           <input id="password" type="password" class="validate" name="password">
           <label for="password">Password</label>
       </div>

     </div>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
