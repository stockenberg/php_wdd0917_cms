<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 08.08.18
 * Time: 11:59
 */

namespace sae\app\models;


use sae\app\db\DB;
use sae\app\helpers\Session;

class News
{

    public function getAllNews() : array
    {
        $SQL = "SELECT * FROM news";
        return DB::fetch($SQL);
    }

    public function getNewsById($id)
    {
        $SQL = 'SELECT * FROM news WHERE id = :id';
        return DB::fetch($SQL, [':id' => $id]);
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

    public function createNews(array $news, string $filename)
    {

        $SQL = 'INSERT INTO news (headline, teaser, content, user_id, img) VALUES (:headline, :teaser, :content, :user_id, :img)';
        $execArr = [
            ':headline' => $news['headline'],
            ':teaser' => $news['teaser'],
            ':content' => $news['content'],
            ':user_id' => Session::get('user_id'),
            ':img' => $filename,
        ];

        return DB::set($SQL, $execArr);
    }
}