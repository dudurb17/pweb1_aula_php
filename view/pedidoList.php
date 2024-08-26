<?php
include '../controller/pedidoController.php';
include "base/header.php";

Util::verificarLogin();

$pedido = new pedidoContoller();
$msg = "";

if (!empty($_GET['id'])) {
    $pedido->deletar($_GET['id']);
    header("location: pedidoList.php");
    $_SESSION["msg"] = "Registro Deletado com sucesso!";
}

if (!empty($_POST)) {
    $load = $pedido->pesquisar($_POST);
} else {
    $load = $pedido->carregar();
}


//passa o valor para a variavem mensagem e limpa da sessão:
if (!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
} else {
    $msg = "";
}

?>
<div class="container">
  <h3>Listagem Pedidos</h3>
  <p style="color:red;">
    <?php echo $msg != "" ? $msg : "" ?>
  </p>
  <div class="container text-center">
    <div class="row row-cols-auto">
      <div class="col">
        <form action="pedidoList.php" method="post">
          <select name="campo" class='form-select'>
            <option value="nome">Nome</option>
            <option value="quantidade">quantidade</option>
            <option value="valor">valor</option>
            <option value="cpf">CPF</option>
            <option value="data">Data</option>
            <option value="observacao">Observação</option>
          </select>
      </div>
      <div class="col"><input type="text" name="valor" placeholder="Pesquisar" class="form-control" /></div>
      <div class="col"><button type="submit" class="btn btn-outline-success">Buscar</button></div>
      <div class="col"><a href="pedidoForm.php" class="btn btn-primary"><i class="fas fa-plus"></i>
          Cadastrar</a></div>
    </div>
  </div>
  </form>

  <table class="table table-striped table-hover">
    <tr>
      <th>Nome</th>
      <th>Quantidade</th>
      <th>valor</th>
      <th>CPF</th>
      <th>Data pedido</th>
      <th>Observação</th>
      <th></th>
      <th></th>
    </tr>
    <?php
        foreach ($load as $item) {
            echo "<tr>";
            echo "<td>" . $item->nome . "</td>";
            echo "<td>" . $item->quantidade . "</td>";
            echo "<td>" . $item->valor . "</td>";
            echo "<td>" . $item->cpf . "</td>";
            echo "<td>" . $item->data . "</td>";
            echo "<td>" . $item->observacao . "</td>";
            echo "<td><a href='pedidoForm.php?id=$item->id'><i class='fas fa-edit'></i></a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='pedidoList.php?id=$item->id'><i style='color:red' class='fas fa-trash'></i></a></td>";
            echo "<tr>";
        }
        ?>
  </table>
</div>
<?php
include "base/rodape.php";