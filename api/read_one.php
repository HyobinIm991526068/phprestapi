<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//call the initialize.php (initializing the api)
include_once('../core/initialize.php');

//instantiate post
$post = new Post($db);

//check if it exists and get else close
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->read_one();

$post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
);

//make into json
print_r(json_encode($post_arr));

?>