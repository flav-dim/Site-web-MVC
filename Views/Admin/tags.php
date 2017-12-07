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
                    <td><ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">cloud</i><?=$tag['tag_title']?></div>
                            <div class="collapsible-body">
                                <ul>
                                    <?php if($articles[$tag['tag_title']]){
                                        foreach ($articles[$tag['tag_title']] as $art) {
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
