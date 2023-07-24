<?php
$color = isset($_GET['color']) ? $_GET['color'] : 'black';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U3</title>
</head>
<body style="background:<?= $color ?>;">
<h1>
<a href="http://localhost/iguanos/015/u/u1.php">Black</a>
</h1>
<form action="http://localhost/iguanos/015/u/u3.php" method="get">
    <input type="color" name="color">
    <button type="submit">GO</button>
</form>
    
</body>
</html>