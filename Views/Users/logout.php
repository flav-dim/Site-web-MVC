<?php

    unset($_SESSION['user']);
    header('Location: '.RACINE.'/Home');
    die;

?>
