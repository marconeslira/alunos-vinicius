<?php

require 'conect.php';
  
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$sql = mysqli_query($con, "SELECT * FROM usuario WHERE cpf_usuario =  '$cpf' AND senha_usuario = '$senha'");

if (mysqli_num_rows($sql)<=0){
        echo"<script>alert('CPF ou Senha Inválidos!');window.location.href='../../../index.html';</script>";
      }else{
       
$sel = "SELECT nome_usuario FROM usuario WHERE cpf_usuario = '$cpf'";
$res = mysqli_query($con, $sel) or die ("erro ao buscar");

while($dado = $res->fetch_array()){ 
  $nomeUser = $dado['nome_usuario'];
  };
         session_start();
         //$_SESSION['cpf'] = $cpf;
         $_SESSION['nomeUser'] = $nomeUser;
         echo"<script>alert('Login Realizado com Sucesso!');window.location.href='../../../dash.php';</script>";
        }



?>