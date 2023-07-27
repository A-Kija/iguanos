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
$title = 'Colors - Colors list';
require __DIR__ . '/top.php';
?>
<?php require __DIR__ . '/msg.php' ?>
<?php require __DIR__ . '/menu.php' ?>
<div class="list">
    <h1>List of Colors</h1>
    <?php $colors = json_decode(file_get_contents(__DIR__ . '/colors.json'), 1) ?>
    <p>There are <?= count($colors) ?> colors in our list.</p>
    <div class="colors-list">
    <?php foreach ($colors as $color) : ?>
        <div class="color-bin">
            <h6><?= $color['name'] ?></h6>
            <div class="color" style="background-color: <?= $color['hex'] ?>">
                <?= $color['title'] ?? 'no title' ?>
            </div>
            <a class="red" href="<?= URL ?>delete.php?id=<?= $color['id'] ?>">Delete</a>
            <a class="green" href="<?= URL ?>edit.php?id=<?= $color['id'] ?>">Edit</a>
        </div>
    <?php endforeach ?>
    </div>
</div>

<?php
require __DIR__ . '/bottom.php';