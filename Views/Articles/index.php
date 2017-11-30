<?php
foreach ($articles as $article) {
    echo "<h2><a href='".RACINE."/Articles/view/".$article['id']."/'>".$article['title']."</a></h2>";
}
 ?>
