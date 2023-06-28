<?php
    include '../controller/petController.php';
    include "base/header.php";

    Util::verificarLogin();

    $pet = new petController();

    if(!empty($_GET['id'])){
        $pet->deletar($_GET['id']);
        header("location: petList.php");
        $_SESSION["msg"] = "Registro Deletado com sucesso!";
    }

    if(!empty($_POST)){
       $load = $pet->pesquisar($_POST);
    } else {
       $load = $pet->carregar();
    }


?>
<h3>Listagem de pet</h3>
<p style="color:red;">
    <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
</p>
<form action="petList.php" method="post">
    <select name="campo">
        <option value="nome">Nome</option>
        <option value="raca">Raça</option>
        <option value="idade">Idade</option>
        <option value="porte">Porte</option>
    </select>
    <label>Valor</label>
    <input type="text" name="valor" placeholder="Pesquisar" />
    <button type="submit">Buscar</button>
    <a href="petForm.php">Cadastrar</a><br><br>
</form>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>porte</th>
        <th></th>
        <th></th>
    </tr>
    <?php
        foreach($load as $item){
            echo "<tr>";
                echo "<td>".$item->nome."</td>";
                echo "<td>".$item->raca."</td>";
                echo "<td>".$item->idade."</td>";
                echo "<td>".$item->porte."</td>";
                 echo "<td><a href='petForm.php?id=$item->id'>Editar</a></td>";
                echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='petList.php?id=$item->id'>Deletar</a></td>";
            echo "<tr>";
        }
    ?>
</table>
<?php
include "base/rodape.php";