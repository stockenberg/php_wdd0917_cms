<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 12:08
 */

namespace sae\app\models;


use sae\app\db\DB;

class Login
{

    public function login($username)
    {
        $SQL = 'SELECT * FROM users WHERE username = :username';
        return DB::fetch($SQL, [':username' => $username]);
    }

}