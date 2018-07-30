<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 09:51
 */

namespace sae\app;


use sae\app\helpers\Session;
use sae\app\helpers\StatusLog;

class App
{
    public function __construct()
    {
        Session::init('PHP_WDD_917_CMS');

    }
}