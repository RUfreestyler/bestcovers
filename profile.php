<?php
    $links = "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/profileStyles.css\">";
    $title = "Мой профиль";
    $content = "<h1 class=\"main_header\">Имя профиля: ".$_COOKIE['client']."</h1>";

    require "modules/Database.php";

    $db = new Database();
    $user = current($db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']));

    $content .= 
                "<form method=\"post\" action=\"handlers/updateUser.php?email=".$user['email']."\" class=\"main_form-update\">
                    <label>Загрузить фото профиля:</label>
                    <input type=\"file\" class=\"form-content\" name=\"photo\" style=\"margin-bottom: 30px;\">
                    <label class=\"form-label\">E-mail: ".$user['email']."</label>
                    <label for=\"login\" class=\"form-label\">Логин:</label>
                    <input type=\"text\" name=\"login\" class=\"form-content\" value=\"".$user['login']."\">
                    <label for=\"password\" class=\"form-label\">Новый пароль:</label>
                    <input type=\"password\" class=\"form-content\" name=\"password\">
                    <label for=\"repeat-password\" class=\"form-label\">Повторите пароль:</label>
                    <input type=\"password\" class=\"repeat-password\" name=\"repeat-password\">
                    <button type=\"submit\" class=\"button-send\">Сохранить</button>
                </form>
                <a href=\"validation-form/logout.php\" class=\"button-exit\">Выйти</a>";
    
    require "layout.php";
?>