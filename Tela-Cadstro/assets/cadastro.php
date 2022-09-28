<?php
try{
    session_start();
    $con = mysqli_connect("localhost","root","","bd_onpoint") or die ("erro de conexao");
    
    $nome = mysqli_real_escape_string($con, $_POST["nome"]);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $senha = mysqli_real_escape_string($con, $_POST['senha']);
    $csenha = mysqli_real_escape_string($con, $_POST['confSenha']);
    md5($senha);
    if($senha == $csenha){
        $query_select = "SELECT email FROM usuario where email = '$email';";

        $result = $con->query($query_select);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<script type='text/javascript'>alert('Email Já Existente!');";
                echo "javascript:window.location='../index.html';</script>";
              }
            } else {
                $query_insert = "INSERT INTO USUARIO VALUES(NULL,'$nome','$email','$senha')";
                $query_run = mysqli_query($con, $query_insert);
                if($query_run)
                {
                    header("Location: ../../Tela-Login/index.html");
                } 
                else
                {
                    echo "<script type='text/javascript'>alert('Falha no cadastro!');";
                    echo "javascript:window.location='../index.html';</script>";
                }
            }
    
        $con->close();
    }
    else{
        echo "<script type='text/javascript'>alert('Senha diferente da Confirmação!');";
        echo "javascript:window.location='../index.html';</script>";
    }
    
 
}
catch (Exception $ex)
{
    echo "<br>" . $ex->getMessage();
}
    
    

?>