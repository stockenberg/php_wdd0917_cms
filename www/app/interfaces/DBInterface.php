<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 04.07.18
 * Time: 11:58
 */
namespace sae\app\interfaces;

interface DBInterface
{

    public static function set(string $SQL, array $execArr) : bool;

    public static function fetch(string $SQL, array $execArr) : array;

    public static function fetchClass(string $SQL, array $execArr, string $FQCN) : array;



}