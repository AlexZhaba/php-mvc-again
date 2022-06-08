<?php
    namespace MyProject\Models\Users;
    use MyProject\Models\ActiveRecordEntity;


    class User extends ActiveRecordEntity{
        protected $nickname;
        protected $email;
        protected $isConfirmed;
        protected $role;
        protected $passwordHash;
        protected $createdAt;
        protected $authToken;

        public function getNickname(){
            return $this->nickname;
        }
        public static function getTableName():string{
            return 'users';
        }
    }
?>