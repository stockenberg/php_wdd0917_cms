<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 12:18
 */

namespace sae\app\controllers;


use sae\app\App;
use sae\app\helpers\Session;

class HomeController
{
    public function logout()
    {
        Session::clear();
        App::redirect('home');
    }
}