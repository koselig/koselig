<?php

return [
    'supplier' => [
        'public' => true,
        'capability_type' => 'page',
        'label' => 'Supplier',
        'map_meta_cap' => true,
        'menu_position' => 5,
        'hierarchical' => false,
        'rewrite' => false,
        'query_var' => false,
        'delete_with_user' => true,
        'supports' => [
            'title',
            'revisions',
        ],
    ],
];
