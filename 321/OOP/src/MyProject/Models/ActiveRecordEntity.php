<?php
    namespace MyProject\Models;
    use MyProject\Services\Db;

    abstract class ActiveRecordEntity{
       
        protected $id;

        public function getId(){
            return $this->id;
        }

        public function __set($name, $value){
            $camelCaseName = self::underScoreToCamelCase($name);
            $this->$camelCaseName = $value;
        }
        public function underScoreToCamelCase(string $name){
            return lcfirst(str_replace('_', '',ucwords($name, '_')));
        }
        public static function findAll(): array
        {
            $db = new Db();
            return $db->query('SELECT * FROM `'.static::getTableName().'`', [], static::class);
        }

        public static function getById(int $id): ?self
        {
            $db = new Db();
            $entities = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE id = :id', [':id' => $id], static::class);
            return $entities ? $entities[0] : null;
        }
        abstract public static function getTableName():string;
    }
?>