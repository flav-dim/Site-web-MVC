<?php
adminSecurity();
 ?>
<table class="highlight">
    <thead>
        <tr>
            <th>Com</th>
            <th>Article</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($comments as $com) {
            ?>
            <tr>
                <td><?=$com['com']?></td>
                <td><a href="<?=RACINE.'/Home/Articles/view/'.$com['article_id']?>/" title="See Article"><?=$com['title']?></a></td>
                <td><?=$com['creation_date']?></td>
                <!-- <td><//$com['category']?></td> -->

                <td>
                    <a href="<?=RACINE.'/Home/Comments/delete/'.$com['id']?>/" title="Delete Comment"><i class="material-icons">delete</i></a>
                </td>
            </tr>

        <?php
        }
        ?>
    </tbody>

</table>
