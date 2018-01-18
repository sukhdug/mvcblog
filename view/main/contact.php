<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title>Контакты</title>
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
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Статьи <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/articles">Новые</a></li>
                            <li><a href="#">Популярные</a></li>
                        </ul>
                    </li>
                    <li><a href="/about">О проекте</a></li>
                    <li class="active"><a href="#">Контакты</a></li>
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
                <h1 class="centered">Все контакты</h1>
                <p class="centered">
                    <a href="https://github.com/sukhdug"><i class="fa fa-github-square" aria-hidden="true"></i> GitHub</a> |
                    <a href="https://vk.com/sukhdug"><i class="fa fa-vk" aria-hidden="true"></i> Вконтакте</a> | 
                    <a href="https://instagram.com/sukhdug"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                </p>
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
