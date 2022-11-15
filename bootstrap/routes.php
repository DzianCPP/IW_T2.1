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
    ],

    'notfound' => [
        'controller' => 'AppController',
        'action' => 'notFound',
        'method' => 'GET'
    ],

    'users/id' => [
        'controller' => 'UserController',
        'action' => 'showOne',
        'method' => 'GET'
    ],

    'users/show' => [
        'controller' => 'UserController',
        'action' => 'show',
        'method' => 'get'
    ],

    'user/edit' => [
        'controller' => 'UserController',
        'action' => 'editUser',
        'method' => 'get',
        'params' => 'userID'
    ],

    'user/edit/save' => [
        'controller' => 'UserController',
        'action' => 'saveEditedUser',
        'method' => 'post'
    ]
];