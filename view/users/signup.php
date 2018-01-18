<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title>Регистрация</title>
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
            <h1>Регистрация</h1>
            <form name="Login"
                  method="POST">
                <div class="form-group">
                    <label for="inputName">Ваше имя</label>
                    <input type="text" name="inputName" class="form-control" id="name" placeholder="Введите имя" required>
                </div>
                <div class="form-group">
                    <label for="inputSurname">Ваша фамилия</label>
                    <input type="text" name="inputSurname" class="form-control" id="surname" placeholder="Введите фамилию" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Ваш e-mail</label>
                    <input type="email" name="inputEmail" class="form-control" id="email" placeholder="Введите email" required>
                </div>
                <div class="form-group">
                    <label for="inputLogin">Придумайте логин</label>
                    <input type="text" name="inputLogin" class="form-control" id="login" placeholder="Введите логин" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Придумайте пароль</label>
                    <input type="password" name="inputPassword" class="form-control" id="password" placeholder="Введите пароль" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword2">Введите пароль еще раз</label>
                    <input type="password" name="inputPassword2" class="form-control" id="password2" placeholder="Введите пароль еще раз" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Регистрация</button>
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