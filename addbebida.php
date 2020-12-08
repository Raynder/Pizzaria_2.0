<?php
require_once '_classes/pedidos.php';
session_start();
$u = new Pedido;
$id = $_SESSION['id'];
$bebida = $_GET['beb'];
$u->conectar("login_projeto", "localhost", "root", "");  //CONEXÃO
if ($u->erro == '') {
    $u->adicionarbeb($bebida);
    echo header("location: pedir-pizza2.php");
}