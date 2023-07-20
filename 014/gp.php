<?php
// header("HTTP/1.1 418 I'm a teapot");
// die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $_SERVER['REQUEST_METHOD'] ?> PAGE: <?= $_GET['page'] ?? '-' ?></h1>
    <h2><?= $_GET['kas'] ?? '-' ?></h2>
    <h2><?= $_GET['kiek'] ?? '-' ?></h2>
    <h2 style="color:crimson;"><?= $_POST['kas'] ?? '-' ?></h2>
    <h2 style="color:crimson;"><?= $_POST['kiek'] ?? '-' ?></h2>
    <form action="?page=102" method="post">
        KAS: <input type="text" name="kas">
        KIEK: <input type="text" name="kiek">
        <button type="submit">Submit kas kiek POST</button>
    </form>
    <form action="" method="get">
        KAS: <input type="text" name="kas">
        KIEK: <input type="text" name="kiek">
        <button type="submit">Submit kas kiek</button>
    </form>
    <a href="?kas=barsukas&kiek=daug">Link</a>
    <a href="?page=1">Page 1</a>
    <a href="?page=2">Page 2</a>
    <a href="?page=3">Page 3</a>
</body>
</html>