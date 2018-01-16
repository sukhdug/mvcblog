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
        <p>Author: <?= $articlesItem['author']; ?> <i class="fa fa-heart"></i> <?= $articlesItem['like_count']; ?></p>
        <p><button class="btn btn-primary">Редактировать</button>
        <button class="btn btn-danger">Удалить</button></p>
        <h1>Комментарии</h1>
        <?php foreach($commentsList as $commentItem){?>
            <div>
                <p><i class="fa fa-pencil-square"></i> <?= $commentItem['author']; ?></p>
                <p><?= $commentItem['body']; ?></p>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>