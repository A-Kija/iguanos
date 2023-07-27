<?php
//logout.php
require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);    // Method Not Allowed
    die;
}

if (!isset($_SESSION['id'])) {
    header('Location: ' . URL . 'login.php');
    die;
}

unset($_SESSION['login']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['id']);


$_SESSION['message'] = [
    'text' => 'You have been logged out!',
    'type' => 'limegreen'
];

header('Location: ' . URL . 'index.php');
