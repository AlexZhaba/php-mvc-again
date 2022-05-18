<?php
    class User{
        private $name;
        public function __construct(string $name){
            $this->name = $name;
        }
        public function getName():string
        {
            return $this->name;
        }
    }
    class Article{
        private $title;
        private $text;
        private $author;

        public function __construct(string $title, string $text, User $author){
            $this->title = $title;
            $this->text = $text;
            $this->author = $author;
        }
        public function getAuthor():User
        {
            return $this->author;
        }
    }
    $user = new User('Sasha');
    $article = new Article('Title', 'Text', $user);
    var_dump($article->getAuthor()->getName());
    // var_dump($article);
?>