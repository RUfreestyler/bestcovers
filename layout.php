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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="modal_switcher" id="signinSwitcher">Вход</button>/
                    <button class="modal_switcher" id="signupSwitcher">Регистрация</button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="validation-form/check.php" id="signupForm">
                        <label for="login" class="form-label">Логин (отображаемое имя):</label>
                        <input type="text" class="form-control" name="login">
                        <label for="email" class="form-label">Адрес электронной почты:</label>
                        <input type="email" class="form-control" name="email">
                        <label for="password" class="form-label">Пароль:</label>
                        <input type="password" class="form-control" name="password">
                        <label for="repeat-password" class="form-label">Повторите пароль:</label>
                        <input type="password" class="form-control" name="repeat-password"> 
                        <button type="submit" class="button-send">Зарегистрироваться</button>
                    </form>
                    <form method="post" action="validation-form/auth.php" id="signinForm">
                        <label for="email" class="form-label">Логин или email:</label>
                        <input type="text" class="form-control" name="email">
                        <label for="password" class="form-label">Пароль:</label>
                        <input type="password" class="form-control" name="password">
                        <button type="submit" class="button-send">Войти</button>
                    </form>
                </div>
            </div>
        </div>
</div>