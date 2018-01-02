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
                <h1>Комментарии</h1>
                <?php foreach($commentsList as $commentItem){?>
                    <p><i class="fa fa-pencil-square"></i> <?= $commentItem['author']; ?></p>
                    <p><?= $commentItem['body']; ?></p>
                <?php } ?>
            </div>
        </div>
    </body>
</html>