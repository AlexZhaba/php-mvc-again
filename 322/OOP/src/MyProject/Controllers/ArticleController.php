<?php
    namespace MyProject\Controllers;
    use MyProject\Models\Articles\Article;
    use MyProject\View\View;
    use MyProject\Services\Db;

    class ArticleController{
        private $view;
        private $db;

        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
            $this->db = new Db();
        }
        public function view(int $articleId){
            $sql = 'SELECT * FROM `articles` WHERE id = :id';
            $article = $this->db->query($sql, [':id' => $articleId], Article::class );
            if ($article === []){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $this->view->renderHtml('articles/view.php', ['article' => $article[0]]);
        }
    }
?>