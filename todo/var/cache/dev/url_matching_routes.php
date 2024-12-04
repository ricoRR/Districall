<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/task' => [
            [['_route' => 'create_task', '_controller' => 'App\\Controller\\TaskController::create_task'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'show_task', '_controller' => 'App\\Controller\\TaskController::show_task'], null, ['GET' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/task/([^/]++)(?'
                    .'|(*:59)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        59 => [
            [['_route' => 'update_task', '_controller' => 'App\\Controller\\TaskController::update_task'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'delete_task', '_controller' => 'App\\Controller\\TaskController::delete_task'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
