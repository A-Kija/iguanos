<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Zanabazar+Square&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL ?>app.css">
    <script src="<?= URL ?>app.js" defer></script>
    <title><?= $pageTitle ?? 'No title' ?></title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">𑨮𑨊𑨝𑩇𑨙𑨁𑨝𑩇𑨪𑨊𑨪𑨰𑩇𑨭𑨊𑨙𑨝𑩇𑨙𑩇𑨫𑩇𑨪𑨊𑨘𑨊𑨸 𑨀𑨊𑨜𑨊𑨫𑨹</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'donuts' ?>">All Donuts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'donuts/create' ?>">Create new Donut</a>
        </li>
      </ul>
    <div class="d-flex">
      <span>Login</span>
    </div>
  </div>
</nav>
