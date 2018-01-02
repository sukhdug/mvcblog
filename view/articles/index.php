<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title>Главная страница</title>
        <script src="/template/js/showfullcontent.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php foreach($articlesList as $articleItem){?>
                    <h1><i class="fa fa-pencil-square"></i>
                        <a href="/articles/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                    <p>Author: <?= $articleItem['author']; ?></p>
                    <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                    <span class="showfullcontent" article_id="<?= $articleItem['id']; ?>" id="show<?= $articleItem['id']; ?>">Показать полностью</span><br>
                    <p><i class="fa fa-heart"></i> <?= $articleItem['like_count']; ?></p>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
