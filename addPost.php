<?php
    $links = "<link rel=\"stylesheet\" href=\"css/addPostStyles.css\">
              <script src=\"js/addPostScripts.js\" defer></script>";
    $title = "Добавление поста";

    $content = 
            "<form method=\"post\" class=\"main_form\" id=\"addPostForm\">
                <label for=\"link\">Введите ссылку на видео с YouTube:</label>   
                <input type=\"text\" class=\"\" name=\"link\" id=\"link\">
                <div class=\"error\" id=\"linkErr\"></div>
                <label for=\"title\">Заголовок поста:</label>
                <input type=\"text\" class=\"\" name=\"title\" id=\"title\">
                <div class=\"error\" id=\"titleErr\"></div>
                <label for=\"track-title\">Название песни:</label>
                <input type=\"text\" name=\"track-title\" id=\"track-title\">
                <div class=\"error\" id=\"track-titleErr\"></div>
                <label for=\"track-author\">Автор песни:</label>
                <input type=\"text\" name=\"track-author\" id=\"track-author\">
                <div class=\"error\" id=\"track-authorErr\"></div>
                <label for=\"description\">Описание:</label>
                <input type=\"text\" name=\"description\" id=\"description\">
                <button type=\"submit\" class=\"button-send\" id=\"button-createPost\">Создать</button>
            </form>";
    
    require "layout.php";
?>