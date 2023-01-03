<?php
    require "../modules/Database.php";

    $db = new Database();
    if($_POST['password'] == "")
    {
        $db->executeQuery("UPDATE client SET login = ? WHERE email = ?", $_POST['login'], $_GET['email']);
    }
    else if($_POST['password'] == $_POST['repeat-password'])
    {
        $newPasswordHash = $db->getHash($_POST['password']);
        $db->executeQuery("UPDATE client SET login = ?, password_hash = ? WHERE email = ?", 
            $_POST['login'], $newPasswordHash, $_GET['email']);
    }

    header("Location: ../profile.php");
?>