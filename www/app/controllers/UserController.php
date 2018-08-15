<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 31.07.18
 * Time: 11:51
 */

namespace sae\app\controllers;


use PHPMailer\PHPMailer\PHPMailer;
use sae\app\App;
use sae\app\helpers\Session;
use sae\app\helpers\StatusLog;
use sae\app\models\Role;
use sae\app\models\User;

class UserController
{
    public $data = [];

    public function __construct()
    {
        /**
         * If there is another action then default - call the init function cause we want to get the users!
         * case updateUsers();
         */
        $this->init();
    }

    public function init()
    {
        !Session::isAllowed([ADMIN]) ? App::redirect('home') : null;

        $user = new User();
        $userArr = $user->getAllUsersExceptFirstId();
        $this->data['data'] = $userArr;

        $role = new Role();
        $this->data['roles'] = $role->getAllRoles();

    }

    public function update()
    {


        if (isset($_POST['userform'])) {
            if (empty($_POST['userform']['username'])) {
                Session::addFlashFlash('edit_username', EMPTY_USERNAME);
                // BUG - Uncool! bitte unbedingt fixen!
                StatusLog::write('x', 'y');
            }
            if (empty($_POST['userform']['role_id'])) {
                Session::addFlashFlash('edit_role', EMPTY_ROLE);
                StatusLog::write('x', 'y');
            }

            if (empty(StatusLog::allEntries())) {
                $user = new User();
                if ($user->updateUser($_POST['userform'])) {
                    Session::addFlashFlash('user_updated', USER_UPDATED);
                    App::redirect('edit-users');
                } else {
                    Session::addFlashFlash('error', ERROR);
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
                Session::addFlash('username', EMPTY_USERNAME);
            }
            if (empty($_POST['userform']['password'])) {
                Session::addFlash('password', EMPTY_PASSWORD);
            }
            if (empty($_POST['userform']['role_id'])) {
                Session::addFlash('role', EMPTY_ROLE);
            }
            if ($_POST['userform']['password'] !== $_POST['userform']['password_retyped']) {
                Session::addFlash('nomatch', RETYPE_NOMATCH);
            }

            if (empty(StatusLog::allEntries())) {
                $user = new User();
                if ($user->saveUser($_POST['userform'])) {
                    Session::addFlash('user', USER_SAVED);
                    // send mail!
                    $this->sendMail($_POST['userform']);
                    App::redirect('edit-users');
                } else {
                    Session::addFlash('user', ERROR);
                }
            }
        }
    }

    public function sendMail($user)
    {

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "m.stockenberg@sae.edu";
            $mail->Password = GMAIL_PASS;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('m.stockenberg@sae.edu', 'Marten Stockenberg');
            $mail->addAddress('b4456201@nwytg.net');

            $mail->isHTML(true);
            $mail->Subject = "Hier ist eine Mail vom Server";
            $mail->Body = "
            <h2>Ein neuer Nutzer wurde angelegt</h2>
            <li>
            <li>Username:  " . $user['username'] . ",</li>
            <li>Rolle:  " . $user['role_id'] . "</li>
            </ul>
            ";
            $mail->send();
        } catch (\Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $e->getMessage();
        }
    }

    public function delete()
    {
        $user = new User();
        if ($user->deleteUserById($_GET['id'])) {
            Session::addFlash('deleted', DELETE_SUCCESSFULL);
            App::redirect('edit-users');
        }
    }
}