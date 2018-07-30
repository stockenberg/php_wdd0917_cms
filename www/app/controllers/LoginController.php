<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 30.07.18
 * Time: 11:09
 */

namespace sae\app\controllers;


use sae\app\helpers\Session;
use sae\app\helpers\StatusLog;
use sae\app\models\Login;

class LoginController
{
    public function login()
    {
        /**
         * If empty fields
         */
        if (empty($_POST['username']) || empty($_POST['password'])) {
            StatusLog::write('login', 'Bitte gebe deine Logindaten an!');
        }

        /** login routine */
        if (empty(StatusLog::allEntries())) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = new Login();
            $userData = $model->login($username);

            if(password_verify($password, $userData[0]['password'])){
                $id = $userData[0]['id'];
                $username = $userData[0]['username'];

                Session::add('user_id', $id);
                Session::add('username', $username);

                header('Location: ?p=home');
                exit();
            }else{
                StatusLog::write('login', 'Nutzername oder Passwort falsch.');
            }
        }
    }
}