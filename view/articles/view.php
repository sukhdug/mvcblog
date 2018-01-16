<?php require_once(ROOT . '/view/layout.php'); ?>
<html>
    <head>
        <title><?= $articlesItem['title']; ?></title>
    </head>
    <body>
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
    </body>
</html>