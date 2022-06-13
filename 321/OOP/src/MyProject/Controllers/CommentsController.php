<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Models\Articles\Article;
    use MyProject\Models\Articles\Comment;
    use MyProject\Models\Users\User;

    class CommentsController {
      private $view;
      private $db;

      public function __construct(){
          $this->view = new View(__DIR__.'/../../../templates');
      }

      public function view(int $commentId){
        $comment = Comment::getById($commentId);
        if ($comment === []){
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        // var_dump($result);
        $this->view->renderHtml('comments/view.php', ['comment' => $comment]);
      }

      public function edit($data, $commentId): void{
        $result = Comment::getById($commentId);
        if ($result === []){
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $result->setText($data["text"]);
        $result->save();
        header("Location: /article/".$_GET["to"]."#comment".$result->getId());
    }

      public function add($data, $article_id) {
        var_dump($_POST);
        var_dump($article_id);
        $author = User::getById($data["user_id"]);
        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setArticleId($article_id);
        $comment->setText($data["text"]);
        $comment->setDate();
        var_dump($comment);
        $comment->save();
        header("Location: /article/".$article_id);
    }
    }
?>