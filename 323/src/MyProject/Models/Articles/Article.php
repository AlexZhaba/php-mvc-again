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
            $camelCaseName = $this->underscoreToCamelCase($name);
            $this->$camelCaseName = $value;
        }

        public function underscoreToCamelCase(string $name): string
        {
            return lcfirst(str_replace('_','',ucwords($name, '_')));
        }

        public function getId(){
            return $this->id;
        }
        public function getText(){
            return $this->text;
        }
        public function getName(){
            return $this->name;
        }



    }
?>