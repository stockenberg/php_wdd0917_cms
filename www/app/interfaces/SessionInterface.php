<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 20.06.18
 * Time: 11:02
 */

namespace sae\app\interfaces;


interface SessionInterface
{
    /**
     * Session name and sessions start
     */
    public static function init($name) : void;

    /**
     * Add to session
     * @param $key
     * @param $value
     */
    public static function add($key, $value) : void ;

    /**
     * Remove key from session
     * @param $key
     */
    public static function remove($key) : void;

    /**
     * Clear the whole session
     */
    public static function clear() : void;

    /**
     * print current session array
     * @return array
     */
    public static function all() : array;


}