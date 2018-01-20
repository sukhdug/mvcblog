<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title><?= $articlesItem['title']; ?></title>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SuKhDug</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">На главную</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['logged'])): ?>
                        <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Привет, <?= $_SESSION['logged']['login']; ?>!</a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout">Выйти</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href="/login">Войти</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1><?= $articlesItem['title']; ?></h1>
            <p><?= $articlesItem['body']; ?></p>
            <p>Author: <?= $articlesItem['author']; ?> <i class="fa fa-heart"></i> <?= $articlesItem['like_count']; ?></p>
            <p><a href="/admin/article/edit/<?= $articlesItem['id'] ?>"><button class="btn btn-primary">Редактировать</button></a>
                <a href="" class="btn btn-danger" role="button">Удалить</a>
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