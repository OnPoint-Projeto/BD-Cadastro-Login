<?php

try{
    session_start();
    $con = mysqli_connect('localhost','root','','bd_onpoint') or die ("erro de conexao"); //cria a conexao

    $email = mysqli_real_escape_string($con, $_POST["email"]); //
    $senha = mysqli_real_escape_string($con, $_POST["senha"]); //recebe o email e a senha digitados

    //SELECT para verificar se o Usuario esta cadastrado no banco
    $query_select = "SELECT * FROM USUARIO WHERE EMAIL = '$email' AND SENHA = '$senha';";
    $result = $con->query($query_select);

    if($result->num_rows >0){ //se as informacoes batem com alguma entrada da tabela:
        
        while($row = $result->fetch_assoc()) { //pega a entrada da tabela selecionada
            if(!isset($_SESSION)){session_start();} //inicia uma sessão se a este ponto nao estiver nenhuma sessao iniciada            

            $_SESSION['email'] = $row['email']; //
            $_SESSION['nome'] = $row['nome']; //seleciona a coluna da tabela

            header('Location: ../Tela-Perfil/index.php'); //envia para página de perfil
        }
    }
    else{
        echo "<script type='text/javascript'>alert('FALHA AO LOGAR! Email ou Senha INCORRETOS!');"; //alert em JS de erro
        echo "javascript:window.location='./index.html';</script>";
    }


}
catch (Exception $ex)
{
    echo "<br>" . $ex->getMessage();
}

?>