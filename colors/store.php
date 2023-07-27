<?php
require __DIR__ . '/bootstrap.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    $_SESSION['message'] = [
        'text' => 'Please login first!',
        'type' => 'crimson'
    ];
    header('Location: ' . URL . 'login.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);    // Method Not Allowed
    die;
}

$hex = $_POST['hex'] ?? '';
$name = $_POST['name'] ?? '';

if ($hex == '' || $name == '') {
    $_SESSION['message'] = [
        'text' => 'Please fill in all fields!',
        'type' => 'crimson'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

if (strlen($name) < 4) {
    $_SESSION['message'] = [
        'text' => 'Name must be at least 4 characters long!',
        'type' => 'crimson'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

$colors = json_decode(file_get_contents(__DIR__ . '/colors.json'), 1);

$color = [
    'id' => uniqid(),
    'name' => $name,
    'hex' => $hex,
    'title' => getColorName($hex)
];

$colors[] = $color;
file_put_contents(__DIR__ . '/colors.json', json_encode($colors));


$_SESSION['message'] = [
    'text' => 'Color created!',
    'type' => 'limegreen'
];

header('Location: ' . URL . 'list.php');
die;