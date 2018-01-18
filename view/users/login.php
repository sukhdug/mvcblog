<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title>О проекте</title>
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
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/login">Войти</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1>Войти</h1>
            <p class="text-left text-danger" ><?= array_shift($result); ?></p>
            <form name="Login"
                    method="POST">
                <div class="form-group">
                    <label for="inputLogin">Логин</label>
                    <input type="text" name="inputLogin" class="form-control" id="login" placeholder="Введите логин" value="<?= $user['login']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Пароль</label>
                    <input type="password" name="inputPassword" class="form-control" id="password" placeholder="Введите пароль" value="<?= $user['password']; ?>" required>
                </div>
                <p><a href="#">Забыли пароль?</a> | <a href="/signup">Зарегистрироваться</a></p>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Войти</button>
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