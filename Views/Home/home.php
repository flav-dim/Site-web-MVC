<?php
if(isset($_COOKIE['user'] ) ){
    $_SESSION['user'] = unserialize($_COOKIE['user']);
}
 ?>
<h3 class="change_title">Welcome</h3>
<div class='row'>
<?php
if($articles){
    foreach ($articles as $article) {
        echo "
        <div
        class='card col s12 block_article category".$article['category_id']."'
        title='".strtolower($article['title'])."'
        author_id='".$article['author_id']."'>
        <p>
        <a href='".RACINE."/Home/Articles/view/".$article['id']."/' class='artice_title'><h4>"
        .$article['title'].
        "<h4><img src='".RACINE."/Webroot/Img/".$article['photo']."' alt='".$article['title']."' title ='".$article['title']."' >
        </a>
        </p>
        </div>";
    }

} else {
    echo "<p>No articles for the moment..</p>";
}
 ?>
</div>
