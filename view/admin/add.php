<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title>Добавить статью</title>
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
            <h1 class="centered">Добавить статью</h1>
            <form name="AddArticle"
                  method="POST">
                <div class="form-group">
                    <label for="inputTitle">Заголовок статьи</label>
                    <input type="text" name="inputTitle" class="form-control" id="title" placeholder="Введите заголовок" required>
                </div>
                <div class="form-group">
                    <label for="inputAuthor">Автор статьи</label>
                    <input type="text" name="inputAuthor" class="form-control" id="author" placeholder="Введите имя автора" required>
                </div>
                <div class="form-group">
                    <label for="inputBody">Содержание статьи</label>
                    <textarea name="inputBody" class="form-control" id="body" rows="10" placeholder="Напишите содержание статьи" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>