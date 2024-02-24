<?php

return[
    [
        'route' => 'dashboard.dashboard',
        'name' => 'Dashboards',
        'icon' => 'icon-home2',
        'active' => 'dashboard.dashboard',

    ],
    [
        'route' => 'dashboard.categories.index',
        'name' => 'Categories',
        'icon' => 'icon-circular-graph',
        'active' => 'dashboard.categories.*',
        'ability' => 'categories.view',

    ],
    [
        'route' => 'dashboard.products.index',
        'name' => 'Products',
        'icon' => 'icon-layers2',
        'active' => 'dashboard.products.*',
        'ability' => 'products.view',


    ],
    [
        'route' => 'dashboard.roles.index',
        'name' => 'Roles',
        'icon' => 'icon-star2',
        'active' => 'dashboard.roles.*',
        'ability' => 'roles.view',

    ],
];
