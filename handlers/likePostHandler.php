<?php
    require_once "../modules/Database.php";

    header("Content-Type: application/json");
    $postId = $_POST['postId'];
    $action = $_POST['action'];
    $db = new Database();

    $post = $db->executeQuery("SELECT * FROM post WHERE id = ?", $postId);
    $post = current($post);
    $currentNumLikes = $post['num_likes'];

    $client = $db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']);
    $client = current($client);

    if($action == "inc")
    {
        $currentNumLikes++;
        $db->executeQuery("UPDATE post SET num_likes = ? WHERE id = ?", $currentNumLikes, $postId);
        $db->executeQuery("INSERT INTO liked (client_email, post_id) VALUES (?, ?)", $client['email'], $postId);
    }
    else if($action == "dec")
    {
        $currentNumLikes--;
        $db->executeQuery("UPDATE post SET num_likes = ? WHERE id = ?", $currentNumLikes, $postId);
        $db->executeQuery("DELETE FROM liked WHERE client_email = ? AND post_id = ?", $client['email'], $postId);
    }

    echo json_encode(["numLikes" => $currentNumLikes]);
?>