<h1>Profil <?php echo $_SESSION['user']['username'] ?> </h1>

<table class="highlight">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Group</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //foreach ($users as $usr) {
            ?>
            <tr>
                <td><?=$_SESSION['user']['username']?></td>
                <td><?=$_SESSION['user']['email']?></td>
                <td>
                    <?php
                    switch ($_SESSION['user']['user_group']) {
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

            </tr>

            <?php
            // echo "<a href='".RACINE."/Home/Users/delete/'>Delete Account</a>";
        //}
        ?>
    </tbody>

</table>

<form class="col s12" action="<?=RACINE?>/Home/Users/updateUserProfil/" method="post">
     <button class="btn waves-effect waves-light" type="submit" name="action">Click to modify your profile
     </button>
</form>

<br>

<form class="col s12" action="<?=RACINE?>/Home/Users/delete/<?=$_SESSION['user']['id']?>/" method="post">
     <button class="btn waves-effect waves-light" type="submit" name="action">Click to delete your account
     </button>
</form>
