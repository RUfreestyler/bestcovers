<?php
    $link = $_POST['link'];
    $title = $_POST['title'];
    $track_title = $_POST['track-title'];
    $track_author = $_POST['track-author'];

    $videoId = explode('=', $link)[1];
    $newLink = "https://www.youtube.com/embed/$videoId";
    
    $db = new mysqli('127.0.0.1','root','','bestcovers', 3306);
    $stmt = $db->prepare("SELECT * FROM client WHERE login = ?");
    $stmt->bind_param("s", $_COOKIE['client']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array();

    $stmt = $db->prepare("INSERT INTO post (videoLink, title, trackTitle, trackAuthor, postOwner) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $newLink, $title, $track_title, $track_author, $user['login']);
    $stmt->execute();

    $db->close();
    header("Location: /");
?>