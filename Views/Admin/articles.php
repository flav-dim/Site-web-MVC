<a href="<?=RACINE.'/Home/Admin/newArticle/'?>" title="Create Article"><button type="button" name="button" class="btn"><i class="material-icons">add</i>New Article</button></a>
<table class="highlight">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($articles as $art) {
            ?>
            <tr>
                <td><?=$art['title']?></td>
                <td><?=$art['creation_date']?></td>
                <!-- <td><//$art['category']?></td> -->

                <td>
                    <a href="<?=RACINE.'/Home/Admin/update/'.$art['id']?>/" title="Update Article"><i class="material-icons">create</i></a>
                    <!-- <a href="delete.php?table=articles&id="><i class="material-icons">delete</i></a> -->
                </td>
            </tr>

            <?php
            // echo "<a href='".RACINE."/Home/Articles/delete/'>Delete Account</a>";
        }
        ?>
    </tbody>

</table>
