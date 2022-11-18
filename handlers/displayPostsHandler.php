<?php 
    $db = new mysqli('127.0.0.1','root','','bestcovers',3306);
    $stmt = $db->prepare("SELECT * FROM post");
    $stmt->execute();
    $result = $stmt->get_result();
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($posts as $post) {
        echo "<a href=\"post.php\" class=\"main_post\">
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

    $db->close();
?>