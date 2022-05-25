<?php
    namespace MyProject\Models\Articles;
    use MyProject\Models\Users\User;
    use MyProject\Models\ActiveRecordEntity;
    
    class Article extends ActiveRecordEntity{
        protected $name;
        protected $text;
        protected $authorId;
        protected $createdAt;

        public function getName(){
            return $this->name;
        }
        public function getText(){
            return $this->text;
        }
        public function getAuthor(): User
        {
            return User::getById($this->authorId);
        }
        public static function getTableName():string
        {
            return 'articles';
        }
    }

?>