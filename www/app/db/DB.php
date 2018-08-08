<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 04.07.18
 * Time: 11:57
 */
namespace sae\app\db;


use sae\app\interfaces\DBInterface;

class DB implements DBInterface
{

    /**
     * @var \PDO $db
     */
    private static $db;
    public static $connectionError;
    public static $pdoError;

    /**
     * Connect to Database
     */
    private static function connect(){
        try{
            self::$db = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            self::$connectionError = $e->getMessage();
        }
    }

    /**
     * Save, update, delete Data from Database
     * @param string $SQL
     * @param array $execArr
     * @return bool
     */
    public static function set(string $SQL, array $execArr): bool
    {
        self::connect();
        $stmt = self::$db->prepare($SQL);
        try{
            return $stmt->execute($execArr);
        }catch (\PDOException $e){
            self::$pdoError = $e->getMessage();
        }
    }

    /**
     * Fetch data from Database with array return
     * @param string $SQL
     * @param array $execArr
     * @return array
     */
    public static function fetch(string $SQL, array $execArr = []): array
    {
        self::connect();
        $stmt = self::$db->prepare($SQL);
        try{
            $stmt->execute($execArr);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch (\PDOException $e){
            echo $e->getMessage();
            self::$pdoError = $e->getMessage();
        }
    }

    /**
     * Fetch data from Database with DTO objects
     * @param string $SQL
     * @param array $execArr
     * @param string $FQCN
     * @return array
     */
    public static function fetchClass(string $SQL, array $execArr = [], string $FQCN): array
    {
        self::connect();
        $stmt = self::$db->prepare($SQL);
        try{
            $stmt->execute($execArr);
            return $stmt->fetchAll(\PDO::FETCH_CLASS, $FQCN);
        }catch (\PDOException $e){
            self::$pdoError = $e->getMessage();
        }
    }


}