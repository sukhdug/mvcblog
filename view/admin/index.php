<?php require_once(ROOT . '/view/layout.php'); ?>
<?php require_once(ROOT . '/view/layouts/admin-navigation.php'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/template/css/admin-panel.css" rel="stylesheet" type="text/css" media="screen" />
    <title>admin panel</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="page-header">
                <h1>Admin panel</h1>
            </div>
            <?php foreach($articlesList as $articleItem){?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1><a href="/admin/articles/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                    <p>Author: <?= $articleItem['author']; ?></p>
                    <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                    <p><a class="btn btn-default" role="button" href="/admin/articles/<?= $articleItem['id'] ?>">Читать <i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="/admin/articles/edit/<?= $articleItem['id']; ?>" class="btn btn-default" role="button">Изменить <i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    <p><i class="fa fa-heart"></i> <?= $articleItem['like_count']; ?></p>
                    <hr>
                </div>
            <?php } ?>
        </div>
        <p class="centered">
            <ul class="pagination">
                <?= $pagination; ?>
            </ul>
         </p>
        <a href="/admin/articles/add"><button class="btn btn-primary">Добавить статью</button></a>
    </div>
    <div class="container">
        <hr>
        <footer>
            <p>&copy; Ханды-Сурун 2018</p>
        </footer>
    </div>
</body>
</html>
