<?php
echo '<pre>';
$u = [];

foreach (range(1, 30) as $_) {
    $u[] = [
        'user_id' => rand(1, 1000000),
        'place_in_row' => rand(1, 100),
    ];
}

print_r($u);

echo '<hr>';

usort($u, function($a, $b) {
    return $a['place_in_row'] <=> $b['place_in_row'];
});

print_r($u);

