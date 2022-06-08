<?php include __DIR__.'/../header.html';?>
    <h2><?= $article->getName();?></h2>
    <p><?= $article->getText();?></p>
    <p><?= $article->getAuthor()->getNickname();?></p>
<?php include __DIR__.'/../footer.html';?>

