<?php
    require "../modules/Database.php";

    $newLogin = $_POST['login'];
    $newPassword = $_POST['password'];
    $repeatPassword = $_POST['repeat-password'];

    $errors = Array();
    $errFlag = false;

    $db = new Database();
    $client = $db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']);
    $client = current($client);

    if(!empty($newPassword))
    {
        if(empty($repeatPassword))
        {
            $errors["repeat-passwordErr"] = "Повторите пароль";
            $errFlag = true;
        }
        else if($newPassword != $repeatPassword)
        {
            $errors["repeat-passwordErr"] = "Пароли не совпадают";
            $errFlag = true;
        }
        else
        {
            $newPasswordHash = $db->getHash($newPassword);
            $db->executeQuery("UPDATE client SET password_hash = ? WHERE email = ?", 
                $newPasswordHash, $client['email']);
        }
    }

    if(!empty($newLogin))
    {
        if(!$db->userExists($newLogin) || $_COOKIE['client'] == $newLogin)
        {
            $db->executeQuery("UPDATE client SET login = ? WHERE email = ?", $newLogin, $client['email']);
            $cookieOptions = Array('path' => '/');    
            setcookie("client", $newLogin, $cookieOptions);
        }
        else
        {
            $errors["loginErr"] = "Такой логин уже занят";
            $errFlag = true;
        }
    }
    else
    {
        $errors["loginErr"] = "Введите логин";
        $errFlag = true;
    }

    if($errFlag)
    {
        header("Content-Type: application/json");
        echo json_encode($errors);
    }
?>