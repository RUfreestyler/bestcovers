<?php
    $login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
    $repeatedPassword = filter_var(trim($_POST['repeat-password']), FILTER_UNSAFE_RAW);

    if(strlen($login) === 0 || strlen($login) > 100)
    {
        echo "Вы не ввели логин или его длина превышает 100 символов.";
        exit();
    } 
    else if(strlen($email) === 0 || strlen($email) > 100)
    {
        echo "Вы не ввели email или его длина превышает 100 символов.";
        exit();
    } 
    else if(strlen($password) === 0 || strlen($repeatedPassword) === 0)
    {
        echo "Вы не ввели или не повторили пароль.";
        exit();
    } 
    else if($password !== $repeatedPassword)
    {
        echo "Пароли не совпадают.";
        exit();
    }
    $password = md5($password."superSecretKey");

    $db = new mysqli('127.0.0.1','root','','bestcovers', 3306);
    $stmt = $db->prepare("INSERT INTO client (email, login, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $login, $password);
    $stmt->execute();

    $cookieOptions = Array('path' => '/');
    setcookie('client', $login, $cookieOptions);

    header("Location: /");
?>