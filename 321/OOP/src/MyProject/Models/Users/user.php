<?php
    namespace MyProject\Models\Users;
    use MyProject\Models\ActiveRecordEntity;

    
    class User extends ActiveRecordEntity{
        private $username;

        public function getName(){
            return $this->username;
        }

        public static function getTableName():string 
        {
            return 'users';
        }
    }
?>