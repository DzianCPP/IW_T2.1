<?php

use core\controllers\AppController;
use core\controllers\UserController;

return [
    '' => [
        'controller' => AppController::class,
        'action' => 'index',
        'method' => 'GET'
    ],

    'public' => [
        'controller' => AppController::class,
        'action' => 'index',
        'method' => 'GET'
    ],

    'user/create' => [
        'controller' => UserController::class,
        'action' => 'create',
        'method' => 'POST'
    ],

    'user/new' => [
        'controller' => UserController::class,
        'action' => 'new',
        'method' => 'GET'
    ],

    'notfound' => [
        'controller' => AppController::class,
        'action' => 'notFound',
        'method' => 'GET'
    ],

    'users/id' => [
        'controller' => UserController::class,
        'action' => 'showOne',
        'method' => 'GET'
    ],

    'users/show' => [
        'controller' => UserController::class,
        'action' => 'show',
        'method' => 'get'
    ],

    'user/edit' => [
        'controller' => UserController::class,
        'action' => 'editUser',
        'method' => 'get',
        'params' => 'userID'
    ],

    'user/update' => [
        'controller' => UserController::class,
        'action' => 'update',
        'method' => 'put'
    ]
];