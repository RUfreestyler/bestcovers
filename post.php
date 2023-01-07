<?php 
    $links = "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/postStyles.css\">
              <script src=\"js/postScripts.js\" defer></script>";
    $title = "Пост";

    require "modules/Database.php";
            
    $db = new Database();
    $post = $db->executeQuery("SELECT * FROM post WHERE id = ?", $_GET['id']);
    $post = current($post);   

    $likeButtonClass = "";

    if(!empty($_COOKIE['client']))
    {
        $user = $db->executeQuery("SELECT * FROM client WHERE login = ?", $_COOKIE['client']);
        $user = current($user);
    
        $likedPost = $db->executeQuery("SELECT * FROM liked WHERE client_email = ? AND post_id = ?", $user['email'], $post['id']);
    
        if(count($likedPost) == 1)
        {
            $likeButtonClass = "button-liked";
        }
    }

    $content = "<h1 class=\"main_header\">".$post['title']."</h1> <div class=\"main_post\">";
    
    $content .= 
                "<div class=\"post_player-background\" id=\"player\">
                    <iframe class=\"post_player\" src=\"".$post['videoLink']."\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
                </div>
                <div class=\"post_author\">Автор: ".$post['postOwner']."</div>
                <div class=\"post_toolbar\">
                    <button type=\"button\" class=\"".$likeButtonClass."\" id=\"button-like\">Нравится</button>
                    <span>Количество лайков: 
                        <span id=\"num-likes\">".$post['num_likes']."</span>
                    </span>
                </div>
                <div class=\"post_description\">
                    <h2>Описание</h2>
                    <div>".$post['description']."</div>
                </div>
                <div class=\"post_comments\">
                    <h2>Комментарии</h2>
                    <div></div>
                </div>";

    $content .= "</div>";

    require "layout.php";
?>
