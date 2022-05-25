<?php
    require __DIR__.'/../src/MyProject/Models/Users/User.php';
    require __DIR__.'/../src/MyProject/Models/Articles/Article.php';
    $author = new MyProject\Models\Users\User('Sasha');
    $article = new MyProject\Models\Articles\Article('Title', 'Text', $author);
    var_dump($article);
?>