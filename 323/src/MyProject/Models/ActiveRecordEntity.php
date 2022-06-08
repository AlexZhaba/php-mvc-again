<?php
namespace MyProject\Models;
use MyProject\Services\Db;

abstract class ActiveRecordEntity{
    protected $id;
    
    public function __set($name, $value){
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }
    private function underscoreToCamelCase(string $name): string
    {
        return lcfirst(str_replace('_','',ucwords($name, '_')));
    }

    private function camelCaseToUnderScore(string $name){
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
    }

    public function getId(){
        return $this->id;
    }
    public static function findAll(): array{
        $db = Db::getInstance();
        return  $db->query('SELECT * FROM `'.static::getTableName().'`', [], static::class);
    }
    public static function getById(int $articleId): ?self{
        $db = Db::getInstance();
        $entityObject = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE id = :id;', [':id' => $articleId], static::class);
        return $entityObject ? $entityObject[0] : null;
    }
    private function propertiesToDbFormat():array{
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $propertyNames = [];
        foreach($properties as $property){
            $propertyName = $property->getName();
            $propertyDB = $this->camelCaseToUnderScore($propertyName);
            $propertyNames[$propertyDB] = $this->$propertyName;
        }
        return $propertyNames;
    }
    public function save():void{
        $mappedProperties = $this->propertiesToDbFormat();
        if ($this->id !== null) $this->update($mappedProperties);
        else $this->insert($mappedProperties);
    }
    public function update(array $properties){
        // var_dump($properties);
        $column2params = [];
        $param2value = [];
        $index = 1;
        foreach ($properties as $column => $value){
            $param = ':param'.$index;
            $column2params [] = $column.' = '.$param;
            $param2value[$param] = $value;
            $index++;
        }
        $sql = 'UPDATE `'.static::getTableName().'` SET '.implode(', ', $column2params).' WHERE id = '.$this->id;
        $db = Db::getInstance();
        $db->query($sql, $param2value, static::class);
    }
    public function insert(array $properties){
        $filterProperties = array_filter($properties);
        $columnArray = [];
        $paramArray = [];
        $param2value = [];
        foreach ($filterProperties as $column => $value){
            $columnArray[] = '`'.$column.'`';
            $param = ':'.$column;
            $paramArray[] = $param;
            $param2value[$param] = $value;
        }
        $sql = 'INSERT INTO '.static::getTableName().' ('.implode(', ', $columnArray).') VALUES ('.implode(', ', $paramArray).')';
        var_dump($sql);
        $db = Db::getInstance();
        $db->query($sql, $param2value, static::class);
    }

    public function delete(){
        $db = Db::getInstance();
        $db->query('DELETE FROM '.static::getTableName().' WHERE id = :id', [':id' => $this->id], static::class);
        $this->id = null;
    }
    abstract protected static function getTableName():string;
}
?>