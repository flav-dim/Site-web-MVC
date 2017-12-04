<div class="card">
    <div class="card-content">

    <?php
    $writerName = "";
    if(empty($writer[0]['username'])){
        $writerName = "Unknown";
    } else {
        $writerName = $writer[0]['username'];
    }
    foreach ($article as $art) {
        echo "<h2>".$art['title']."</h2>";
        echo "<span class='right'>Written by <a href='#'>".$writerName."</a></P>";
        echo "<img src='".RACINE."/Webroot/Img/".$art['photo']."' alt='' title ='".$art['title']."' >";
        echo "<p>".$art['content']."</p>";
        echo "<hr>";
        echo "<span>".$art['creation_date']."</span> ";

        if($tags){
            foreach ($tags as $tag){
                echo " <a href='".RACINE."/Home/Articles/indexTag/".$tag['tag_title']."/'>#".$tag['tag_title']."</a> ";
            }
        }
        echo "<hr>";
     ?>

    </div> <!-- card-content -->

<!-- COMMENT FORM -->

 <div class="card-content">

     <h4>Comments</h4>
     <?php if(Admin::isUserConnected()) : ?>
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
        echo "<div class='row'><p>Login to leave a comment</p></div>";
    endif; ?>
<?php
} ?>

    <!-- COMMENTS AREA -->
        <table class="highlight">
            <?php
            if($comments){

                foreach ($comments as $com) {
                    echo "<tr>";
                    echo "<td>".$com['username']."</td>";
                    echo "<td>".$com['com']."</td>";
                    echo "<td>".$com['creation_date']."</td>";
                    echo "<tr>";
                }
            }
            ?>
        </table>
    </div>
</div><!-- end div card -->
