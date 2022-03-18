<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');


    require_once '../../config/Database.php';
    require_once '../../models/Post.php';


    $db  = new Database;
    $pdo = $db->connect();
    $post = new Post($pdo);

    $post->id = $_GET['id'] ? $_GET['id'] : die();

    if($post->delete())
    {
        echo json_encode(['message'=>'Post Deleted']);
    } else {
        echo json_encode(['message'=>'Cant Deleted!']);
    }