<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title>Главная страница</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php foreach($articlesList as $articleItem){?>
                    <h1><i class="fa fa-pencil-square"></i>
                        <a href="/articles/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                    <p><?= $articleItem['body']; ?></p>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
