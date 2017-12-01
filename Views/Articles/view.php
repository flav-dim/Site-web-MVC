<div class="card">

<?php
foreach ($article as $art) {
    echo "<h2>".$art['title']."</h2>";
    echo "<p>".$art['content']."</p>";
    echo "<p>".$art['creation_date']."</p>";

 ?>
</div>

 <div class="row">
     <?php if(isUserConnected()) : ?>
        <form class="col s12" action="<?=RACINE?>/Home/Comments/verif/" method="post">
          <div class="row">
              <?php
              Form::input_text('com');
              Form::hidden('article_id', $art['id']);
              Form::hidden('user_id', $_SESSION['user']['id']);
               ?>
               <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                   <i class="material-icons right">send</i>
               </button>
          </div>
        </form>

    <?php else :
        echo "<p>Login to leave a comment</p>";
    endif; ?>
  </div>
<?php
} ?>
<div class="card">
    <table class="highlight">
        <?php
        foreach ($comments as $com) {
            echo "<tr>";
            echo "<td>".$com['username']."</td>";
            echo "<td>".$com['com']."</td>";
            echo "<td>".$com['creation_date']."</td>";
            echo "<tr>";
        }
        ?>
    </table>
</div>
