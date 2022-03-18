<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


    require_once '../../config/Database.php';
    require_once '../../models/Post.php';


    $db = new Database;
    $pdo = $db->connect();
    $post = new Post($pdo);

    $data = json_decode(file_get_contents("php://input"));

    // // var_dump($data);

    $post->title       = $data->title;
    $post->body        = $data->body;
    $post->author      = $data->author;
    $post->category_id = $data->category_id;

    // var_dump($post);
    
    // Create post
  if($post->create()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }