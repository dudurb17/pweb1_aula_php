<?php
include '../controller/LoginController.php';

session_start();
$login = new LoginController();


if (!empty($_POST)) {

    $login->salvar($_POST);
    $_SESSION['dados'] = "";
    header("location: " . $_SESSION['url']);
}
$dados = !empty($_SESSION['dados']) ? $_SESSION['dados'] : "";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

<div class='container'>
    <form action="RegistrarUsuarioForm.php" method="post">
        <h3>Formulário Registrar Usuário</h3>
        <p style="color:red;">
            <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
        </p>
        <div class="container text-center">
            <div class="col align-self-center">
                <input type="text" name="nome" class="form-control" style=' width:20%' placeholder="Informe o nome"
                    value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>
            </div>
            <div class="col align-self-center">
                <input "text" name="email" class="form-control" style='width:20%' placeholder="Informe o email"
                    value="<?php echo (!empty($data->email) ? $data->email : "") ?>"><br>
            </div>
            <div class="col align-self-center">
                <input type="number" name="telefone" class="form-control" style='width:20%'
                    placeholder="Informe o telefone"
                    value="<?php echo (!empty($data->telefone) ? $data->telefone : "") ?>"><br>
            </div>
            <div class="col align-self-center">
                <input typ type="text" name="login" class="form-control" style='width:20%' placeholder="Informe o login"
                    value="<?php echo (!empty($data->login) ? $data->login : "") ?>"><br>
            </div>

            <div class="col align-self-center">
                <input type="password" name="senha" class="form-control" style='width:20%' placeholder="Informe a senha"
                    value="<?php echo (!empty($data->senha) ? $data->senha : "") ?>"><br>
            </div>
            <div class="col align-self-center">
                <input type="password" name="c_senha" class="form-control" style='width:20%'
                    placeholder="Confirmar Senha"
                    value="<?php echo (!empty($data->c_senha) ? $data->c_senha : "") ?>"><br>
            </div>

        </div>



        <button type="submit" class='btn btn-success'> Cadastrar</button>
        <a href="login.php" class='btn btn-danger'>Voltar</a><br><br>
    </form>
</div>
<?php include "./base/rodape.php" ?>