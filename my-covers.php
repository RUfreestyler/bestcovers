<?php
    $links = "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/indexStyles.css\">
              <link rel=\"stylesheet\" type=\"text/css\" href=\"css/myCoversStyles.css\">";
    $title = "Мои каверы";

    $content = "<h1 class=\"main_header\">Мои каверы</h1>
                <div class=\"main_posts\">";

    require "modules/Database.php";

    $db = new Database();
    $posts = $db->executeQuery("SELECT * FROM post WHERE postOwner = ?", $_COOKIE['client']);
    foreach ($posts as $post) {
        $content .= 
            "<a href=\"post.php?id=".$post['id']."\" class=\"main_post\">
                <object>
                    <a href=\"handlers/deletePost.php?id=".$post['id']."\" class=\"post_close\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x-lg\" viewBox=\"0 0 16 16\">
                            <path d=\"M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z\"/>
                        </svg>      
                    </a>
                </object>
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

    require "layout.php";
?>