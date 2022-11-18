<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap-5.2.1-dist/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="lib/bootstrap-5.2.1-dist/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/profileStyles.css">
    <title>Мой профиль</title>
</head>
<body>
    <?php require "layout.php"; ?>
    <main>
        <div></div>
        <form method="post" action="validation-form/update.php">
            <h1>Имя профиля: <?php echo $_COOKIE['client'] ?></h1>
            <label>Загрузить фото профиля:</label>
            <input type="file" class="form-content" name="photo" style="margin-bottom: 30px;">
            <label for="login" class="form-label">Логин:</label>
            <input type="text" name="login" class="form-content">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" name="email" class="form-content">
            <label for="password" class="form-label">Новый пароль:</label>
            <input type="password" class="form-content" name="password">
            <label for="repeat-password" class="form-label">Повторите пароль:</label>
            <input type="password" class="repeat-password" name="repeat-password">
            <button type="submit" class="button-send">Сохранить</button>
        </form>
        <a href="validation-form/logout.php" class="button-exit">Выйти</a>
    </main>
    <footer>
        &copy Мельников Владислав
    </footer>
</body>
</html>