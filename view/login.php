<?php
include '../controller/LoginController.php';

session_start();
$login = new LoginController();


if (!empty($_POST)) {
    $login->logar($_POST);
    $dados = "";
    header("location: " . $_SESSION['url']);
} 
 if(isset($_GET['sair'])) {
    session_destroy();
}
$dados = !empty($_SESSION['dados']) ? $_SESSION['dados'] : "";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

<div class="container">
    <div>

        <h1 class="text-center">Sistema do Pet Feliz</h1></br>
        <form action="login.php" method="post">
            <div class="d-flex justify-content-center">

                <div class="card align-items-center " style=' width:400px '>
                    <div class="row ">
                        <div class="col">
                            <div class="card-body align-items-center">
                                <p style="color:red;">
                                    <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
                                </p>
                                <div class="container text-center">
                                    <input type="text" name="login" class="form-control" placeholder="Informe o usuario"
                                        value="<?php echo (!empty($dados['login']) ? $dados['login'] : "") ?>" /><br>
                                </div>
                                <div class="container text-center">
                                    <input type="password" name="senha" class="form-control"
                                        placeholder="Informe a senha" /><br>
                                </div>


                                <button type="submit" class=' btn btn-success'>Logar</button>
                                <button class='btn btn-warning'><a
                                        href="RegistrarUsuarioForm.php">Registrar-se</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>







    </form>
</div>
<?php include "./base/rodape.php" ?>