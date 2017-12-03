<?php
Admin::adminSecurity();
 ?>
<a href="<?=RACINE.'/Home/Admin/newTag/'?>" title="Create Tag"><button type="button" name="button" class="btn"><i class="material-icons">add</i>New Tag</button></a>
<table class="highlight">
    <thead>
        <tr>
            <th>Title</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($tags){
            foreach ($tags as $tag) {
                ?>
                <tr>
                    <td><?=$tag['tag_title']?></td>

                    <td>
                        <a href="<?=RACINE.'/Home/Tags/delete/'.$tag['id']?>/" title="Delete Tag"><i class="material-icons">delete</i></a>
                    </td>
                </tr>

                <?php
            }
        } else {
            echo "<p> No tag for the moment</p>";
        }
        ?>
    </tbody>

</table>
