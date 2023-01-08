<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/layoutScripts.js" defer></script>
    <?= $links ?>
    <title><?= $title ?></title>
</head>
<body>
    <header>
            <ul class="menu">
                <li class="menu_item">
                    <a class="menu_button" href="/">Главная</a>
                </li>
                <?php if(!isset($_COOKIE['client'])): ?>
                    <li class="menu_item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="menu_button">Вход/регистрация</a>
                    </li>
                <?php else: ?>
                    <li class="menu_item">
                        <a class="menu_button" href="my-covers.php">Мои каверы</a>
                    </li>
                    <li class="menu_item">
                        <a class="menu_button" href="profile.php">Мой профиль</a>
                    </li>
                    <li class="menu_item">
                        <a class="menu_button" href="addPost.php">Создать пост</a>
                    </li>
                <?php endif; ?>
            </ul>
    </header>
    <main>
        <?= $content; ?>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="modal_switcher" id="signinSwitcher">Вход</button>/
                        <button class="modal_switcher" id="signupSwitcher">Регистрация</button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="signupForm">
                            <label for="login" class="form-label">Логин (отображаемое имя):</label>
                            <input type="text" class="form-control" name="login" id="signup-login">
                            <div class="error" id="loginErr"></div>
                            <label for="email" class="form-label">Адрес электронной почты:</label>
                            <input type="email" class="form-control" name="email" id="signup-email">
                            <div class="error" id="emailErr"></div>
                            <label for="password" class="form-label">Пароль:</label>
                            <input type="password" class="form-control" name="password" id="signup-password">
                            <div class="error" id="passwordErr"></div>
                            <label for="repeat-password" class="form-label">Повторите пароль:</label>
                            <input type="password" class="form-control" name="repeat-password" id="signup-repeat-password"> 
                            <div class="error" id="repPassErr"></div>
                            <button type="submit" class="button-send" id="button-signup">Зарегистрироваться</button>
                        </form>
                        <form method="post" id="signinForm">
                            <label for="email" class="form-label">Логин или email:</label>
                            <input type="text" class="form-control" name="email" id="signin-email">
                            <div class="error" id="signinLoginErr"></div>
                            <label for="password" class="form-label">Пароль:</label>
                            <input type="password" class="form-control" name="password" id="signin-password">
                            <div class="error" id="signinPasswordErr"></div>
                            <button type="submit" class="button-send" id="button-signin">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <footer>
            &copy Владислав Мельников
    </footer>    
</body>
</html>