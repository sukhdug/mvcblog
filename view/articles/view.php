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
                    <p><i class="fa fa-pencil-square"></i> <?= $commentItem['author']; ?></p>
                    <p><?= $commentItem['body']; ?></p>
                <?php } ?>
                <h1>Оставьте комментарий</h1>
                <form   name="AddUser"
                        method="POST"
                        action="php/add.php">
                    <div class="form-group">
                        <label for="inputAuthor">Автор</label>
                        <input type="text" name="inputAuthor" class="form-control" id="author" placeholder="Введите имя">
                    </div>
                    <div class="form-group">
                        <label for="inputBody">Комментарий</label>
                        <textarea class="form-control" id="body" rows="5"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>