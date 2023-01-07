<?php
    require "../modules/Database.php";

    header("Content-Type: application/json");
    $link = $_POST['link'];
    $title = $_POST['title'];
    $track_title = $_POST['track-title'];
    $track_author = $_POST['track-author'];
    $description = $_POST['description'];

    $errors = Array();
    $errFlag = false;

    if(empty($link))
    {
        $errors["linkErr"] = "Введите ссылку на видео с YouTube.";
        $errFlag = true;
    }
    if(empty($title))
    {
        $errors["titleErr"] = "Введите название поста";
        $errFlag = true;
    }
    if(empty($track_title))
    {
        $errors["track-titleErr"] = "Введите название песни";
        $errFlag = true;
    }
    if(empty($track_author))
    {
        $errors["track-authorErr"] = "Введите исполнителя песни";
        $errFlag = true;
    }

    if($errFlag)
    {
        echo json_encode($errors);
        return;
    }

    $videoId = explode('=', $link)[1];
    $newLink = "https://www.youtube.com/embed/$videoId";
    
    $db = new Database();
    $user = $db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']);
    $user = current($user);

    $db->executeQuery("INSERT INTO post (videoLink, title, trackTitle, trackAuthor, postOwner, description) VALUES (?, ?, ?, ?, ?, ?)",
        $newLink, $title, $track_title, $track_author, $user['login'], $description);
?>