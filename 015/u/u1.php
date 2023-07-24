<?php
$color = isset($_GET['color']) && $_GET['color'] == 1 ? 'crimson' : 'black';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U1</title>
</head>
<body style="background:<?= $color ?>;">
<h1>
<a href="http://localhost/iguanos/015/u/u1.php?color=1">Red</a>
<a href="http://localhost/iguanos/015/u/u1.php">Black</a>
</h1>
    
</body>
</html>