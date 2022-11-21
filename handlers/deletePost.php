<?php
    require "../modules/Database.php";

    $db = new Database();
    $db->executeQuery("DELETE FROM post WHERE id = ?", $_GET['id']);

    header("Location: ../my-covers.php");
?>