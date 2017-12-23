<?php foreach($articlesList as $articleItem){?>
    <h1><?= $articleItem['title']; ?></h1>
    <p><?= $articleItem['body']; ?></p>
<?php } ?>