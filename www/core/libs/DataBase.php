<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\libs;

/**
 * Description of DataBase
 *
 * @author Silentspec
 */
class DataBase
{
    private static $pdo = null;
    
    private function __construct()
    {
    }
    
    public static function getDB()
    {
        if(is_null(self::$pdo))
        {
            if(!file_exists('core/config/dbconf.php'))
            {
                throw new \Exception('Config db not found!');
            }
            $config = require_once 'core/config/dbconf.php';
            $opt  = array(
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => TRUE,
            );
            $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset=utf8';
            self::$pdo = new \PDO($dsn, $config['user'], $config['password'], $opt);
        }
        return self::$pdo;
    }
    
    public static function sendQuery($sql)
    {
        $stmt = self::getDB()->prepare($sql);
        $stmt->execute();
        if(!$stmt)
        {
            throw new \Exception('Database error:');
        }
        return $stmt;
    }
    
    public function getLastInsertId()
    {
        return self::getDB()->lastInsertId();
    }
}