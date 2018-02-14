<?php require(ROOT . '/view/layout.php'); ?>
<?php require(ROOT . '/view/layouts/navigation.php'); ?>
<html>
<head>
    <title>О проекте</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Войти</h1>
            <p class="text-left text-info" ><?= array_shift($result); ?></p>
            <form name="Login"
                    method="POST">
                <div class="form-group">
                    <label for="inputLogin">Логин</label>
                    <input type="text" name="inputLogin" class="form-control" id="login" placeholder="Введите логин" value="<?= $user['login']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Пароль</label>
                    <input type="password" name="inputPassword" class="form-control" id="password" placeholder="Введите пароль">
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