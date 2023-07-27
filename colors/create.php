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
$title = 'Colors - Create color';
require __DIR__ . '/top.php';
$old = $_SESSION['old_values'] ?? [];
unset($_SESSION['old_values']);
?>
<?php require __DIR__ . '/msg.php' ?>
<?php require __DIR__ . '/menu.php' ?>
<div class="create">
    <form action="<?= URL ?>store.php" method="post">
        <h1>Create Color</h1>
        <div class="form-row">
            <label for="name">Color name:</label>
            <input type="text" name="name" placeholder="Color name" value="<?= $old['name'] ?? '' ?>">
        </div>
        <div class="form-row">
            <label for="hex">Color hex:</label>
            <input type="color" name="hex" placeholder="Color hex"  value="<?= $old['hex'] ?? '#ffffff' ?>">
        </div>
        <div class="form-row">
            <button class="green" type="submit">Create</button>
        </div>
    </form>
</div>
<?php
require __DIR__ . '/bottom.php';