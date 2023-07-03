<?php
include '../controller/estoqueController.php';
include "base/header.php";
//session_start();    
Util::verificarLogin();

$estoque = new estoqueController();

if (!empty($_POST)) {

  if (empty($_POST['id'])) {

    $estoque->salvar($_POST);
  } else {
    $estoque->atualizar($_POST);
  }

  header("location: " . $_SESSION['url']);

}
if (!empty($_GET['id'])) {
  $data = $estoque->buscar($_GET['id']);
  //var_dump($data);
}
//passa o valor para a variavem mensagem e limpa da sessão:<!-- // /* -->
if(!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    //var_dump($msg );
} else {
    $msg = "";
}

?>
<div class="container">
    <form action="estoqueForm.php" method="post">
        <h3>Cadastro de estoque</h3>
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
                <input type="text" name="quantidade" class="form-control" style='width:20%'
                    placeholder="Informe a quantidade"
                    value="<?php echo (!empty($data->quantidade) ? $data->quantidade : "") ?>"><br>
            </div>

            <div class="col align-self-center">
                <input type="text" name="preco" class="form-control" style='width:20%' placeholder="Informe o preço"
                    value="<?php echo (!empty($data->preco) ? $data->preco : "") ?>"><br>

            </div>
            <div class="col align-self-center">
                <input type="text" name="cnpj" class="form-control" style='width:20%' placeholder="Informe o CNPJ"
                    value="<?php echo (!empty($data->cnpj) ? $data->cnpj : "") ?>"><br>
            </div>
            <div class="col align-self-center">
                <input type="text" name="peso" class="form-control" style='width:20%'
                    placeholder="Informe o peso. EX: 456.45"
                    value="<?php echo (!empty($data->peso) ? $data->peso : "") ?>"><br>
            </div>



        </div>

        <button type="submit" class='btn btn-success'>
            <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
        </button> <a href="estoqueList.php" class="btn btn-danger">Voltar</a>
    </form>
</div>
<?php
include "base/rodape.php";