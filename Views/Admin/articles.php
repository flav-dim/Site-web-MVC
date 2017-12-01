<?php
writerSecurity();
 ?>
<a href="<?=RACINE.'/Home/Admin/newArticle/'?>" title="Create Article"><button type="button" name="button" class="btn"><i class="material-icons">add</i>New Article</button></a>
<table class="highlight">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($articles as $art) {
            ?>
            <tr>
                <td>
                    <a href="<?=RACINE.'/Home/Articles/view/'.$art['id']?>/" title="See Article">
                        <?=$art['title']?>
                    </a>
                </td>
                <td><?=$art['cat_title']?></td>
                <td><?=$art['creation_date']?></td>
                <td>
                    <a href="<?=RACINE.'/Home/Articles/updateArticle/'.$art['id']?>/" title="Update Article"><i class="material-icons">create</i></a>
                    <a href="<?=RACINE.'/Home/Articles/delete/'.$art['id']?>/" title="Delete Article"><i class="material-icons">delete</i></a>
                </td>
            </tr>

            <?php

        }
        ?>
    </tbody>

</table>