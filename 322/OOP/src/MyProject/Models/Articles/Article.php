<?php
    namespace MyProject\Models\Articles;
    use MyProject\Models\Users\User;

    class Article{
        private $id;
        private $name;
        private $text;
        private $authorId;
        private $createdAt;

        public function __set($name, $value){
            $camelCase = $this->underscoreToCamelCase($name);
            $this->$camelCase = $value;
        }
        private function underscoreToCamelCase(string $source):string
        {
            return lcfirst(str_replace('_', '',ucwords($source, '_')));
        }
        public function getId(){
            return $this->id;
        }
        public function getText(){
            return $this->text;
        }public function getName(){
            return $this->name;
        }
    }
?>