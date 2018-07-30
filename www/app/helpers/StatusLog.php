<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 07.06.18
 * Time: 10:49
 */

namespace sae\app\helpers;

class StatusLog
{
    /**
     * @var array $message
     */
    private static $messageArr = [];

    /**
     * @param $key
     * @param string $message
     */
    public static function write($key, string $message) : void
    {
        self::$messageArr[$key] = $message;
    }

    /**
     * @param String $group
     * @param $key
     * @param String $message
     */
    public static function group(String $name, $key, String $message) : void
    {
        self::$messageArr[$name][$key] = $message;
    }


    /**
     * @param $key
     * @return string
     */
    public static function read($key) : string
    {
        return self::$messageArr[$key] ?? '';
    }

    /**
     * @return array
     */
    public static function allEntries() : array
    {
        return self::$messageArr;
    }


}

