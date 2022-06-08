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
        public function view(int $articleId){
            $article = Article::getById($articleId);
            $this->view->renderHtml('articles/article.php', ['article' => $article]);
        }
        public function edit(int $articleId):void{
            $article = Article::getById($articleId);
            if ($article === null) {
                echo 'нет такой статьи';
                return;
            }
            $article->setName('new article');
            $article->setText('new text one');
            $article->save();
            
        }
        public function add():void{
            $author = User::getById(1);
            $article = new Article();
            $article->setName('create article');
            $article->setText('create text');
            $article->setAuthor($author);
            $article->save();
            
        }
       public function delete(int $articleId){
           $article = Article::getById($articleId);
           if ($article === null) {
            echo 'нет такой статьи';
            return;
        }
        $article->delete();
       }
    }
?>
