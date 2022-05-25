<?php
    namespace MyProject\Models;
    use MyProject\Services\Db;

    abstract class ActiveRecordEntity{
        protected $id;

        public function getId(){
            return $this->id;
        }

        public function __set($name, $value){
            $nameToCamelCase = $this->underscoreToCamelCase($name);
            $this->$nameToCamelCase = $value;
        }

        private function underscoreToCamelCase(string $source){
            return lcfirst(str_replace('_', '', (ucwords($source, '_'))));
        }
        public static function findAll(): array
        {
            $db = new Db();
            return $db->query('SELECT * FROM `'.static::getTableName().'`', [], static::class);
        }

        public static function getById(int $id): ?self{
            $db = new Db();
            $entit = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE id = :id', [':id'=> $id], static::class);
            return $entit ? $entit[0] : null;
        }

        abstract protected static function getTableName():string;
    }
?>