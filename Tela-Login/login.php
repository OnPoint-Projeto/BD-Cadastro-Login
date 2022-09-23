<?php

try{
    session_start();
    $con = mysqli_connect("localhost","root","","bd_onpoint") or die ("erro de conechao");

    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $senha = mysqli_real_escape_string($con, $_POST["senha"]);

    $query_select = "SELECT * FROM USUARIO WHERE EMAIL = '$email' AND SENHA = '$senha';";
    $result = $con->query($query_select);

    if($result->num_rows >0){
        while($row = $result->fetch_assoc()) {
            echo "cadastrado com sucesso";
        }
    }
    else{
        echo "<script type='text/javascript'>alert('FALHA AO LOGAR! Email ou Senha INCORRETOS!');";
        echo "javascript:window.location='./index.html';</script>";
    }


}
catch (Exception $ex)
{
    echo "<br>" . $ex->getMessage();
}

?>