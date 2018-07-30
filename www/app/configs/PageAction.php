<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 21.06.18
 * Time: 10:01
 */

namespace sae\app\configs;


use sae\app\controllers\LoginController;

class PageAction
{

    const PAGE_METHODS = [
        'login' => [
            'class' => LoginController::class,
            'actions' => [
                'test' => 'test',
            ],
        ]
    ];

}