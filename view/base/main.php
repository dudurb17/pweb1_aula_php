<?php
include "header.php";
Util::verificarLogin();
//var_dump($_SESSION);
//exit;
?>
<div class="container">
    <h1>Telas</h1>
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://play-lh.googleusercontent.com/lj3-A-o0OJ77q-kFr6I_ayayShV3n_bukz9kZ3NNA5okkNHMWyajDD24mlFdK53ckA=w240-h480-rw"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Inserir pedidos
                                </h5>
                                <p class="card-text">Local Destinado para vizualizar os pedidods e adiciona-los</p>
                                <a href="../pedidoList.php" class='btn btn-success'>Entrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://st3.depositphotos.com/1177973/14011/i/600/depositphotos_140115380-stock-photo-group-of-cute-pets.jpg"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Listagem dos animais do Pet
                                </h5>
                                <p class="card-text">Local Destinado para vizualizar os pet e adiciona-los</p>
                                <a href="../petList.php" class='btn btn-success'>Entrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php
include "rodape.php";