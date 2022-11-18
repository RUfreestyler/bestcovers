<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap-5.2.1-dist/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="lib/bootstrap-5.2.1-dist/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/addPostStyles.css">
    <title>Добавление поста</title>
</head>
<body>
    <?php require "layout.php"; ?>
    <main>
        <form action="/handlers/addPostHandler.php" method="post">
            <label for="link">Введите ссылку на видео с YouTube:</label>   
            <input type="text" class="" name="link" id="link">
            <label for="title">Заголовок поста:</label>
            <input type="text" class="" name="title" id="title">
            <label for="track-title">Название песни:</label>
            <input type="text" name="track-title" id="track-title">
            <label for="track-author">Автор песни:</label>
            <input type="text" name="track-author" id="track-author">
            <button type="submit" class="button-send">Создать</button>
        </form>
    </main>
</body>
</html>