<?php
require "_classes/conexao.php";
session_start();

$id = $_SESSION['id'];
$sql = "SELECT * FROM pizzas WHERE id = $id";
$dados = $mysqli->query($sql) or die($mysqli->error);

//Declarando todas as variaveis que vou usar
$pizza = [];
$tam = [];
$bebida = [];
$beb = "";
$cont = 0;
$valort = 0;

//Pegar a pizza por completo e adicionar em uma unica variavel
//Cauculando o valor toral do pedido
while($dado = $dados->fetch_array()){
    $pizza[$cont] = $dado['saborx']." com ".$dado['sabory']."; borda:".$dado['borda'];
    $tam[$cont] = $dado['tamanho'];

    switch($tam){
        case "P":
            $valort += 26.00;
            break;
        case "M":
            $valort += 28.00;
            break;
        case "G":
            $valort += 30.00;
            break;
    }
    $cont++;
}
//zerando contagem para fazer o mesmo com as bebidas
$cont = 0;

//Concatenando bebidas e somando valor total
$sql = "SELECT * FROM bebidas WHERE id = $id";
$dados = $mysqli->query($sql) or die($mysqli->error);

while($dado = $dados->fetch_array()){
    $bebida[$cont] = $dado['nome_bebida'];
    $valort += 6.00;
    $cont++;
}

for($i = 1; $i <= $cont; $i++){
    if($i == $cont){
        $beb = $beb." e ".$bebida[$i-1];
    }
    else{
        if($beb == ""){
            $beb = $bebida[$i-1];
        }
        else{
            $beb = $beb.",".$bebida[$i-1];
        }
        
    }
}




?>