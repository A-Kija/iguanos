<?php

foreach(range(1, 30) as $_) {
    $masyvas[] = rand(5, 25);
}

echo '<pre>';
print_r($masyvas);

foreach ($masyvas as $key => $value) {
    if (!($key % 2)) {
        unset($masyvas[$key]);
    }
}

echo '<pre>';
print_r($masyvas);