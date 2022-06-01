<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Models\Articles\Article;
    use MyProject\Models\Users\User;

    class ArticleController{
        private $view;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }
        public function view(int $idArticle){
            $articles = Article::getById($idArticle);
            $reflector = new \ReflectionObject($articles);
            $properties = $reflector->getProperties();
            $propertiesNames = [];
            foreach($properties as $property){
                $propertiesNames[] = $property->getName(); 
            }
            var_dump($propertiesNames);

            if ($articles === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $this->view->renderHtml('articles/view.php', ['articles' => $articles]);
        }

        public function edit(int $articleId): void
        {
            $articles = Article::getById($articleId);
            if ($articles === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $articles->setName('New value');
            $articles->setText('New text');
            $articles->save();            
        }
        public function add(): void
        {
            $author = User::getById(1);
            $article = new Article();
            $article->setName('Новая статья');
            $article->setText('Новый текст');
            $article->setAuthorId($author);
            $article->save();  
            // var_dump($article);          
        }
        public function delete(int $articleId){
            $article =Article::getById($articleId);
            if ($article === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            } 
            $article->delete();
        }
     
    }
?>