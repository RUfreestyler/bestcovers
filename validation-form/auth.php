<?php 
    require "../modules/Database.php";

    $email = filter_var(trim($_POST['email']), FILTER_UNSAFE_RAW);
    $password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);

    $db = new Database();
    $user = $db->validateUser($email, $password);

    if(count($user) == 0)
    {
        echo "Такой пользователь не найден";
        exit();
    }
    
    $user = current($user);

    $cookieOptions = Array('path' => '/');
    setcookie('client', $user['login'], $cookieOptions);

    header("Location: /");
?>