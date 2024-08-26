<?php
include_once '../controller/ContatoController.php';
include "base/header.php";
//session_start();
Util::verificarLogin();

$contato = new ContatoController();

if (!empty($_POST)) {

    if (empty($_POST['id'])) {

        $contato->salvar($_POST);
    } else {
        $contato->atualizar($_POST);
    }

    header("location: " . $_SESSION['url']);

}
if (!empty($_GET['id'])) {
    $data = $contato->buscar($_GET['id']);
    //var_dump($data);
}
//passa o valor para a variavem mensagem e limpa da sessão:

if (!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    //var_dump($msg );
} else {
    $msg = "";
}

?>
<div class="container">
    <form action="ContatoForm.php" method="post">
        <h3>Formulário Contato</h3>
        <p style="color:red;">
            <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
        </p>
        <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />
        <div class="container text-center">
            <div class="col align-self-center">
                <input type="text" name="nome" class="form-control" style='width:20%' placeholder="Informe o nome"
                    required value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>
            </div>
            <div class="col align-self-center">
                <input type="text" name="email" class="form-control" style='width:20%' placeholder="Informe o email"
                    required value="<?php echo (!empty($data->email) ? $data->email : "") ?>"><br>
            </div>
            <div class="col align-self-center">
                <input type="text" name="telefone" class="form-control" style='width:20%' required
                    placeholder="Informe o telefone"
                    value="<?php echo (!empty($data->telefone) ? $data->telefone : "") ?>"><br>
            </div>

        </div>

        <button type="submit" class='btn btn-success'>
            <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
        </button> <a href="ContatoList.php" class="btn btn-danger">Voltar</a>
    </form>

    <?php
    include "base/rodape.php";