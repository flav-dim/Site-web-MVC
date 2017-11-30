<?php
foreach ($users as $user) {
    echo "<h2><a href='".RACINE."/Users/view/".$user['id']."/'>".$user['username']."</a></h2>";

}
 ?>
