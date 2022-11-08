<?php

return [
    '' => [
        'controller' => 'AppController',
        'action' => 'index',
        'method' => 'GET'
    ],

    'public' => [
        'controller' => 'AppController',
        'action' => 'index',
        'method' => 'GET'
    ],

    'user/create' => [
        'controller' => 'UserController',
        'action' => 'create',
        'method' => 'POST'
    ],

    'user/new' => [
        'controller' => 'UserController',
        'action' => 'new',
        'method' => 'GET'
    ]
];