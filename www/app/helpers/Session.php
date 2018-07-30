<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 20.06.18
 * Time: 11:06
 */

namespace sae\app\helpers;


use sae\app\interfaces\SessionInterface;

class Session implements SessionInterface
{
    public static function init($name): void
    {
        session_name($name);
        session_start();
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public static function add($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function remove($key): void
    {
        unset($_SESSION[$key]);
    }

    public static function clear(): void
    {
        session_destroy();
    }

    public static function all(): array
    {
        return $_SESSION;
    }


    public static function isLoggedIn() : bool
    {
        return ($_SESSION['user_id'] ?? false) ? true : false;
    }

}