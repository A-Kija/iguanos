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

$colors = json_decode(file_get_contents(__DIR__ . '/colors.json'), 1);

$find = false;
foreach ($colors as $key => $c) {
    if ($c['id'] == $_GET['id']) {
        $find = true;
        unset($colors[$key]);
        file_put_contents(__DIR__ . '/colors.json', json_encode($colors));
        break;
    }
}

$_SESSION['message'] = [
    'text' => $find ? 'Color deleted!' : 'Color not found!',
    'type' => $find ? 'limegreen' : 'crimson'
];

header('Location: ' . URL . 'list.php');
die;