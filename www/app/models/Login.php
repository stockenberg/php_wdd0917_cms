<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 12:08
 */

namespace sae\app\models;


use sae\app\db\DB;
use sae\app\dtos\User;

class Login
{

    public function getUserByUsername(String $username)
    {
        $SQL = 'SELECT * FROM users WHERE username = :username';
        return DB::fetch($SQL, [':username' => $username]);
    }

    public function getUserByUsernameWithRole(String $username) : array
    {
        $SQL = 'SELECT users.username, users.password, users.id, roles.role, roles.name 
                FROM users, roles
                WHERE users.username = :username 
                AND users.role_id = roles.id';

       return DB::fetch($SQL, [':username' => $username]);

    }

}