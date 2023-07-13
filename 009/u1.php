<?php

$jonas = rand(5, 25);
$petras = rand(10, 20);

echo "Jonas: $jonas Petras: $petras<br>";
if ($jonas > $petras) {
    echo 'Laimejo Jonas';
} else if ($jonas < $petras) {
    echo 'Laimejo Petras';
} else {
    echo 'Lygiosios';
}


