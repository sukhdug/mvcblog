<?php require_once(ROOT . '/view/layout.php'); ?>
<?php require_once(ROOT . '/view/layouts/admin-navigation.php'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/template/css/admin-panel.css" rel="stylesheet" type="text/css" media="screen" />
    <title>Добавить статью</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Добавить статью</h1>
            <p class="text-left text-info" ><?= array_shift($result); ?></p>
            <form name="AddArticle"
                  method="POST"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputTitle">Заголовок статьи</label>
                    <input type="text" name="inputTitle" class="form-control" id="title" placeholder="Введите заголовок" value="<?= $article['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputAuthor">Автор статьи</label>
                    <input type="text" name="inputAuthor" class="form-control" id="author" placeholder="Введите имя автора" value="<?= $article['author']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputBody">Содержание статьи</label>
                    <textarea name="inputBody" class="form-control" id="body" rows="10" placeholder="Напишите содержание статьи"><?= $article['body']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputBody">Изображение статьи</label>
                    <input type="file" name="inputPicture" class="form-control" id="picture" placeholder="Выберите изображение">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Сохранить</button>
                </div>
                <a href="/admin" role="button" class="btn btn-default">На главную страницу</a>
            </form>
        </div>
    </div>
</body>
</html>