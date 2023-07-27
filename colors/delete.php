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

$title = 'Colors - Confirm delete';
require __DIR__ . '/top.php';
?>
<?php require __DIR__ . '/menu.php' ?>
<div class="delete">
    <div class="confirm-delete confirm">
        <h3>Are you sure you want to delete this color?</h3>
        <h6><?= $color['name'] ?></h6>
        <div class="color" style="background-color: <?= $color['hex'] ?>">
            <?= $color['name'] ?>
        </div>
        <div class="buttons">
            <form action="<?= URL ?>destroy.php?id=<?= $color['id'] ?>" method="post">
                <button class="red" type="submit">Yes, delete!</button>
            </form>
            <a class="green" href="<?= URL ?>list.php">No, go back!</a>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/bottom.php';