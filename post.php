<?php 
    $links = "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/postStyles.css\">
              <script src=\"js/postScripts.js\" defer></script>";
    $title = "Post";

    require "modules/Database.php";
            
    $db = new Database();
    $post = $db->executeQuery("SELECT * FROM post WHERE id = ?", $_GET['id']);
    $post = current($post);

    $content = "<h1 class=\"main_header\">".$post['title']."</h1> <div class=\"main_post\">";
    
    $content .= 
                "<div class=\"post_player-background\" id=\"player\">
                    <iframe class=\"post_player\" src=\"".$post['videoLink']."\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
                </div>
                <div class=\"post_toolbar\">
                    <span>Автор: ".$post['postOwner']."</span>
                    <button type=\"button\" class=\"\">Подписаться</button>
                    <button type=\"button\" class=\"\">Нравится</button>
                </div>
                <div class=\"post_description\">
                    <h2>Описание</h2>
                    <div>".$post['description']."</div>
                </div>
                <div class=\"post_comments\">Комментарии</div>";

    $content .= "</div>";

    require "layout.php";
?>
