<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Services\Db;

    class ArticleController{
        private $view;
        private $db;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
            $this->db = new Db();
        }

        public function view(int $idArticle){
            $result = $this->db->query('SELECT * FROM `articles` WHERE id = :id', [':id' => $idArticle]);
            if ($result === []){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            // var_dump($result);
            $this->view->renderHtml('articles/view.php', ['article' => $result[0]]);
        }
    }
?>