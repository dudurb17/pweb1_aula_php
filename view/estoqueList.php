<?php
include '../controller/estoqueController.php';
include "base/header.php";

Util::verificarLogin();

$estoque = new estoqueController();



if (!empty($_POST)) {
    $load = $estoque->pesquisar($_POST);
} else {
    $load = $estoque->carregar();
}
if (!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
} else {
    $msg = "";
}
if (!empty($_GET['id'])) {
    $estoque->deletar($_GET['id']);
    header("location: estoqueList.php");
    $_SESSION["msg"] = "Registro Deletado com sucesso!";
}


?>
<div class="container">
    <h3>Listagem de estoque</h3>
    <p style="color:red;">
        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
    </p>

    <form action="estoqueList.php" method="post">
        <div class="container text-center">
            <div class="row row-cols-auto">
                <div class="col">
                    <form action="estoqueList.php" method="post">
                        <select name="campo" class='form-select'>

                            <option value="nome">Nome</option>
                            <option value="quantidade">Quantidade</option>
                            <option value="preco">Preço</option>
                            <option value="cnpj">CNPJ</option>
                            <option value="peso">Peso</option>


                        </select>
                </div>
                <div class="col"><input type="text" name="valor" placeholder="Pesquisar" class="form-control" /></div>
                <div class="col"><button type="submit" class="btn btn-outline-success">Buscar</button></div>
                <div class="col"><a href="estoqueForm.php" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Cadastrar</a></div>
            </div>
        </div>


    </form>

    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>CNPJ</th>
            <th>Peso(kg)</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($load as $item) {
            echo "<tr>";
            echo "<td>" . $item->nome . "</td>";
            echo "<td>" . $item->quantidade . "</td>";
            echo "<td>" . $item->preco . "</td>";
            echo "<td>" . $item->cnpj . "</td>";
            echo "<td>" . $item->peso . "</td>";
            echo "<td><a href='estoqueForm.php?id=$item->id'><i class='fas fa-edit'></i></a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='estoqueList.php?id=$item->id'><i style='color:red' class='fas fa-trash'></i></a></td>";
            echo "<tr>";
        }
        ?>
    </table>
</div>
<?php
include "base/rodape.php";