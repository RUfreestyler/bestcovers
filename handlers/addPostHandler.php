<?php
    require "../modules/Database.php";

    $link = $_POST['link'];
    $title = $_POST['title'];
    $track_title = $_POST['track-title'];
    $track_author = $_POST['track-author'];

    $videoId = explode('=', $link)[1];
    $newLink = "https://www.youtube.com/embed/$videoId";
    
    $db = new Database();
    $user = $db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']);
    $user = current($user);

    $db->executeQuery("INSERT INTO post (videoLink, title, trackTitle, trackAuthor, postOwner) VALUES (?, ?, ?, ?, ?)",
        $newLink, $title, $track_title, $track_author, $user['login']);

    header("Location: /");
?>