<?php
    namespace MyProject\Controllers;
    use MyProject\Models\Articles\Article;
    use MyProject\Models\Users\User;
    use MyProject\View\View;

    class ArticleController{
        private $view;
        private $db;

        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }
        public function view(int $articleId){
            $article = Article::getById($articleId);
            $reflector = new \ReflectionObject($article);
            $properties = $reflector->getProperties();
            $propertiesName = [];
            foreach($properties as $property){
                $propertiesName[] = $property->getName(); 
            }
            // var_dump($propertiesName);
            if ($article === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $this->view->renderHtml('articles/view.php', ['article' => $article]);
        }

        public function edit(int $articleId): void
        {
            $article = Article::getById($articleId);
            if ($article === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $article->setName('New title');
            $article->setText('New text');
            $article->save();
        }
        public function add(): void{
            $author = User::getById(1);
            $article = new Article();
            $article->setAuthorId($author);
            $article->setName('new title 07');
            $article->setText('new text 07');
            $article->save();
        }
        public function delete(int $articleId):void{
            $article = Article::getById($articleId);
            if ($article === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $article->delete();
        }
    }
?>