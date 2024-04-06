<?php
require_once 'modules/router.php';

$view = $_GET['view'] ? $_GET['view'] : '';
$router = new Router();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/sweetalert2.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="?view=list">Panel de administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?view=form&action=add"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container text-center section-container">
            <div class="row">
                <div class="col">
                    <?php
                        $router->getView($view);
                    ?>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <h4>Zabdi Ramírez - © 2024</h4>
    </footer>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/ajax.js"></script>
</body>

</html>