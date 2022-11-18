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
    <title>BestCovers</title>
</head>
<body>
    <?php require "layout.php"; ?>
    <main>
        <h1 class="main_header">Популярные каверы</h1>
        <div class="main_posts">
            <!-- Posts -->
            <?php require "handlers/displayPostsHandler.php"; ?>
            <!-- <a href="post.php" class="main_post">
                <div class="post_image-container">
                    <img src="source/image-holder-icon.png" class="post_image">
                </div>
                <h1 class="post_header">Заголовок</h1>
                <div class="post_track">
                    <span class="track-title">Название песни</span>
                    <span class="track-author">Исполнитель</span>
                </div>
                <div class="post_date">01.01.2000</div>
            </a> -->
        </div>
    </main>
    <footer>
        &copy Мельников Владислав
    </footer>
</body>
<script src="js/indexScripts.js"></script>
</html>