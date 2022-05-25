<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Models\Articles\Article;

    class ArticleController{
        private $view;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }
        public function view(int $idArticle){
            $articles = Article::getById($idArticle);
            if ($articles === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $this->view->renderHtml('articles/view.php', ['articles' => $articles]);
        }
     
    }
?>