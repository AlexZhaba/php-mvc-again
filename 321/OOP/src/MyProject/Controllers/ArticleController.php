<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Models\Articles\Article;


    class ArticleController{
        private $view;
        private $db;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }

        public function view(int $idArticle){
            $result = Article::getById($idArticle);
            if ($result === []){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            // var_dump($result);
            $this->view->renderHtml('articles/view.php', ['article' => $result]);
        }
    }
?>