<h1>Welcome</h1>
<h5>This is the home page..</h5>
<?php
foreach ($articles as $article) {
    echo "
    <div class='row'>
        <div class='card'>
            <p>
            <a href='".RACINE."/Home/Articles/view/".$article['id']."/'>"
            .$article['title'].
            "</a>
            </p>
        </div>
    </div>";
}
 ?>

<!-- <img src='".RACINE."/Webroot/".$article['photo']."' alt='food image' title ='".$article['title']."' > -->
