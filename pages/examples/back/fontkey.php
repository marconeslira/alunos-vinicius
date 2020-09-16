<?php

//usado para verificar se existe uma sessão criada para o usuario não acessar diretamente as páginas

session_start();

if(!isset($_SESSION['nomeUser'])){
    echo"<script>alert('Necessário Fazer Login!');window.location.href='index.html';</script>";
    die();
} else {

    //atribui o nome do usuario a variável logado para ser usada perto do bt imprimir na tela principal
    $logado = $_SESSION['nomeUser'];

}

?>