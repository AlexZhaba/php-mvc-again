<?php
    namespace MyProject\Services;

    class Db{
        private $connect;

        public function __construct(){
            $dbOptions = (require __DIR__.'/../../settings.php')['db'];
            $this->connect = new \PDO(
                'mysql:host='. $dbOptions['host']. ';dbname='.$dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->connect->exec('SET NAMES UTF8');
        }
        public function query(string $sql, $params = []): ?array
        {
            $stm = $this->connect->prepare($sql);
            $result = $stm->execute($params);
            if ($result === false) return null;
            return $stm->fetchAll();
        }
    }
?>