<?php
echo '<pre>';

$spintele = [
    5 => 'bebras',
    true => 'vilkas',
    '' => 'lape',
    'pieva' => 'zuikis',
    'barsukas',
    'vovere',
    'suo',
   -33 => 'kate',
    'narvas' => 'peleda',
    'sernas',
];

$spintele[20] = 'papuga';

// array_push($spintele, 'varna');
$spintele[] = 'varna';

// array_unshift($spintele, 'strutis');

// array_pop($spintele);
// array_shift($spintele);



echo '<br>';

foreach ($spintele as $key => &$value) {}

unset($value);

foreach ($spintele as $key => $value) {}



// for ($i = 1; $i <= 5; $i++) {
//     echo $i;
// }


// echo '<br>';


// foreach (range('a', 'k') as $value) {
//     echo $value;
// }
 

echo '<br>';





print_r($spintele);

usort($spintele, function($a, $b) {
    return  strlen($b) <=> strlen($a);
});

print_r($spintele);


// print_r(range('a', 'k'));


// echo $spintele[4];
