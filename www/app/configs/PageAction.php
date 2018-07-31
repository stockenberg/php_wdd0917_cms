<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 21.06.18
 * Time: 10:01
 */

namespace sae\app\configs;


use sae\app\controllers\HomeController;
use sae\app\controllers\LoginController;
use sae\app\controllers\UserController;

class PageAction
{

    const PAGE_METHODS = [
        'login' => [
            'class' => LoginController::class,
            'actions' => [
                'login' => [
                    'allowed' => [],
                    'method' => 'login'
                ],
            ],
        ],
        'home' => [
            'class' => HomeController::class,
            'actions' => [
                'logout' => [
                    'allowed' => [],
                    'method' => 'logout'
                ]
            ],
        ],
        'edit-users' => [
            'class' => UserController::class,
            'actions' => [
                'default' => [
                    'allowed' => [],
                    'method' => 'init'
                ],
                'delete' => [
                    'allowed' => [ADMIN],
                    'method' => 'delete'
                ],
                'create' => [
                    'allowed' => [ADMIN],
                    'method' => 'create'
                ],
                'edit' => [
                    'allowed' => [ADMIN],
                    'method' => 'edit'
                ],
                'update' => [
                    'allowed' => [ADMIN],
                    'method' => 'update'
                ]
            ],
        ]
    ];

}