<?php
    $links = "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/indexStyles.css\"";
    $title = "BestCovers";
    $content = "<h1 class=\"main_header\">Популярные каверы</h1> <div class=\"main_posts\">";

    require "modules/Database.php";
        
    $db = new Database();
    $posts = $db->getTable('post');

    foreach ($posts as $post) 
    {
        $content .= 
            "<a href=\"post.php?id=".$post['id']."\" class=\"main_post\">
                <div class=\"post_image-container\">
                    <img src=\"source/image-holder-icon.png\" class=\"post_image\">
                </div>
                <h1 class=\"post_header\">".$post['title']."</h1>
                <div class=\"post_track\">
                    <span class=\"track-title\">".$post['trackTitle']." - </span>
                    <span class=\"track-author\">".$post['trackAuthor']."</span>
                </div>
                <div class=\"post_date\">".$post['date']."</div>
            </a>";
    }

    $content .= "</div>";
    
    require_once "layout.php";
?>