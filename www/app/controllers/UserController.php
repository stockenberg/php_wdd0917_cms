<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 31.07.18
 * Time: 11:51
 */

namespace sae\app\controllers;


use sae\app\App;
use sae\app\helpers\Session;
use sae\app\models\User;

class UserController
{
    public function init()
    {
        !Session::isAllowed([ADMIN]) ? App::redirect('home') : null;

        $user = new User();
        $userArr = $user->getAllUsersExceptFirstId();
        return $userArr;
    }

    public function delete()
    {
        $user = new User();
        $user->deleteUserById($_GET['id']);
    }
}