<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'attendances' => 'c,r,u,d',
            'configs' => 'c,r,u,d',
            'diemthis' => 'c,r,u,d',
            'documents' => 'c,r,u,d',
            'dongtus' => 'c,r,u,d',
            'dutus' => 'r,u,d',
            'links' => 'c,r,u,d',
            'mails' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
            'paper' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'status' => 'c,r,u,d',
            'years' => 'c,r,u,d',
            'zones' => 'c,r,u,d',
            'admins' => 'm'
        ],
        'administrator' => [
            'categories' => 'c,r,u,d',
            'attendances' => 'c,r,u,d',
            'diemthis' => 'c,r,u,d',
            'documents' => 'c,r,u,d',
            'dongtus' => 'c,r,u,d',
            'dutus' => 'r,u,d',
            'links' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
            'paper' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'status' => 'c,r,u,d',
            'years' => 'c,r,u,d',
            'zones' => 'c,r,u,d'
        ],
        'nhomtruong' => [
            'dutus' => 'c,r,u,d',
            'attendances' => 'c,r,u,d'
        ],
        'dutu' => [
            'dutus' => 'c,r,u,d'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'm' => 'manage'
    ]
];
