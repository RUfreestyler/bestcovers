<?php 
    require "modules/Database.php";
    
    $db = new Database();
    $posts = $db->getTable('post');

    foreach ($posts as $post) {
        echo "<a href=\"post.php?id=".$post['id']."\" class=\"main_post\">
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
?>