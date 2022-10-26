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
        $query_select = "SELECT * FROM usuario where email = '$email';";

        $result = $con->query($query_select);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<script type='text/javascript'>alert('FALHA AO CADASTRAR! Email ja existente!');";
                echo "javascript:window.location='/onPoint/BD-Cadastro-Login/Tela-Cadstro/index.html';</script>";
              }
            } else {
                $query_insert = "INSERT INTO USUARIO VALUES(NULL,'$nome','$email','$senha')";
                $query_run = mysqli_query($con, $query_insert);
                
                if($query_run)
                {
                    $query_select = "SELECT * FROM usuario where email = '$email';";
                    $result = $con->query($query_select);
                    if($result->num_rows >0){
                        while($row = $result->fetch_assoc()) {
                            $_SESSION["teste"] = $row['id'];
                            header('location: /onPoint/BD-Cadastro-Login/add_item/index.html');
                            
                        }
                    }
                    else{
                        echo "<script type='text/javascript'>alert('FALHA AO LOGAR! Email ou Senha INCORRETOS!');";
                        echo "javascript:window.location='./index.html';</script>";
                    }
                    
                } 
                else
                {
                    echo "<script type='text/javascript'>alert('FALHA AO CADASTRAR!');";
                echo "javascript:window.location='/onPoint/BD-Cadastro-Login/Tela-Cadstro/index.html';</script>";
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