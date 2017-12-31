<html>
    <head>
        <link href="/template/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/template/css/font-awesome.css" rel="stylesheet" type="text/css" media="screen" />
        <title>Главная страница</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php foreach($articlesList as $articleItem){?>
                    <h1><i class="fa fa-address-book"></i>
                        <a href="/articles/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                    <p><?= $articleItem['body']; ?></p>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
