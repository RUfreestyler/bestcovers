<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap-5.2.1-dist/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="lib/bootstrap-5.2.1-dist/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>MyCovers</title>
</head>
<body>
    <?php require "layout.php"; ?>
    <main>
        <div class="main__content">
            <h1 class="main__content__header">Мои каверы</h1>
            <div class="main__content__items row">
                <div class="col-xs-12 col-sm-5 col-lg-3">
                    <a href="post.html">
                        <div class="main__content__item">
                            <img src="source/image-holder-icon.png">
                            <div>
                                <h5>Заголовок1</h5>
                                <p>Название песни - исполнитель</p>
                                <p>Автор</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-3">
                    <a href="post.html">
                        <div class="main__content__item">
                            <img src="source/image-holder-icon.png">
                            <div>
                                <h5>Заголовок2</h5>
                                <p>Название песни - исполнитель</p>
                                <p>Автор</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        &copy Мельников Владислав
    </footer>
</body>
</html>