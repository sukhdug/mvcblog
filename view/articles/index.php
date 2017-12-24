<?php foreach($articlesList as $articleItem){?>
    <h1><a href="/articles/<?= $articleItem['id'] ?>"><?= $articleItem['title']; ?></a></h1>
    <p><?= $articleItem['body']; ?></p>
<?php } ?>