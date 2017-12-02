<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Super site</title>
        <!-- Compiled and minified CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="<?=RACINE?>/Webroot/Css/style.css">
         <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Bowlby+One+SC|Bungee+Inline|Graduate|Kelly+Slab|Michroma|Orbitron" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="black">
                <div class="container">
                  <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo">Super Site</a>
                    <a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="<?=RACINE?>/Home">Home</a><li>
                        <?php if(Admin::isUserAdmin()) :?>
                            <li><a href="<?=RACINE?>/Home/Admin/index/">Aministration</a></li>
                            <li><a href="<?=RACINE?>/Home/Admin/categories/">Categories</a><li>
                            <li><a href="<?=RACINE?>/Home/Admin/users/">Users</a><li>
                        <?php endif; ?>
                        <?php if(Admin::isUserWriter()) :?>
                            <li><a href="<?=RACINE?>/Home/Admin/articles/">Articles</a><li>
                        <?php endif; ?>
                        <?php if(!Admin::isUserConnected()): ?>
                        <li><a href="<?=RACINE?>/Home/Users/login/">LogIn</a><li>
                        <li><a href="<?=RACINE?>/Home/Users/newUser/">Inscription</a><li>
                        <?php else : ?>
                        <li><a href="<?=RACINE?>/Home/Users/profil/"><?=ucfirst($_SESSION['user']['username'])?></a><li>
                        <li><a href="<?=RACINE?>/Home/Users/logout/">Logout</a><li>
                        <?php endif; ?>

                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                    <li><a href="<?=RACINE?>/Home">Home</a><li>
                        <?php if(Admin::isUserAdmin()) :?>
                            <li><a href="<?=RACINE?>/Home/Admin/index/">Aministration</a></li>
                            <li><a href="<?=RACINE?>/Home/Admin/categories/">Categories</a><li>
                            <li><a href="<?=RACINE?>/Home/Admin/users/">Users</a><li>
                        <?php endif; ?>
                        <?php if(Admin::isUserWriter()) :?>
                            <li><a href="<?=RACINE?>/Home/Admin/articles/">Articles</a><li>
                        <?php endif; ?>
                        <?php if(!Admin::isUserConnected()): ?>
                        <li><a href="<?=RACINE?>/Home/Users/login/">LogIn</a><li>
                        <li><a href="<?=RACINE?>/Home/Users/newUser/">Inscription</a><li>
                        <?php else : ?>
                        <li><a href="<?=RACINE?>/Home/Users/profil/"><?=ucfirst($_SESSION['user']['username'])?></a><li>
                        <li><a href="<?=RACINE?>/Home/Users/logout/">Logout</a><li>
                        <?php endif; ?>
                    </ul>
                  </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <?=displayFlashMessage();?>
