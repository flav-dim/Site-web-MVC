<?php include_once '../Views/Layouts/top.php' ?>
<h1>Side Bar</h1>
<div class="row">
    <div class="col s12 m3">
        <input type="search" name="searchBar" value="" placeholder="Search">
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
    </div>
    <div class="col s12 m9">
        <?php echo $content_for_layout ?>
    </div>
</div>
<?php include_once '../Views/Layouts/bottom.php' ?>
