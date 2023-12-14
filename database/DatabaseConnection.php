<?php

namespace database;

use PDO;
use PDOException;
use PDOStatement;

class DatabaseConnection {
    public PDO $pdo;

    public function __construct($db, $username = NULL, $password = NULL, $host = '127.0.0.1', $port = 3306, $options = []) {
        $defaultOptions = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $options = array_replace($defaultOptions, $options);
        $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn,$username, $password, $options);
        } catch(PDOException $ex) {
            throw new PDOException($ex->getMessage(), (int)$ex->getCode());
        }
    }

    public function run($sql, $args=null): false|PDOStatement {
        if(!$args) {
            return $this->pdo->query($sql);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}