<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">

    <title>Site</title>
</head>
<body>
<div class="container">
    <div class="row" id="menu">
        <div class="col">
            <a href="/" class="btn btn-outline-success">Новости</a>
            <a href="/tests/" class="btn btn-outline-success">Тесты</a>
            <a href="/news_admin.php" class="btn btn-outline-success">Админ-Новости</a>
        </div>
    </div>
    <?php
    if (false !== $article) {
        ?>
        <div class="row">
            <div class="col">
                <h6><?php echo $article->title; ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><?php echo $article->content; ?></p>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="row">
            <div class="col-auto">
                <div class="alert alert-danger" role="alert">
                    Новость не найдена
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/">Вернуться на главную</a>
            </div>
        </div>
        <?php
    } ?>
</div>
</body>
</html>