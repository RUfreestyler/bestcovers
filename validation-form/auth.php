<?php 
    require_once "../modules/Database.php";

    header("Content-Type: application/json");
    $email = filter_var(trim($_POST['email']), FILTER_UNSAFE_RAW);
    $password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);

    $errors = Array();
    $errFlag = false;

    $db = new Database();

    if(empty($email))
    {
        $errors["signinLoginErr"] = "Вы не ввели логин";
        $errFlag = true;
    }
    else if(!$db->userExists($email))
    {
        $errors["signinLoginErr"] = "Пользователь с такой почтой или логином не зарегистрирован.";
        $errFlag = true;
    }

    $user = $db->validateUser($email, $password);

    if(empty($password))
    {
        $errors["signinPasswordErr"] = "Вы не ввели пароль";
        $errFlag = true;
    }
    else if(count($user) == 0)
    {
        $errors["signinPasswordErr"] = "Неверный пароль.";
        $errFlag = true;
    }
    
    if($errFlag)
    {
        echo json_encode($errors);
        return;
    }

    $user = current($user);

    $cookieOptions = Array('path' => '/');
    setcookie('client', $user['login'], $cookieOptions);
?>