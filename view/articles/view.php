<?php require(ROOT . '/view/layout.php'); ?>
<?php require(ROOT . '/view/layouts/navigation.php'); ?>
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
                        <hr>
                    </div>
                <?php } ?>
                <h1>Оставьте комментарий</h1>
                <p class="text-left text-info" ><?= array_shift($result); ?></p>
                <form   name="AddComment"
                        method="POST">
                    <div class="form-group">
                        <label for="inputAuthor">Автор</label>
                        <input type="text" name="inputAuthor" class="form-control" id="author" placeholder="Введите имя" value="<?= $comment['author']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputBody">Комментарий</label>
                        <textarea name="inputComment" class="form-control" id="body" rows="5" placeholder="Напишите комментарий"><?= $comment['comment']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary" id="submit">Отправить</button>
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