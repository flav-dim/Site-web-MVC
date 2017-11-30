<h1>Login</h1>

<div class="row">
   <form class="col s12" action="<?=RACINE?>/Home/Users/login/" method="post">
     <div class="row">
         <?php
         Form::input_text('email');
         Form::input_password('password');
          ?>
     </div>
     <p>
      <input type="checkbox" id="test6" checked="checked" name="remember_me"/>
      <label for="test6">Remember Me</label>
    </p>

     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
         <i class="material-icons right">send</i>
     </button>
   </form>
 </div>
