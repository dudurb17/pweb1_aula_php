<?php
    include '../controller/pedidoController.php';
    include "base/header.php";

    Util::verificarLogin();

    $pedido = new pedidoContoller();

    $load = $pedido->carregar();

?>
<h3>Listagem Contatos</h3>
<p style="color:red;">
    <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
</p>
<form action="ContatoList.php" method="post">
    <select name="campo">
        <option value="nome">Nome</option>
        <option value="telefone">Telefone</option>
        <option value="email">Email</option>
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
        <th>Valor</th>
        <th></th>
        <th></th>
    </tr>
    <?php
        foreach($load as $item){
            echo "<tr>";
                echo "<td>".$item->nome."</td>";
                echo "<td>".$item->quantidade."</td>";
                echo "<td>".$item->valor."</td>";
                 echo "<td><a href='ContatoForm.php?id=$item->id'>Editar</a></td>";
                echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='ContatoList.php?id=$item->id'>Deletar</a></td>";
            echo "<tr>";
        }
    ?>
</table>
<?php
include "base/rodape.php";