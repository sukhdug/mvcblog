<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title>Все статьи</title>
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
                        <li><a href="/">Главная</a></li>
                        <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Статьи <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/articles">Новые</a></li>
                                <li><a href="#">Популярные</a></li>
                            </ul>
                        </li>
                        <li><a href="/about">О проекте</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (isset($_SESSION['logged'])): ?>
                            <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Привет, <?= $_SESSION['logged']['login']; ?>!</a>
                                <ul class="dropdown-menu">
                                    <?php if ($_SESSION['logged']['admin']): ?>
                                        <li><a href="/admin">Администрирование</a></li>
                                    <?php endif; ?>
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
