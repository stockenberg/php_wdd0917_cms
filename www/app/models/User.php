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

    public function deleteUserById($id)
    {
        $SQL = 'DELETE FROM users WHERE id = :id';
        DB::set($SQL, [':id' => $id]);
        App::redirect('edit-users');
    }
    
    public function getAllUsersExceptFirstId()
    {
        $SQL = 'SELECT users.*, roles.role, roles.name 
                FROM users, roles 
                WHERE users.id > 1 
                AND roles.id = users.role_id';

        return DB::fetch($SQL);
    }
    
}