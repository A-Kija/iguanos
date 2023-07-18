<?php


$html = file_get_contents('https://www.vz.lt/');

echo str_replace('Skaitomiausi', 'Bebrai ir Barsukai', $html);