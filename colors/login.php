<?php
require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = json_decode(file_get_contents(__DIR__ . '/users.json'), 1);
    foreach ($users as $user) {
        if ($user['email'] == $_POST['email'] && $user['psw'] == md5($_POST['psw'])) {
            $_SESSION['login'] = 1;
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['message'] = [
                'text' => 'Welcome back, ' . $user['name'] . '!',
                'type' => 'limegreen'
            ];
            header('Location: ' . URL . 'list.php');
            die;
        }
    }
    $_SESSION['message'] = [
        'text' => 'Wrong credentials',
        'type' => 'crimson'
    ];
    header('Location: ' . URL . 'login.php');
    die;
}

if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    header('Location: ' . URL . 'index.php');
    die;
}

$title = 'Colors - Login';
require __DIR__ . '/top.php';
?>
<?php require __DIR__ . '/msg.php' ?>
<div class="login">
    <form action="<?= URL ?>login.php" method="post">
    <h1>Login</h1>
    <div class="form-row">    
        <label>Name</label>
        <input type="text" name="email">
    </div>
    <div class="form-row">
        <label>Password</label>
        <input type="password" name="psw">
    </div>
        <button type="submit" class="blue">Login</button>
    </form>
</div>

<?php
require __DIR__ . '/bottom.php';