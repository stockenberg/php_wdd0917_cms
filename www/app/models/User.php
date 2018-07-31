<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 31.07.18
 * Time: 11:54
 */

namespace sae\app\models;


use sae\app\App;
use sae\app\db\DB;

class User
{

    public function getAllUsers()
    {
        
    }

    public function updateUser($user)
    {
        $SQL = 'UPDATE users SET username = :username, role_id = :role_id WHERE id = :id';
        return DB::set($SQL, [
            ':username' => $user['username'],
            ':role_id' => $user['role_id'],
            ':id' => $_GET['id']
            ]
        );
    }

    public function getUserById($id)
    {
        $SQL = 'SELECT * FROM users WHERE id = :id';
        return DB::fetch($SQL, [':id' => $id]);
    }

    public function deleteUserById($id)
    {
        $SQL = 'DELETE FROM users WHERE id = :id';
        DB::set($SQL, [':id' => $id]);
        App::redirect('edit-users');
    }

    public function saveUser($user)
    {
        $SQL = 'INSERT INTO users (username, password, role_id) 
                VALUES (:username, :password, :role)';

        return DB::set($SQL, [
            ':username' => $user['username'],
            ':password' => password_hash($user['password'], PASSWORD_DEFAULT, ['cost' => 12]),
            ':role' => $user['role_id']
        ]);
    }
    
    public function getAllUsersExceptFirstId()
    {
        $SQL = 'SELECT users.*, roles.role, roles.name 
                FROM users, roles 
                WHERE users.id > 1 
                AND roles.id = users.role_id ORDER BY users.username';

        return DB::fetch($SQL);
    }
    
}