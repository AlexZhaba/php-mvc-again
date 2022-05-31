<?php
    namespace MyProject\Models\Articles;
    use MyProject\Models\Users\User;
    use MyProject\Services\Db;
    use MyProject\Models\ActiveRecordEntity;


    class Article extends ActiveRecordEntity{
        private $name;
        private $text;
        protected $authorId;
        protected $createdAt;

        public function getName(){
            return $this->name;
        }
        public function getText(){
            return $this->text;
        }

        public static function getTableName():string 
        {
            return 'articles';
        }
    }
?>
