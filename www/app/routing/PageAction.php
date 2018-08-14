<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 21.06.18
 * Time: 10:01
 */

namespace sae\app\routing;


use sae\app\controllers\HomeController;
use sae\app\controllers\LoginController;
use sae\app\controllers\NewsController;
use sae\app\controllers\UserController;
use sae\app\models\News;

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
        'news' => [
            'class' => NewsController::class,
            'actions' => [
                'view' => [
                    'allowed' => [ADMIN, AUTHOR],
                    'method' => 'view'
                ],
                'update' => [
                    'allowed' => [],
                    'method' => 'update'
                ]
            ]
        ],
        'all-news' => [
            'class' => NewsController::class,
            'actions' => [
                'default' => [
                    'allowed' => [ADMIN, AUTHOR],
                    'method' => 'init'
                ]
            ]
        ],
        'create-news' => [
            'class' => NewsController::class,
            'actions' => [
                'create' => [
                    'allowed' => [ADMIN, AUTHOR],
                    'method' => 'validate'
                ]
            ]
        ],
        'edit-users' => [
            'class' => UserController::class,
            'actions' => [
                'default' => [
                    'allowed' => [ADMIN],
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