<?php
if(isset($_COOKIE['user'] ) ){
    $_SESSION['user'] = unserialize($_COOKIE['user']);
}
 ?>
<h1>Welcome</h1>
<h5>This is the home page..</h5>
<div class='row'>
<?php
if($articles){
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

} else {
    echo "<p>No articles for the moment..</p>";
}
 ?>
</div>
