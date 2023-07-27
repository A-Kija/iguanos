<?php
require __DIR__ . '/bootstrap.php';
if (!isset($_GET['id'])) {
    header('Location: ' . URL . 'list.php');
    die;
}

$colors = json_decode(file_get_contents(__DIR__ . '/colors.json'), 1);

$color = false;

foreach ($colors as $c) {
    if ($c['id'] == $_GET['id']) {
        $color = $c;
        break;
    }
}

if ($color === false) {
    header('Location: ' . URL . 'list.php');
    die;
}

$title = 'Colors - Edit color';
require __DIR__ . '/top.php';
$old = $_SESSION['old_values'] ?? [];
unset($_SESSION['old_values']);
?>
<?php require __DIR__ . '/msg.php' ?>
<?php require __DIR__ . '/menu.php' ?>
<div class="create">
    <form action="<?= URL ?>update.php?id=<?= $color['id'] ?>" method="post">
        <h1>Edit Color</h1>
        <div class="form-row">
            <label for="name">Color name:</label>
            <input type="text" name="name" placeholder="Color name" value="<?= $old['name'] ?? $color['name'] ?>">
        </div>
        <div class="form-row">
            <label for="hex">Color hex:</label>
            <input type="color" name="hex" placeholder="Color hex"  value="<?= $old['hex'] ?? $color['hex'] ?>">
        </div>
        <div class="form-row">
            <button class="green" type="submit">Save</button>
            <a class="red" href="<?= URL ?>list.php">Calncel</a>
        </div>
    </form>
</div>
<?php
require __DIR__ . '/bottom.php';