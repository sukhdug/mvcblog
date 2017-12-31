<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title><?= $articlesItem['title']; ?></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1><?= $articlesItem['title']; ?></h1>
                <p><?= $articlesItem['body']; ?></p>
            </div>
        </div>
    </body>
</html>