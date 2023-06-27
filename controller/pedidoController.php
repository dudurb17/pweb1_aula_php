<?php
include "../model/BD.class.php";

class pedidoContoller {

    private $model;
    private $table = "pedido";


    public function salvar($dados){

        try {
            $this->model->inserir($this->table, $dados);
            $_SESSION['url'] ="pedidoList.php";
            $_SESSION['msg'] ="Registro Salvo com sucesso!";
    
        } catch (Exception $e){
            $_SESSION['dados'] = $dados;
            $_SESSION['url'] = 'pedidoForm.php';
            $_SESSION['msg'] = $e->getMessage();
        }
    }
    public function __construct(){
        $this->model = new BD();
    }
  
    public function carregar(){
        
       return $this->model->select($this->table);
    }
   
}