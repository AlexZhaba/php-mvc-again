<?php include __DIR__.'/../header.html';?> 
    <h2><?= $article->getName()?></h2>
    <p><?= $article->getText()?></p>
    <hr>
    <h3>Add comment</h3>
    <?php
        $options = "";
        foreach ($users as $user) {
            $id = $user->getId();
            $username = $user->getName();
            $options .= "<option value='$id'>$username</option>";
        }
    ?>
    <form method="POST" action="/article/<?=$article->getId();?>/comments">
        <select name="user_id">
            <?=$options?>
        </select>
        <textarea name="text" style="display: block" id="comment_text" cols="30" rows="10"></textarea>
        <button type="submit" style="display: block">Оставить комментарий</button>
    </form>
    <h3>Comments</h3>
    <?php
        if ($comments) {
            foreach ($comments as $comment) {
                $text = $comment->getText();
                $date = $comment->getDate();
                $id = $comment->getId();
                $article_id = $article->getId();
                $username = $users_comment[$id]->getName();
                echo "
                    <div id='comment$id'>
                        <span>$date</span>
                        <span>$username</span>
                        <a href='/comments/$id/edit?from=$article_id'>Edit</a>
                        <p>$text</p>
                    </div>
                ";
            }
        } else echo "Empty";
    ?>
<?php include __DIR__.'/../footer.html';?> 

       