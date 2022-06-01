<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Services\Db;
    use MyProject\Models\Articles\Article;

    class ArticleController{
        private $view;
        private $db;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
            $this->db = new Db();
        }
        public function view(int $articleId){
            $article = $this->db->query('SELECT * FROM `articles` WHERE id = :id;', [':id' => $articleId], Article::class);
            // var_dump($article);
            $this->view->renderHtml('articles/article.php', ['article' => $article[0], 'name' => $author]);
        }
       
    }
?>
