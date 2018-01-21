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
            <?php if($result == 0): ?>
                <h1><?= $articlesItem['title']; ?></h1>
                <p><?= $articlesItem['author']; ?></p>
                <p><?= $articlesItem['body']; ?></p>
                <h2 class="text-center text-danger">Вы действительно хотите удалить эту статью?</h2>
                <p class="centered"><a href="/admin/article/<?= $articlesItem['id'] ?>"><button class="btn btn-primary">Вернуться</button></a></p>
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