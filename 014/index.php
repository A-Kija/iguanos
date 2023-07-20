<?php


$img = file_get_contents(__DIR__ . '/img.jpg');

header('Content-Type: image/jpeg');

echo $img;