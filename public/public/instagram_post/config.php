<?php
return [
    'id' => 'instagram_post',
    'name' => 'Instagram Post',
    'author' => 'Stackcode',
    'author_uri' => 'https://stackposts.com',
    'version' => '1.0',
    'desc' => '',
    'icon' => 'fab fa-instagram',
    'color' => '#d62976',
    'menu' => [
        'tab' => 2,
        'position' => 990,
        'name' => 'Instagram',
        'sub_menu' => [
        	'position' => 1000,
            'id' => 'instagram_post',
            'name' => 'Post'
        ]
    ],
    'css' => [
		'assets/css/instagram_post.css'
	],
    'js' => [
        'assets/js/instagram_post.js'
    ]
];