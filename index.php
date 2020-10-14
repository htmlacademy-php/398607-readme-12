<?php
require_once('functions.php');
require_once('data.php');

$is_auth = rand(0, 1);
$user_name = 'Alexandra Ignatova';



$page_content = renderTemplate('main.php', ['posts' => $posts]);
$layout_content = renderTemplate(
    'layout.php',
    [
        'content' => $page_content,
        'pageTitle' => 'readme: популярное',
        'user_name' => $user_name,
        'is_auth' => $is_auth,
    ]
);

print($layout_content);
