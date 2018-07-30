<?php
    /**
     * Config.php
     * Controller
     * Model
     * DB connect
     * Session
     * Status
     */

    require_once ("vendor/autoload.php");
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
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<main class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
    <div class="row">
        <div class="col text-center">
            <h2>Test</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam consectetur illum ipsum maiores soluta unde, ut velit! Commodi doloribus esse excepturi inventore labore odio perferendis quibusdam repellat saepe voluptatum!</p>
        </div>
        <div class="col text-center">
            <h2>Test</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci, dolore ea eaque maxime nulla officiis porro qui sapiente tenetur. Adipisci consequatur consequuntur dicta incidunt iste itaque officiis saepe, ut!</p>
        </div>
        <div class="col text-center">
            <h2>Test</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aut dolorum fuga, incidunt iste libero maiores modi neque nisi odit possimus provident quia, quisquam ratione repellat, repellendus repudiandae. Voluptates.</p>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
</body>
</html>