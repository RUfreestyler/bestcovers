<?php
    $links = "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/profileStyles.css\">
            <script src=\"js/profileScripts.js\" defer></script";
    $title = "Мой профиль";
    $content = "<h1 class=\"main_header\">Имя профиля: ".$_COOKIE['client']."</h1>";

    require "modules/Database.php";

    $db = new Database();
    $user = current($db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']));

    $content .= 
                "<form method=\"post\" class=\"main_form-update\" id=\"changeDataForm\">
                    <label class=\"form-label\">E-mail: ".$user['email']."</label>
                    <label for=\"login\" class=\"form-label\">Логин:</label>
                    <input type=\"text\" name=\"login\" class=\"form-content\" value=\"".$user['login']."\">
                    <div class=\"error\" id=\"loginErr\"></div>
                    <label for=\"password\" class=\"form-label\">Новый пароль:</label>
                    <input type=\"password\" class=\"form-content\" name=\"password\">
                    <div class=\"error\" id=\"passwordErr\"></div>
                    <label for=\"repeat-password\" class=\"form-label\">Повторите пароль:</label>
                    <input type=\"password\" class=\"repeat-password\" name=\"repeat-password\">
                    <div class=\"error\" id=\"repeat-passwordErr\"></div>
                    <button type=\"submit\" class=\"button-send\" id=\"button-save\">Сохранить</button>
                </form>
                <a href=\"validation-form/logout.php\" class=\"button-exit\">Выйти</a>";
    
    require "layout.php";
?>