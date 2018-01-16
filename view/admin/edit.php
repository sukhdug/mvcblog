<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
<head>
    <title><?= $articlesItem['title']; ?></title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1 class="centered">Редактирование статьи</h1>
        <form name="EditArticle"
                method="POST">
            <div class="form-group">
                <label for="inputTitle">Заголовок статьи</label>
                <input type="text" name="inputTitle" class="form-control" id="title" placeholder="Введите заголовок" value="<?= $articlesItem['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="inputAuthor">Автор статьи</label>
                <input type="text" name="inputAuthor" class="form-control" id="author" placeholder="Введите имя автора" value="<?= $articlesItem['author']; ?>" required>
            </div>
            <div class="form-group">
                <label for="inputBody">Содержание статьи</label>
                <textarea name="inputBody" class="form-control" id="body" rows="10" placeholder="Напишите содержание статьи" required><?= $articlesItem['body']; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary" id="submit">Сохранить</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>