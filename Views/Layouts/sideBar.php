<?php include_once '../Views/Layouts/top.php' ?>
<div class="row">
    <div class="col s12 m3">
        <input type="search" name="searchBar" value="" placeholder="Search">
        <p>Order by title
            <a href="<?=RACINE?>/Home/Articles/index/title_asc/" class="sort sortTitle"> <i class="small material-icons">arrow_drop_up</i></a>
            <a href="<?=RACINE?>/Home/Articles/index/title_desc/" class="sort sortTitle"> <i class="small material-icons">arrow_drop_down</i></a>
        </p>
        <p>Order by date
            <a href="<?=RACINE?>/Home/Articles/index/date_asc/" class="sort sortDate"><i class="small material-icons">arrow_drop_up</i></a>
            <a href="<?=RACINE?>/Home/Articles/index/date_desc/" class="sort sortDate"><i class="small material-icons">arrow_drop_down</i></a>
        </p>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">list</i>Categories</div>
                <div class="collapsible-body">
                <ul>

                    <li><h5><a href="#" class="showAll">All</a></h5></li>
                    <?php foreach ($categories as $cat): ?>
                        <li><h5>
                            <a href="#" class="search_cat" idcat ="<?=$cat['id']?>"><?=$cat['cat_title']?></a>
                        </h5></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            </li>
        </ul>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">create</i>Author</div>
                <div class="collapsible-body">
                <ul>
                    <li><h5><a href="#" class="showAll">All</a></h5></li>
                    <?php foreach ($authors as $author): ?>
                        <li><h5>
                            <a href="#" class="author" idauthor ="<?=$author['id']?>"><?=$author['username']?></a>
                        </h5></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            </li>
        </ul>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">cloud</i>Popular Tags</div>
                <div class="collapsible-body">
                <ul>
                    <li><h5><a href="#" class="showAll">All</a></h5></li>
                    <?php foreach ($popularTags as $tag): ?>
                        <li><h5>
                            <a href="<?=RACINE?>/Home/Articles/indexTag/<?=$tag['tag_title']?>/"><?=$tag['tag_title']?></a>
                        </h5></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            </li>
        </ul>
    </div>
    <div class="col s12 m9">
        <?php echo $content_for_layout ?>
    </div>
</div>
<?php include_once '../Views/Layouts/bottom.php' ?>
