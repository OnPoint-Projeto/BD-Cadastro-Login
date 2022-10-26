<?php

session_start();
$id_usuario = $_SESSION['teste'];
$con = mysqli_connect("localhost","root","","bd_onpoint") or die ("erro de conechao");

$nome = mysqli_real_escape_string($con, $_POST['nome']);
$descricao = mysqli_real_escape_string($con, $_POST['descricao']);
$arquivo =  $_FILES['foto'];

// pega a foto e transforma em string
$arq = fopen($arquivo['tmp_name'],'rb');
$conteudo = fread ($arq, filesize ($arquivo['tmp_name']));
// decodifica o $conteudo para o bd aceitar
$blob = base64_encode($conteudo);

// faz o insert no bd
$query_insert = "INSERT INTO ITEM VALUES(NULL,'$nome','$descricao','$blob','$id_usuario');";
$query_run = mysqli_query($con, $query_insert);
if($query_run){
    // redirecionar para a home
    header('location: /onPoint/BD-Cadastro-Login/add_item/index.html');
}else{
    echo "erro";
}



// printar a imagem: echo '<img src = "data:image/png;base64,' . base64_encode($conteudo) . '" width = "50px" height = "50px"/>';

?>