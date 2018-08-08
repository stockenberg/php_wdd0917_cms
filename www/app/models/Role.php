<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 08.08.18
 * Time: 10:51
 */

namespace sae\app\models;


use sae\app\db\DB;

class Role
{

    public function getAllRoles()
    {
        $SQL = "SELECT * FROM roles";

        return DB::fetch($SQL);
    }

}