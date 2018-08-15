<?php
/**
 * Controller
 * Model
 * DB connect
 */
require_once('app/configs/main.php');
require_once('app/configs/secret.php');
require_once("vendor/autoload.php");

$app = new \sae\app\App();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/sticky-footer.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="?p=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?p=about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?p=contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?p=gallery">Gallery</a>
            </li>

            <?php if (\sae\app\helpers\Session::isLoggedIn()) : ?>

                <li class="nav-item">
                    <a class="nav-link" href="?p=edit-users">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?p=all-news">All News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?p=home&action=logout">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="?p=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?p=register">Register</a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</nav>
<main class="container-fluid">
    <?php include(PAGES . \sae\app\routing\Route::validPage() . ".php"); ?>
</main>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/news-edit.js"></script>
</body>
</html>