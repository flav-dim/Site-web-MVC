<h1>Welcome</h1>
<h5>This is the home page..</h5>
<div class='row'>
<?php
foreach ($articles as $article) {
    echo "
        <div class='card col s6'>
            <p>
            <a href='".RACINE."/Home/Articles/view/".$article['id']."/'>"
            .$article['title'].
            "<img src='".RACINE."/Webroot/Img/".$article['photo']."' alt='' title ='".$article['title']."' >
            </a>
            </p>
        </div>";
}
 ?>
</div>
