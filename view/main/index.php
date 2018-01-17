<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title>Главная страница</title>
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
                        <li class="active"><a href="/">Главная</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Статьи <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/articles">Новые</a></li>
                                <li><a href="#">Популярные</a></li>
                            </ul>
                        </li>
                        <li><a href="#contact">О проекте</a></li>
                        <li><a href="#contact">Контакты</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">Войти</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <h1 class="centered">О проекте</h1>
                    <p class="centered">Этот блог создается с помощью паттерна MVC с целью изучения данного паттерна.</p>
                </div>
                <?php foreach($articlesList as $articleItem){?>
                    <h1><i class="fa fa-pencil-square"></i>
                        <a href="/article/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                    <p>Author: <?= $articleItem['author']; ?></p>
                    <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                    <p><a href="/articles/<?= $articleItem['id'] ?>">Показать полностью</a></p><br>
                    <p><i class="fa fa-heart"></i> <?= $articleItem['like_count']; ?></p>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
