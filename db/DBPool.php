<?php

namespace db;

use \PDO;

class DBPool {

    /**
     *
     * @var \PDO
     */
    private static $pdo;

    /**
     * 
     * @return \PDO
     */
    public static function getInstance() {

        if (null === self::$pdo) {
            try {
                self::$pdo = new PDO("mysql:dbname=kk44356", "kk44356", "wachie6C", array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ));
            } catch (PDOException $e) {
                var_dump($e);
                die();
            }
        }

        return self::$pdo;
    }

}
