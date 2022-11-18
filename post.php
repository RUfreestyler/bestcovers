<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap-5.2.1-dist/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="lib/bootstrap-5.2.1-dist/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/postStyles.css">
    <title>Post</title>
</head>
<body>
    <?php require "layout.php"; ?>
    <main>
        <h1 class="main_header">Название поста</h1>
        <div class="main_post">
            <div class="post_player-background" id="player">
                <iframe class="post_player" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="post_toolbar">
                <button type="button" class="">Подписаться</button>
                <button type="button" class="">Нравится</button>
            </div>
            <div class="post_description">Описание</div>
            <div class="post_comments">Комментарии</div>
        </div>
    </main>
    <footer>
        &copy Мельников Владислав
    </footer>
    <script src="js/postScripts.js"></script>
</body>
</html>