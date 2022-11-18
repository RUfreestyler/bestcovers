<?php 
    $email = filter_var(trim($_POST['email']), FILTER_UNSAFE_RAW);
    $password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);

    $password = md5($password."superSecretKey");

    $db = new mysqli('127.0.0.1','root','','bestcovers', 3306);
    $stmt = $db->prepare("SELECT * FROM client WHERE (email = ? OR login = ?) AND password_hash = ?");
    $stmt->bind_param("sss", $email, $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array();

    if($user === null)
    {
        echo "Такой пользователь не найден";
        $db->close();
        exit();
    }

    $cookieOptions = Array('path' => '/');
    setcookie('client', $user['login'], $cookieOptions);

    $db->close();

    header("Location: /");
?>