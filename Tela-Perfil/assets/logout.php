<?php
//Verifica se há uma sessão ativa e cria uma se nao a-tiver:
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

header('Location: ../../Tela-Login/index.html');
?>