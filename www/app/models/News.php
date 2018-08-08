<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 08.08.18
 * Time: 11:59
 */

namespace sae\app\models;


use sae\app\db\DB;

class News
{

    public function getAllNews() : array
    {
        $SQL = "SELECT * FROM news";
        return DB::fetch($SQL);
    }

    public static function all(Int $limit = null) : array
    {
        $SQL = 'SELECT * FROM news';
        $execArr = [];

        if(!is_null($limit)){
            // BUG - please consider to use PDO statement with placeholder values!
            $SQL .= ' LIMIT ' . $limit;
            // BUG - $execArr[':limit'] = (int) $limit;
        }


        return DB::fetch($SQL, $execArr);


    }
}