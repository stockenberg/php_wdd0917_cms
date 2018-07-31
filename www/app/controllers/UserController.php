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
use sae\app\helpers\StatusLog;
use sae\app\models\User;

class UserController
{
    public $data = [];

    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        !Session::isAllowed([ADMIN]) ? App::redirect('home') : null;

        $user = new User();
        $userArr = $user->getAllUsersExceptFirstId();
        $this->data['data'] = $userArr;
    }

    public function update()
    {
        if (isset($_POST['userform'])) {
            if (empty($_POST['userform']['username'])) {
                StatusLog::write('username', EMPTY_USERNAME);
            }
            if (empty($_POST['userform']['role_id'])) {
                StatusLog::write('role', EMPTY_ROLE);
            }

            if (empty(StatusLog::allEntries())) {
                $user = new User();
                if($user->updateUser($_POST['userform'])){
                    StatusLog::write('user', USER_UPDATED);
                    App::redirect('edit-users');
                }else{
                    StatusLog::write('user', ERROR);
                }
            }

        }
    }

    public function edit()
    {
        $user = new User();
        $this->data['edit'] = $user->getUserById($_GET['id']);
    }

    public function create()
    {

        if (isset($_POST['userform'])) {
            if (empty($_POST['userform']['username'])) {
                StatusLog::write('username', EMPTY_USERNAME);
            }
            if (empty($_POST['userform']['password'])) {
                StatusLog::write('password', EMPTY_PASSWORD);
            }
            if (empty($_POST['userform']['role_id'])) {
                StatusLog::write('role', EMPTY_ROLE);
            }
            if ($_POST['userform']['password'] !== $_POST['userform']['password_retyped']) {
                StatusLog::write('nomatch', RETYPE_NOMATCH);
            }

            if (empty(StatusLog::allEntries())) {
                $user = new User();
                if($user->saveUser($_POST['userform'])){
                    StatusLog::write('user', USER_SAVED);
                    App::redirect('edit-users');
                }else{
                    StatusLog::write('user', ERROR);
                }
            }

        }

    }

    public function delete()
    {
        $user = new User();
        $user->deleteUserById($_GET['id']);
    }
}