<?php

return [
    'base_uri' => 'https://symfony-skeleton.q-tests.com/',
    'auth' => [
        'login' => 'api/v2/token',
    ],
    'authors' => [
        'all' => 'api/v2/authors',
        'one' => 'api/v2/authors/',
        'create' => 'api/v2/authors',
        'update' => 'api/v2/authors/{id}',
        'delete' => 'api/v2/authors/{id}',
    ],
    'books' => [
        'all' => 'api/v2/books',
        'one' => 'api/v2/books/',
        'create' => 'api/v2/books',
        'update' => 'api/v2/books/{id}',
        'delete' => 'api/v2/books/{id}',
    ],
];