<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title>admin panel</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1 class="centered">Admin panel</h1>
                <?php foreach($articlesList as $articleItem){?>
                    <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
                        <h1><a href="/admin/article/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                        <p>Author: <?= $articleItem['author']; ?></p>
                        <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                        <p><a href="/admin/article/<?= $articleItem['id'] ?>">Показать полностью</a></p><br>
                        <p><i class="fa fa-heart"></i> <?= $articleItem['like_count']; ?></p>
                    </div>
                <?php } ?>
            </div>
            <p class="centered">
                <ul class="pagination">
                    <?= $pagination; ?>
                </ul>
            </p>
            <a href="/admin/article/add"><button class="btn btn-primary">Добавить статью</button></a>
        </div>
        <div class="container">
            <hr>
            <footer>
                <p>&copy; Ханды-Сурун 2018</p>
            </footer>
        </div>
    </body>
</html>
