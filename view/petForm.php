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

<form action="petForm.php" method="post">
    <h3>Formulário Pet</h3>
    <p style="color:red;">
        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
    </p>
    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />
    <label for="">Nome</label>
    <input type="text" name="nome" value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>"><br>

    <label for="">Raça</label>
    <input type="text" name="raca" value="<?php echo (!empty($data->raca) ? $data->raca : "") ?>"><br>

    <label for="">Idade</label>
    <input type="text" name="idade" value="<?php echo (!empty($data->idade) ? $data->idade : "") ?>"><br>
    <label for="">Porte</label>
    <input type="text" name="porte" value="<?php echo (!empty($data->porte) ? $data->porte : "") ?>"><br>

    <button type="submit">
        <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
    </button><br>
    <a href="petList.php">Voltar</a><br><br>
</form>
<?php
include "base/rodape.php";