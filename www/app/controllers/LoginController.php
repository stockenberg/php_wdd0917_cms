<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 11:09
 */

namespace sae\app\controllers;


use sae\app\App;
use sae\app\helpers\Session;
use sae\app\helpers\StatusLog;
use sae\app\models\Login;

class LoginController
{

    public function test()
    {
        
    }
    
    public function login()
    {
        /**
         * If empty fields
         */
        if (empty($_POST['username']) || empty($_POST['password'])) {
            StatusLog::write('login', LOGIN_EMPTY_FIELDS);
        }

        /** login routine */
        if (empty(StatusLog::allEntries())) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = new Login();
            $user = $model->getUserByUsernameWithRole($username);

            if(password_verify($password, $user[0]['password'])){

                $id = $user[0]['id'];
                $username = $user[0]['username'];
                $role = $user[0]['role'];
                $role_name = $user[0]['name'];

                Session::add('user_id', $id);
                Session::add('username', $username);
                Session::add('role', $role);
                Session::add('role_name', $role_name);

                App::redirect('home');
            }else{
                StatusLog::write('login', LOGIN_FAILED);
            }
        }
    }
}