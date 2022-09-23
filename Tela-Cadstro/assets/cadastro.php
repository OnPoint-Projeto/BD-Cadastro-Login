<?php
try{
    session_start();
    $con = mysqli_connect("localhost","root","","bd_onpoint") or die ("erro de conechao");
    
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
                echo "email ja existente";
              }
            } else {
                $query_insert = "INSERT INTO USUARIO VALUES(NULL,'$nome','$email','$senha')";
                $query_run = mysqli_query($con, $query_insert);
                if($query_run)
                {
                    echo "cadastro realizado";
                } 
                else
                {
                    echo "falha ao cadastrar";
                }
            }
    
        $con->close();
    }
    else{
        echo "senha diferente da confirmação";
    }
    
 
}
catch (Exception $ex)
{
    echo "<br>" . $ex->getMessage();
}
    
    

?>