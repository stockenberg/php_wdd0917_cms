<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 21.06.18
 * Time: 10:01
 */

namespace classes\config;


use classes\controller\ContactController;

class PageAction
{

    const PAGE_METHODS = [
        'contact' => [
            'class' => ContactController::class,
            'actions' => [
                'submit' => 'submit',
            ],
        ]
    ];

}