<?php require(ROOT . '/view/layout.php'); ?>
<?php require(ROOT . '/view/layouts/navigation.php'); ?>
<html>
    <head>
        <title>Главная страница</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!-- Carousel slider -->
                <div class="col-sm-6 col-md-5 col-lg-6">
                    <div id="carousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-1-.jpg">
                            </div>
                            <div class="item">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-2-.jpg">
                            </div>
                            <div class="item">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-3-.jpg">
                            </div>
                            <div class="item">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-4-.jpg">
                            </div>
                            <div class="item">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-5-.jpg">
                            </div>
                            <div class="item">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-6-.jpg">
                            </div>
                            <div class="item">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-7-.jpg">
                            </div>
                            <div class="item">
                                <img src="template/img/slides/material-design-jpeg-1920x1080-8-.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div id="thumbcarousel" class="carousel slide" data-interval="12000" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-1-.jpg"></div>
                                    <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-2-.jpg"></div>
                                    <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-3-.jpg"></div>
                                    <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-4-.jpg"></div>
                                </div>
                                <div class="item">
                                    <div data-target="#carousel" data-slide-to="4" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-5-.jpg"></div>
                                    <div data-target="#carousel" data-slide-to="5" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-6-.jpg"></div>
                                    <div data-target="#carousel" data-slide-to="6" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-7-.jpg"></div>
                                    <div data-target="#carousel" data-slide-to="7" class="thumb"><img src="template/img/slides/material-design-jpeg-1920x1080-8-.jpg"></div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end of carousel slider -->
                <div class="col-sm-6 col-md-5 col-md-offset-2 col-lg-6 col-lg-offset-0">
                    <div class="jumbotron">
                        <h1 class="centered">О проекте</h1>
                        <p class="centered">Этот блог создается с помощью паттерна MVC с целью изучения данного паттерна.</p>
                        <p class="centered"><a class="btn btn-primary btn-lg" role="button" href="/about">Узнать больше</a></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <?php if ($articlesList) { ?>
                        <?php foreach ($articlesList as $articleItem) { ?>
                            <h1><i class="fa fa-pencil-square"></i>
                                <a href="/articles/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
                            <p>Author: <?= $articleItem['author']; ?></p>
                            <p class="content<?= $articleItem['id']; ?>"><?= $articleItem['short_content']; ?></p>
                            <p><a class="btn btn-default" role="button" href="/articles/<?= $articleItem['id'] ?>">Читать дальше <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                            <p><i class="fa fa-heart"></i> <?= $articleItem['like_count']; ?></p>
                        <?php } ?>
                    <?php } ?>
                    <p><a class="btn btn-primary btn-lg" role="button" href="/articles">Все статьи</a></p>
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
