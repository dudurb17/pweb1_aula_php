<?php
include '../controller/petController.php';
include "base/header.php";

Util::verificarLogin();
$pet = new petController();
$msg = "";
if (!empty($_GET['id'])) {
    $pet->deletar($_GET['id']);
    header("location: petList.php");
    $_SESSION["msg"] = "Registro Deletado com sucesso!";
}

if (!empty($_POST)) {
    $load = $pet->pesquisar($_POST);
} else {
    $load = $pet->carregar();
}
if (!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    //var_dump($msg );
} else {
    $msg = "";
}


?>
<div class="container">
    <h3>Listagem de pet</h3>
    <p style="color:red;">
        <?php echo $msg != "" ? $msg : "" ?>
    </p>

    <form action="petList.php" method="post">
        <div class="container text-center">
            <div class="row row-cols-auto">
                <div class="col">
                    <form action="pedidoList.php" method="post">
                        <select name="campo" class='form-select'>

                            <option value="nome">Nome</option>
                            <option value="raca">Raça</option>
                            <option value="idade">Idade</option>
                            <option value="porte">Porte</option>

                        </select>
                </div>
                <div class="col"><input type="text" name="valor" placeholder="Pesquisar" class="form-control" /></div>
                <div class="col"><button type="submit" class="btn btn-outline-success">Buscar</button></div>
                <div class="col"><a href="petForm.php" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Cadastrar</a></div>
            </div>
        </div>


    </form>

    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <th>Raça</th>
            <th>Idade</th>
            <th>porte</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($load as $item) {
            echo "<tr>";
            echo "<td>" . $item->nome . "</td>";
            echo "<td>" . $item->raca . "</td>";
            echo "<td>" . $item->idade . "</td>";
            echo "<td>" . $item->porte . "</td>";
            echo "<td><a href='petForm.php?id=$item->id'><i class='fas fa-edit'></i></a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='petList.php?id=$item->id'><i style='color:red' class='fas fa-trash'></i></a></td>";
            echo "<tr>";
        }
        ?>
    </table>
</div>
<?php
include "base/rodape.php";