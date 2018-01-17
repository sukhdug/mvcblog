<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title>Добавить статью</title>
</head>
<body>
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