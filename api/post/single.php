<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');


    require_once '../../config/Database.php';
    require_once '../../models/Post.php';


    $db  = new Database;
    $pdo = $db->connect();
    $post = new Post($pdo);

    //get id
    $post->id = $_GET['id'] ? $_GET['id'] : '';


    $post->single();
    
    $post_arr = [
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name
    ];
    
    
    //make json
    echo json_encode($post_arr);
        
        
        
        
        