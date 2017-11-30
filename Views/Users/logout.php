<?php

    unset($_SESSION['user']);
    remove_cookie("user");
    header('Location: '.RACINE.'/Home');
    die;

?>
