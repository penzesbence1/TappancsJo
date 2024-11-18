<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MVC - PHP</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
    </head>
    <body>
        <header>
        <?php if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] != '_1_'): ?>
            <div id="user"><em>Bejelentkezett: <?= $_SESSION['userlastname']." ".$_SESSION['userfirstname']. " ( " .$_SESSION['username']. " ) " ?></em></div>
            <?php endif; ?>
             <h1 class="header">Tappancs</h1>
        </header>
        
        <aside>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        </aside>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&copy; WEB2 Beadandó <?= date("Y") ?></footer>
        <footer>Stecenkó Martin, Pénzes Bence</footer>
    </body>
</html>
