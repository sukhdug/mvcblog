<?php require(ROOT . '/view/layout.php'); ?>
<?php require(ROOT . '/view/layouts/navigation.php'); ?>
<html>
    <head>
        <title>Регистрация</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Регистрация</h1>
                <p class="text-left text-info" ><?= array_shift($result); ?></p>
                <form name="Login"
                      method="POST">
                    <div class="form-group">
                        <label for="inputName">Ваше имя</label>
                        <input type="text" name="inputName" class="form-control" id="name" placeholder="Введите имя" value="<?= $user['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputSurname">Ваша фамилия</label>
                        <input type="text" name="inputSurname" class="form-control" id="surname" placeholder="Введите фамилию" value="<?= $user['surname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Ваш e-mail</label>
                        <input type="email" name="inputEmail" class="form-control" id="email" placeholder="Введите email" value="<?= $user['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputLogin">Придумайте логин</label>
                        <input type="text" name="inputLogin" class="form-control" id="login" placeholder="Введите логин" value="<?= $user['login']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Придумайте пароль</label>
                        <input type="password" name="inputPassword" class="form-control" id="password" placeholder="Введите пароль">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2">Введите пароль еще раз</label>
                        <input type="password" name="inputPassword2" class="form-control" id="password2" placeholder="Введите пароль еще раз">
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