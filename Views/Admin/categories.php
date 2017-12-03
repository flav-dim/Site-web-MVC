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
                    <td><a href="<?=RACINE?>/Home/Articles/indexCat/<?=$cat['cat_title']?>/">
                        <?=$cat['cat_title']?></a>
                    </td>

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
