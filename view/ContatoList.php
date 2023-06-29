<?php
    include '../controller/ContatoController.php';
    include "base/header.php";

    Util::verificarLogin();

    $contato = new ContatoController();

    if(!empty($_GET['id'])){
        $contato->deletar($_GET['id']);
        header("location: ContatoList.php");
        $_SESSION["msg"] = "Registro Deletado com sucesso!";
    }

    if(!empty($_POST)){
       $load = $contato->pesquisar($_POST);
    } else {
       $load = $contato->carregar();
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
<div class='container'>

    <h3>Listagem Contatos</h3>
    <p style="color:red;">
        <?php echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") ?>
    </p>
    <form action="ContatoList.php" method="post">
        <div class="container text-center">
            <div class="row row-cols-auto">
                <div class="col">
                    <form action="pedidoList.php" method="post">
                        <select name="campo" class='form-select'>

                            <option value="nome">Nome</option>
                            <option value="telefone">Telefone</option>
                            <option value="email">Email</option>

                        </select>
                </div>
                <div class="col"><input type="text" name="valor" placeholder="Pesquisar" class="form-control" /></div>
                <div class="col"><button type="submit" class="btn btn-outline-success">Buscar</button></div>
                <div class="col"><a href="ContatoForm.php" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Cadastrar</a></div>
            </div>
        </div>



    </form>

    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach($load as $item){
            echo "<tr>";
                echo "<td>".$item->nome."</td>";
                echo "<td>".$item->telefone."</td>";
                echo "<td>".$item->email."</td>";
                 echo "<td><a href='ContatoForm.php?id=$item->id'>Editar</a></td>";
                echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='ContatoList.php?id=$item->id'>Deletar</a></td>";
            echo "<tr>";
        }
    ?>
    </table>
</div>
<?php
include "base/rodape.php";