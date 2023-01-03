<?php
    $links = "<link rel=\"stylesheet\" href=\"css/addPostStyles.css\">";
    $title = "Добавление поста";

    $content = 
            "<form action=\"handlers/addPostHandler.php\" method=\"post\">
                <label for=\"link\">Введите ссылку на видео с YouTube:</label>   
                <input type=\"text\" class=\"\" name=\"link\" id=\"link\">
                <label for=\"title\">Заголовок поста:</label>
                <input type=\"text\" class=\"\" name=\"title\" id=\"title\">
                <label for=\"track-title\">Название песни:</label>
                <input type=\"text\" name=\"track-title\" id=\"track-title\">
                <label for=\"track-author\">Автор песни:</label>
                <input type=\"text\" name=\"track-author\" id=\"track-author\">
            <button type=\"submit\" class=\"button-send\">Создать</button>\"";
    
    require "layout.php";
?>