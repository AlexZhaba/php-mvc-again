<?php
    namespace MyProject\Models\Articles;
    use MyProject\Models\Users\User;

    class Article{
        private $title;
        private $text;
        private $author;

        public function __construct(string $title, string $text, User $author){
            $this->title = $title;
            $this->text = $text;
            $this->author = $author;

        }
        public function getTitle(){
            return $this->title;
        }
        public function getText(){
            return $this->text;
        }
        public function getAuthor(){
            return $this->author;
        }
    }
?>