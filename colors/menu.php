<nav>
    <ul>
        <li><a href="<?= URL ?>index.php">Home</a></li>
        <li><a href="<?= URL ?>list.php">Colors</a></li>
        <li><a href="<?= URL ?>create.php">Add Color</a></li>
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 1) : ?>
            <li class="small">
                <form action="<?= URL ?>logout.php" method="post">
                    <button type="submit">Logout, <?= $_SESSION['name'] ?></button>
                </form>
            </li>
        <?php else : ?>
            <li class="small"><a href="<?= URL ?>login.php">Login</a></li>
        <?php endif ?>
    </ul>
</nav>