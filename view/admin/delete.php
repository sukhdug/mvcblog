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
            <?php if($result == 0): ?>
                <h1><?= $articlesItem['title']; ?></h1>
                <p><?= $articlesItem['author']; ?></p>
                <p><?= $articlesItem['body']; ?></p>
                <h2 class="text-center text-danger">Вы действительно хотите удалить эту статью?</h2>
                <p class="centered"><a href="/admin/articles/<?= $articlesItem['id'] ?>"><button class="btn btn-primary">Вернуться</button></a></p>
                <form method="POST" class="centered">
                        <button class="btn btn-danger" type="submit" name="submit">Да, удалить</button>
                </form>
            <?php else: ?>
                <h2 class="text-center text-success">Статья успешно удалена!</h2>
                  <a class="centered btn btn-default" role="button" href="/admin">Вернуться к списку</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>