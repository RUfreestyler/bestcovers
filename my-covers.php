<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap-5.2.1-dist/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="lib/bootstrap-5.2.1-dist/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/indexStyles.css">
    <link rel="stylesheet" type="text/css" href="css/myCoversStyles.css">
    <title>MyCovers</title>
</head>
<body>
    <?php require "layout.php"; ?>
    <main>
        <h1 class="main_header">Мои каверы</h1>
        <div class="main_posts">
            <?php
                require "modules/Database.php";

                $db = new Database();
                $posts = $db->executeQuery("SELECT * FROM post WHERE postOwner = ?", $_COOKIE['client']);
                foreach ($posts as $post) {
                    echo "<a href=\"post.php?id=".$post['id']."\" class=\"main_post\">
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
            ?>
        </div>
    </main>
    <footer>
        &copy Мельников Владислав
    </footer>
</body>
</html>