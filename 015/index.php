<?php
$animals = [];
if (file_exists(__DIR__ . '/animals.json')) {
    $animals = json_decode(file_get_contents(__DIR__ . '/animals.json'), 1);
}

// post 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_GET['action'] == 'delete') {
        foreach ($animals as $key => $animal) {
            if ($animal['id'] == $_GET['id']) {
                unset($animals[$key]);
                break;
            }
        }
    }

    if ($_GET['action'] == 'create') {
        $animals[] = [
            'name' => $_POST['name'],
            'id' => uniqid(),
        ];
    }

    file_put_contents(__DIR__ . '/animals.json', json_encode($animals));
    header('Location: http://localhost/iguanos/015/');
    die;
}


// get
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOO</title>
</head>
<body>
    <h1>ZOO</h1>
    <ul>
        <?php if (!empty($animals)): ?>
            <?php foreach ($animals as $animal): ?>
                <li>
                    <?= $animal['name'] ?>
                    <form action="http://localhost/iguanos/015/?action=delete&id=<?= $animal['id'] ?>" method="post">
                        <button type="submit">Delete</button>
                    </form>
                </li>
            <?php endforeach ?>
        <?php else: ?>
            <li>
                No animals
            </li>
        <?php endif ?>
    </ul>
    <fieldset>
        <legend>Add animal</legend>
        <form action="http://localhost/iguanos/015/?action=create" method="post">
            <input type="text" name="name">
            <button type="submit">Add</button>
        </form>
    </fieldset>
</body>
</html>