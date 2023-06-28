<?php
include '../controller/petController.php';
include "base/header.php";
//session_start();    
Util::verificarLogin();

$pet = new petController();

if (!empty($_POST)) {

  if (empty($_POST['id'])) {

    $pet->salvar($_POST);
  } else {
    $pet->atualizar($_POST);
  }

  header("location: " . $_SESSION['url']);

}
if (!empty($_GET['id'])) {
  $data = $pet->buscar($_GET['id']);
  //var_dump($data);
}
//passa o valor para a variavem mensagem e limpa da sessão:
/*
if(!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    //var_dump($msg );
} else {
    $msg = "";
}
*/
?>
<div class="container">
    <form action="petForm.php" method="post">
        <h3>Formulário Pet</h3>
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
                <input type="text" name="raca" class="form-control" style='width:20%' placeholder="Informe a raça"
                    value="<?php echo (!empty($data->raca) ? $data->raca : "") ?>"><br>
            </div>

            <div class="col align-self-center">
                <input type="text" name="idade" class="form-control" style='width:20%' placeholder="Informe a idade"
                    value="<?php echo (!empty($data->idade) ? $data->idade : "") ?>"><br>

            </div>

            <div class="col align-self-center">
                <input type="text" name="porte" class="form-control" style='width:20%' placeholder="Informe o porte"
                    value="<?php echo (!empty($data->porte) ? $data->porte : "") ?>"><br>

            </div>




        </div>

        <button type="submit" class='btn btn-success'>
            <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
        </button> <a href="petList.php" class="btn btn-danger">Voltar</a>
    </form>
</div>
<?php
include "base/rodape.php";