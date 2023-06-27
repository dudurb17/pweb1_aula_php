<?php
include_once '../controller/pedidoController.php';
include "base/header.php";
//session_start();
Util::verificarLogin();

$pedido = new pedidoContoller();

if (!empty($_POST)) {

  
    $pedido->salvar($_POST);
  

  header("location: " . $_SESSION['url']);

}

?>

<form action="pedidoForm.php" method="post">
    <h3>Formulário Pedido</h3>
    <p style="color:red;">
        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
    </p>
    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />
    <label for="">Nome</label>
    <input type="text" name="nome" value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>

    <label for="">Quantidade</label>
    <input type="text" name="quantidade" value="<?php echo (!empty($data->quantidade) ? $data->quantidade : "") ?>"><br>

    <label for="">Valor</label>
    <input type="text" name="valor" value="<?php echo (!empty($data->valor) ? $data->valor : "") ?>"><br>

    <button type="submit">
        <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
    </button><br>
    <a href="pedidoList.php">Voltar</a><br><br>
</form>
<?php
include "base/rodape.php";