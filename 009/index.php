<?php

echo(85 * 178 / 10000);

echo '<br>';

echo 85 * 178 / 10000;

# echo 85 * 178 / 10000;

$trecias = 10;

echo '<br>';

echo $trecias % 3;

$ketvirtas = 4;

$ketvirtas = $ketvirtas + 5;
$ketvirtas += 5;

$pirmas = 'bla bla';
$antras = 'ku kū';

echo '<br>';

echo $pirmas . ' ' . $antras;

echo '<br>';

echo 0x1A + 10;

echo '<br>';


$a = 'labas';

$labas = 'rytas';

$rytas = 'Lietuva';

echo $$$a;

echo '<br>';

$a = 'Hello';


echo 'labas \n\n\n\n\n vakaras';

echo '<br>';

$va = 'Jonė';

var_dump($va[3].$va[4]);

$vienas = 11;
$rezultatas = 1 == $vienas ? 'Yes 1' : $rezultatas = 2 == $vienas ? 'Yes 2' : 'No';

echo '<h1>'.$rezultatas.'</h1>';

$abc = 888;

if (isset($abc)) {
    var_dump($abc);
} else {
    echo 'Nera';
}

echo '<br>';

// if(null === $abc) {
//     echo 'NULAS';
// } else {
//     echo 'NE NULAS';
// }


// var_dump($abc);

unset($abc);

$color = 'crimson';

// echo '<h1 style="color: '.$color.';">'.($abc ?? 777).'</h1>';


?>


<h1 style="color: <?= $color ?> ;">
    Labas
</h1>

<?php

echo '<h1>';

$i = 1;

if ($i == 0) {
    echo 'i equals 0';
} elseif ($i == 1) {
    echo 'i equals 1';
} elseif ($i == 2) {
    echo 'i equals 2';
}

echo '</h1>';

echo '<h1>';

switch ($i) {
    case 0:
        echo 'i equals 0';
        break;
    case 1:
        echo 'i equals 1';
        break;
    case 2:
        echo 'i equals 2';
        break;
}

echo '</h1>';

echo '<h1>';

echo match($i) {
    0 => 'i equals 0',
    1 => 'i equals 1',
    2 => 'i equals 2',
    default => 'i does not equal 0, 1 or 2',
};


echo '</h1>';



