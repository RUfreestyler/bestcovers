<?php
    $cookieOptions = Array('path' => '/');
    setcookie('client', '', $cookieOptions);
    header('Location: /');
?>