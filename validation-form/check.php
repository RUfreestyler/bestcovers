<?php
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);

    require_once "../modules/Database.php";

    header("Content-Type: application/json");
    $login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
    $repeatedPassword = filter_var(trim($_POST['repeat-password']), FILTER_UNSAFE_RAW);

    $errors = Array();
    $errFlag = false;

    if(strlen($login) === 0 || strlen($login) > 100)
    {
        $errors["loginErr"] = "Вы не ввели логин или его длина превышает 100 символов.";
        $errFlag = true;
    } 
    if(strlen($email) === 0 || strlen($email) > 100)
    {
        $errors["emailErr"] = "Вы не ввели email или его длина превышает 100 символов.";
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
        echo json_encode($errors);
        return;
    }

    $db = new Database();

    $db->registerUser($email, $login, $password);

    $cookieOptions = Array('path' => '/');
    setcookie('client', $login, $cookieOptions);
?>