<?php
include_once dirname(__FILE__, 3) . "/Util.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <?php
session_start();
$login = !empty($_SESSION['nome']) ? $_SESSION['login'] : "";
//$url_projeto = "http://" . $_SERVER['HTTP_HOST'] . dirname(dirname($_SERVER['SCRIPT_NAME'])) . DIRECTORY_SEPARATOR; //pega o host com o diretorio do projeto
$url_projeto = "http://" . $_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR; //pega o host do projeto
?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand"><?php echo $login  ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo $url_projeto ?>view/base/main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_projeto ?>view/ContatoList.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_projeto ?>view/pedidoList.php">Pedido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_projeto ?>view/petList.php">Pets</a>
                    </li>
                </ul>

            </div>
            <div class='class="row justify-content-end"'>
                <a type="button" class='btn btn-danger' href="<?php echo $url_projeto ?>view/login.php?sair=0">
                    Sair</a>
            </div>
        </div>
    </nav>