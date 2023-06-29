<?php
include_once '../controller/pedidoController.php';
include "base/header.php";
//session_start();
Util::verificarLogin();

  $pedido = new pedidoContoller();

if (!empty($_POST)) {

  if (empty($_POST['id'])) {

    $pedido->salvar($_POST);
  } else {
    $pedido->atualizar($_POST);
  }

  header("location: " . $_SESSION['url']);

}
if (!empty($_GET['id'])) {
  $data = $pedido->buscar($_GET['id']);
  //var_dump($data);
}
//passa o valor para a variavem mensagem e limpa da sessão:

if(!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    //var_dump($msg );
} else {
    $msg = "";
}

?>
<div class="container">
    <form action="pedidoForm.php" method="post">
        <h3>Formulário pedido</h3>
        <p style="color:red;">
            <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
        </p>
        <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />
        <div class="container text-center">

            <div class="col align-self-center">

                <input typ <e="text" name="nome" class="form-control" style='width:20%' placeholder="Informe o nome"
                    value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>
            </div>
            <div class="col align-self-center">

                <input type="number" name="quantidade" class="form-control" placeholder="Informe a quantidade"
                    style='width:20%' value="<?php echo (!empty($data->quantidade) ? $data->quantidade : "") ?>"><br>
            </div>
            <div class="col align-self-center">

                <input type="number" name="valor" class="form-control" placeholder="Informe o valor" style='width:20%'
                    value="<?php echo (!empty($data->valor) ? $data->valor : "") ?>"><br>
            </div>

        </div>
        <button type="submit" class='btn btn-success'>
            <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
        </button> <a href="pedidoList.php" class="btn btn-danger">Voltar</a>
    </form>
</div>
<?php
include "base/rodape.php";