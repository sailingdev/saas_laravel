<?php
return [
    'id' => 'twitter_post',
    'name' => 'Twitter Post',
    'author' => 'Stackcode',
    'author_uri' => 'https://stackposts.com',
    'version' => '1.0',
    'desc' => '',
    'icon' => 'fab fa-twitter',
    'color' => '#00acee',
    'menu' => [
        'tab' => 2,
        'position' => 980,
        'name' => 'Twitter',
        'sub_menu' => [
        	'position' => 1000,
            'id' => 'twitter_post',
            'name' => 'Post'
        ]
    ],
    'css' => [
		'assets/css/twitter_post.css'
	]
];