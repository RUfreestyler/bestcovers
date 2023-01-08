<?php
    require_once "../modules/Database.php";

    header("Content-Type: application/json");

    $postId = $_POST['postId'];
    $comment_text = $_POST['comment-text'];

    if(empty($comment_text))
    {
        echo json_encode(["commentErr" => "Введите ваш комментарий"]);
        return;
    }

    $db = new Database();

    $client = $db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']);
    $client = current($client);

    $db->executeQuery("INSERT INTO commented (client_email, client_login, post_id, comment_text) VALUES (?, ?, ?, ?)", 
        $client['email'], $client['login'], $postId, $comment_text);

    echo json_encode(["comment_author" => $client['login'], "comment_text" => $comment_text, "comment_date" => "Недавно"]);
?>