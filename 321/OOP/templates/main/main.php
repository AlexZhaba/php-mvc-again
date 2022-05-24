<?php include __DIR__.'/../header.html';?> 
    <?php foreach($articles as $article):?>
    <h2><a href="/student/321/OOP/www/article/<?=$article['id'];?>"><?= $article['name']?></a></h2>
    <p><?= $article['text']?></p>
    <hr>
    <?php endforeach;?>
<?php include __DIR__.'/../footer.html';?> 

       