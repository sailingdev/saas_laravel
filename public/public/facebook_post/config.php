<?php
return [
    'id' => 'facebook_post',
    'name' => 'Facebook Post',
    'author' => 'Stackcode',
    'author_uri' => 'https://stackposts.com',
    'version' => '1.0',
    'desc' => '',
    'icon' => 'fab fa-facebook-square',
    'color' => '#3b5998',
    'menu' => [
        'tab' => 2,
        'position' => 1000,
        'name' => 'Facebook',
        'sub_menu' => [
        	'position' => 1000,
            'id' => 'facebook_post',
            'name' => 'Post'
        ]
    ],
    'css' => [
		'assets/css/facebook_post.css'
	]
];