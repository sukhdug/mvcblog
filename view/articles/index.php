<?php require(ROOT . '/view/layout.php'); ?>
<?php require(ROOT . '/view/layouts/navigation.php'); ?>
<html>
    <head>
        <title>Все статьи</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php foreach($articlesList as $articleItem){?>
                    <h1><i class="fa fa-pencil-square"></i>
                        <a href="/articles/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                    <p>Author: <?= $articleItem['author']; ?></p>
                    <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                    <p><a class="btn btn-default" role="button" href="/articles/<?= $articleItem['id'] ?>">Читать дальше <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                    <p><i class="fa fa-heart"></i> <?= $articleItem['like_count']; ?></p>
                <?php } ?>
                <div class="centered">
                    <ul class="pagination">
                        <?= $pagination; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <hr>
            <footer>
                <p>&copy; Ханды-Сурун 2018</p>
            </footer>
        </div>
    </body>
</html>
