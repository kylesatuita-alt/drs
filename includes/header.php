<?php
$siteName = 'D. Racing Sims';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle ?? $siteName) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="topbar">
    <div class="container topbar-inner">
        <a href="index.php" class="brand">
            <img src="assets/img/logo.png" alt="<?= $siteName ?> logo">
            <span><?= $siteName ?></span>
        </a>
        <nav class="nav">
            <a href="index.php" class="active">Home</a>
            <a href="#servers">Servers</a>
            <a href="leaderboards.php">Leaderboards</a>
            <a href="drivers.php">Drivers</a>
        </nav>
        <a href="login.php" class="btn btn-outline">Sign in</a>
    </div>
</header>