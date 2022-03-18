<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');


    require_once '../../config/Database.php';
    require_once '../../models/Post.php';


    $db  = new Database;
    $pdo = $db->connect();
    $post = new Post($pdo);
    $result = $post->read();

    
    $num = $result->rowCount();
    if($num > 0)
    {
        $posts_arr = [];
        $posts_arr['data'] = [];
        
        //fetch data
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {   
            extract($row);

            $post_item = [
                'id'=>$id,
                'title'=>$title,
                'body'=>html_entity_decode($body),
                'author'=>$author,
                'category_id'=>$category_id,
                'category_name'=>$category_name
            ];

            array_push($posts_arr['data'], $post_item);

        }
        //turn to json & output
        echo json_encode($posts_arr);

    } else {
        echo json_encode(
            [
                'message'=>'No Posts Found'
            ]
        );

    }
    // var_dump($result);