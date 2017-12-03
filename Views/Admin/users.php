<?php
Admin::adminSecurity();
 ?>
<a href="<?=RACINE.'/Home/Admin/newUser/'?>" title="Create User"><button type="button" name="button" class="btn"><i class="material-icons">add</i>New User</button></a>
<table class="highlight">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Last Modif</th>
            <th>Group</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($users){
            foreach ($users as $usr) {
                ?>
                <tr>
                    <td><?=$usr['username']?></td>
                    <td><?=$usr['email']?></td>
                    <td><?=$usr['modif_date']?></td>
                    <td>
                        <?php
                        switch ($usr['user_group']) {
                            case 1:
                                echo "Writer";
                                break;
                            case 2:
                                echo "Admin";
                                break;
                            default:
                                echo "User";
                                break;
                        }
                        ?>
                    </td>
                    <td><?php if($usr['status'] == true): ?>
                        <a href="<?=RACINE.'/Home/Admin/desactivate/'.$usr['id']?>/" title="Reactivate User"><i class="material-icons">check</i></a>
                    <?php else : ?>
                        <a href="<?=RACINE.'/Home/Admin/desactivate/'.$usr['id']?>/" title="Desactivate User"><i class="material-icons">block</i></a>
                    <?php endif; ?>
                        <a href="<?=RACINE.'/Home/Users/updateUser/'.$usr['id']?>/" title="Update User"><i class="material-icons">create</i></a>

                        <a href="<?=RACINE.'/Home/Users/delete/'.$usr['id']?>/" title="Delete User"><i class="material-icons">delete</i></a>
                    </td>
                </tr>

                <?php
                // echo "<a href='".RACINE."/Home/Users/delete/'>Delete Account</a>";
            }
        } else {
            echo "<p> No user for the moment</p>";
        }

        ?>
    </tbody>

</table>
