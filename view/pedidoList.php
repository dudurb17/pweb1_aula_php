<?php
    include '../controller/pedidoController.php';
    include "base/header.php";

    Util::verificarLogin();

    $pedido = new pedidoContoller();

    if(!empty($_GET['id'])){
        $pedido->deletar($_GET['id']);
        header("location: pedidoList.php");
        $_SESSION["msg"] = "Registro Deletado com sucesso!";
    }

    if(!empty($_POST)){
       $load = $pedido->pesquisar($_POST);
    } else {
       $load = $pedido->carregar();
    }
/*
//passa o valor para a variavem mensagem e limpa da sessão:
if(!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
} else {
    $msg = "";
}
*/
?>
<h3>Listagem Contatos</h3>
<p style="color:red;">
    <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
</p>
<form action="pedidoList.php" method="post">
    <select name="campo">
        <option value="nome">Nome</option>
        <option value="quantidade">quantidade</option>
        <option value="valor">valor</option>
    </select>
    <label>Valor</label>
    <input type="text" name="valor" placeholder="Pesquisar" />
    <button type="submit">Buscar</button>
    <a href="pedidoForm.php">Cadastrar</a><br><br>
</form>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>valor</th>
        <th></th>
        <th></th>
    </tr>
    <?php
        foreach($load as $item){
            echo "<tr>";
                echo "<td>".$item->nome."</td>";
                echo "<td>".$item->quantidade."</td>";
                echo "<td>".$item->valor."</td>";
                 echo "<td><a href='pedidoForm.php?id=$item->id'>Editar</a></td>";
                echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='pedidoList.php?id=$item->id'>Deletar</a></td>";
            echo "<tr>";
        }
    ?>
</table>
<?php
include "base/rodape.php";