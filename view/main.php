<?php
session_start();
//var_dump($_SESSION);
//exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Olá <?php echo $_SESSION['login'] ?>, seja bem vindo!

    <br>
    <a href="paginas/ContatoList.php"> Contato </a>
</body>
</html>
