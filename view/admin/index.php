<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title>admin panel</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1 class="centered">Admin panel</h1>
                <div class="col-xs-10 col-md-4 col-sm-6">
                    <?php foreach($articlesList as $articleItem){?>
                        <h1><a href="/admin/article/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                        <p>Author: <?= $articleItem['author']; ?></p>
                        <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                        <p><a href="/admin/article/<?= $articleItem['id'] ?>">Показать полностью</a></p><br>
                        <p><i class="fa fa-heart"></i> <?= $articleItem['like_count']; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>
