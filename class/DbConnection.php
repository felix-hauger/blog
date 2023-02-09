<?php

class DbConnection extends PDO
{

    public function __construct()
    {
        $db = parse_ini_file(dirname(__DIR__)  .'/config/database.ini');
        $type = $db['type'];
        $name = $db['name'];
        $host = $db['host'];
        $user = $db['user'];
        $password = $db['password'];

        try {
            parent::__construct($type . ':dbname=' . $name . ';host=' . $host . ';charset=utf8mb4', $user, $password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$test = new DbConnection();
var_dump($test);
