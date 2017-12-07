<div class="row">
    <?php if (isset($tags)): ?>

        <?php foreach ($tags as $tag): ?>
            <a href="<?=RACINE?>/Home/Articles/indexTag/<?=$tag['tag_title']?>/" class="btn grey lighten-1">#<?=$tag['tag_title']?></a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="row">


    <div class="row">
        <?php
        if($articles){
            foreach ($articles as $article) {
                echo "
                <div class='card-content col s6 m4'><h5>
                <a href='".RACINE."/Home/Articles/view/".$article['id']."/'>"
                .$article['title'].
                "<img src='".RACINE."/Webroot/Img/".$article['photo']."' alt='".$article['title']."' title ='".$article['title']."' >
                </a>
                </h5>

                </div>";
            }
        } else {
            echo "Sorry, no article found";
        }
        ?>

    </div>
</div>
