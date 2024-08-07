<?php

namespace app\models;

abstract class Connection {
    private $dbname = 'mysql:host=localhost;dbname=cursomvc';
    private $user = 'root';
    private $pass = 'root';
    private static $conn;

    protected function connect() {
      try {
        if (self::$conn == null) 
          self::$conn = new \PDO($this->dbname, $this->user, $this->pass);

        self::$conn->exec("set names utf8");
        return self::$conn;

      } catch (\PDOException $erro) {
        echo $erro->getMessage();
      }
    }
}
