<?php include __DIR__.'/../header.html';?> 
    <h1>Change comment</h1>
        <form action="/comments/<?=$comment->getId();?>/update?to=<?=$_GET["from"]?>" method="POST">
        <textarea name="text" id="" cols="30" rows="10"><?=$comment->getText();?></textarea>
        <button type="submit" style="display: block">Обновить</button>
    </form>
<?php include __DIR__.'/../footer.html';?> 
