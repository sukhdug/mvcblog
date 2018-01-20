<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title>admin panel</title>
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
            <h1 class="centered">Admin panel</h1>
            <?php foreach($articlesList as $articleItem){?>
                <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
                    <h1><a href="/admin/article/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                    <p>Author: <?= $articleItem['author']; ?></p>
                    <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                    <p><a class="btn btn-default" role="button" href="/admin/article/<?= $articleItem['id'] ?>">Читать <i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="/admin/article/edit/<?= $articleItem['id']; ?>" class="btn btn-default" role="button">Изменить <i class="fa fa-pencil" aria-hidden="true"></i></a></p>
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
