<?php
Admin::adminSecurity();
 ?>
<a href="<?=RACINE.'/Home/Admin/newCategory/'?>" title="Create Category"><button type="button" name="button" class="btn"><i class="material-icons">add</i>New Category</button></a>
<table class="highlight">
    <thead>
        <tr>
            <th>Title</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($categories){
            foreach ($categories as $cat) {
                ?>
                <tr>
                    <td><ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">cloud</i><?=$cat['cat_title']?></div>
                            <div class="collapsible-body">
                                <ul>
                                    <?php if($articles[$cat['cat_title']]){
                                        foreach ($articles[$cat['cat_title']] as $art) {
                                            ?>
                                        <li>
                                            <a href="<?=RACINE.'/Home/Articles/view/'.$art['id']?>/" title="See Article">
                                                <?=$art['title']?>
                                            </a>
                                        </li>
                                        <?php

                                            }
                                        } else {
                                            echo "<p>No articles for now</p>";
                                        }?>
                                </ul>
                            </div>
                        </li>
                    </ul></td>

                    <td>
                        <a href="<?=RACINE.'/Home/Admin/updateCategory/'.$cat['id']?>/" title="Update Category"><i class="material-icons">create</i></a>
                        <a href="<?=RACINE.'/Home/Categories/delete/'.$cat['id']?>/" title="Delete Category"><i class="material-icons">delete</i></a>
                    </td>
                </tr>

                <?php
            }//end foreach...
        } else {
            echo "<p> no Category for now </p>";
        }
        ?>
    </tbody>

</table>
