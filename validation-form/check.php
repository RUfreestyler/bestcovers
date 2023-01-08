<?php
    require_once "../modules/Database.php";

    $login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
    $repeatedPassword = filter_var(trim($_POST['repeat-password']), FILTER_UNSAFE_RAW);

    $errors = Array();
    $errFlag = false;
    $db = new Database();

    if(strlen($login) === 0 || strlen($login) > 100)
    {
        $errors["loginErr"] = "Вы не ввели логин или его длина превышает 100 символов.";
        $errFlag = true;
    } 
    if($db->userExists($login))
    {
        $errors["loginErr"] = "Логин занят";
        $errFlag = true;
    }
    if(strlen($email) === 0 || strlen($email) > 100)
    {
        $errors["emailErr"] = "Вы не ввели email или его длина превышает 100 символов.";
        $errFlag = true;
    } 
    $client = $db->executeQuery("SELECT * FROM client WHERE email = ?", $email);
    if(count($client) != 0)
    {
        $errors["emailErr"] = "Пользователь с такой почтой уже зарегистрирован.";
        $errFlag = true;
    }
    if(strlen($password) === 0)
    {
        $errors["passwordErr"] = "Вы не ввели пароль.";
        $errFlag = true;
    } 
    if($password !== $repeatedPassword)
    {
        $errors["repPassErr"] = "Пароли не совпадают.";
        $errFlag = true;
    }


    if($errFlag)
    {
        header("Content-Type: application/json");
        echo json_encode($errors);
        return;
    }

    $db->registerUser($email, $login, $password);

    $cookieOptions = Array('path' => '/');
    setcookie('client', $login, $cookieOptions);

?>