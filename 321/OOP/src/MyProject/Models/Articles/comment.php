<?php
    namespace MyProject\Models\Articles;
    use MyProject\Models\Users\User;
    use MyProject\Services\Db;
    use MyProject\Models\ActiveRecordEntity;

    class Comment extends ActiveRecordEntity{
        protected $text;
        protected $user_id;
        protected $article_id;
        protected $date;

        public function getText(){
            return $this->text;
        }

        public function setText(string $text){
            $this->text = $text;
        }

        public function setAuthor(User $author){
            $this->user_id = $author->id;
        }

        public function getAuthor() {
          return $this->user_id;
        }

        public function setArticleId(int $id){
          $this->article_id = $id;
        }

        public function setDate() {
          $this->date = date("Y-m-d H:i:s");
        }

        public function getDate() {
          return $this->date;
        }

        public static function getTableName():string 
        {
            return 'comments';
        }
    }
?>
