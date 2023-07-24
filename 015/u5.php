<?php
echo '<pre>';
$az = range('A', 'Z');
$m3 = [];
foreach (range(1, 10) as $_) {
    $t = [];
    foreach (range(1, rand(2, 20)) as $_) {
        $t[] = $az[rand(0, 25)];
    }
    $m3[] = $t;
}
print_r($m3);

echo '<hr>';

usort($m3, function($a, $b) {
    if (in_array('K', $b) && !in_array('K', $a)) {
        return 1;
    }
    if (in_array('K', $a) && !in_array('K', $b)) {
        return -1;
    }
    return count($a) <=> count($b);
});

print_r($m3);

echo '<hr>';