<?php

return [
    'default' => [
        'theme' => 'example',
        'layout' => 'full'
    ],
    'logo' => [
        'default' => '/assets/dashboard/logo.png',
        'small' => '/assets/dashboard/logo.png',
        'favicon' => '/assets/dashboard/logo.png',
    ],
    'guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Logout route
    |--------------------------------------------------------------------------
    |
    | The urls for dashboard to work
    |
    */

    'url' => [
        // Dashboard landing page
        'home' => '/dashboard',

        // Route to logout from dashboard. It should be with POST type
        'logout' => '/logout',
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigation links
    |--------------------------------------------------------------------------
    |
    | Map your navigation here ex:
    | [
    |    'title' => 'Subscription plans',
    |    'icon' => 'package',
    |    'items' => [
    |        [
    |            'title' => 'Main title',
    |            'type' => 'divider'
    |        ],
    |        [
    |            'title' => 'Add new',
    |            'url' => route('create')
    |        ],
    |        [
    |            'title' => 'Features',
    |            'items' => [
    |                [
    |                    'title' => 'Features list',
    |                    'url' => route('central.plans.feature.index'),
    |                ],
    |                [
    |                    'title' => 'Add new feature',
    |                    'url' => route('central.plans.feature.create'),
    |                ],
    |            ],
    |        ],
    |    ],
    | ]
    |
    */

    'nav' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Side menu items
    |--------------------------------------------------------------------------
    |
    | Map your side menu here ex:
    | [
    |    'title' => 'Subscription plans',
    |    'subtitle' => 'extra text',
    |    'icon' => 'package',
    |    'url' => route('create')
    | ]
    |
    */

    'side-menu' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Available themes to use
    |--------------------------------------------------------------------------
    |
    | Each theme contains its configs,
    | the following template should be applied in your code
        'example' => [
            'views_path' => 'vendor/{vendor-name}/example/resources/views',
            'assets_dir' => 'vendor/{vendor-name}/example/public/assets',
            'layouts' => [
                'full'
            ]
        ]
    |
    */

    'themes' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Supported theme colors
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'supported-colors' => [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
    ],

    /*
    |--------------------------------------------------------------------------
    | Translation
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'translation' => [
        'enabled' => true,
        'hide_from_menu' => false,
    ],

];
