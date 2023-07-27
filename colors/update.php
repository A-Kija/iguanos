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

if (!isset($_GET['id'])) {
    header('Location: ' . URL . 'list.php');
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
    header('Location: ' . URL . 'edit.php?id=' . $_GET['id'] . '');
    die;
}

if (strlen($name) < 4) {
    $_SESSION['message'] = [
        'text' => 'Name must be at least 4 characters long!',
        'type' => 'crimson'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'edit.php?id=' . $_GET['id'] . '');
    die;
}


$colors = json_decode(file_get_contents(__DIR__ . '/colors.json'), 1);

$find = false;
foreach ($colors as $key => $c) {
    if ($c['id'] == $_GET['id']) {
        $find = true;
        $colors[$key] = [
            'id' => $c['id'],
            'name' => $name,
            'hex' => $hex,
            'title' => getColorName($hex)
        ];
        file_put_contents(__DIR__ . '/colors.json', json_encode($colors));
        break;
    }
}

$_SESSION['message'] = [
    'text' => $find ? 'Color updated!' : 'Color not found!',
    'type' => $find ? 'limegreen' : 'crimson'
];

header('Location: ' . URL . 'list.php');
die;