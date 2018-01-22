<?php require_once(ROOT . '/view/layout.php'); ?>
<?php require_once(ROOT . '/view/layouts/admin-navigation.php'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/template/css/admin-panel.css" rel="stylesheet" type="text/css" media="screen" />
    <title><?= $articlesItem['title']; ?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1><?= $articlesItem['title']; ?></h1>
            <p><?= $articlesItem['body']; ?></p>
            <p>Author: <?= $articlesItem['author']; ?> <i class="fa fa-heart"></i> <?= $articlesItem['like_count']; ?></p>
            <p><a href="/admin/article/edit/<?= $articlesItem['id'] ?>"><button class="btn btn-primary">Редактировать</button></a>
                <a href="/admin/article/delete/<?= $articlesItem['id'] ?>" class="btn btn-danger" role="button">Удалить</a>
                <a href="/admin" class="btn btn-default" role="button">К списку</a></p>
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