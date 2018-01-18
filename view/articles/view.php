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
                <h1><?= $articlesItem['title']; ?></h1>
                <p><?= $articlesItem['body']; ?></p>
                <p>Author: <?= $articlesItem['author']; ?></p>
                <p><i class="fa fa-heart"></i> <?= $articlesItem['like_count']; ?></p>
                <h1>Комментарии</h1>
                <?php foreach($commentsList as $commentItem){?>
                    <div>
                        <p><i class="fa fa-pencil-square"></i> <?= $commentItem['author']; ?></p>
                        <p><?= $commentItem['body']; ?></p>
                    </div>
                <?php } ?>
                <h1>Оставьте комментарий</h1>
                <form   name="AddComment"
                        method="POST">
                    <div class="form-group">
                        <label for="inputAuthor">Автор</label>
                        <input type="text" name="inputAuthor" class="form-control" id="author" placeholder="Введите имя" required>
                    </div>
                    <div class="form-group">
                        <label for="inputBody">Комментарий</label>
                        <textarea name="inputComment" class="form-control" id="body" rows="5" placeholder="Напишите комментарий" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary" id="submit">Отправить</button>
                    </div>
                </form>
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