
<?php

require "conect.php";

$escola = $_POST['escola'];
$turma = $_POST['turma'];
$nomealuno = $_POST['nomealuno'];

//recebe dt nascimento e calcula idade e salva no bd
$dtnascimento = $_POST['dtnascimento'];
$dn = new DateTime($dtnascimento);
$agora = new DateTime();
$idade = $agora->diff($dn);
$idadebd = $idade->y;
//fim calculo idade

$sexo = $_POST['sexo'];
$peso = str_replace(',', '.', $_POST['peso']); //trocar ponto por virgula 
$altura = str_replace(',', '.', $_POST['altura']);

//calculo do IMC
$imc = (int)($peso / ($altura * $altura));
//fim calculo imc

$percentil = $_POST['percentil'];

//calculo Estado Nutricional
if($imc < 18.5){
    $estnutricional = "Baixo Peso";
}else if(($imc >=18.5) && ($imc< 24.9)){
    $estnutricional = "Peso Normal";
}else if(($imc >=25) && ($imc <=29.9)){
    $estnutricional = "Sobrepeso";
}else if(($imc >=30) && ($imc <=34.9)){
    $estnutricional = "Obesidade Grau 1";
}else if(($imc >=35) && ($imc <=39.9)){
    $estnutricional = "Obesidade Grau 2";
}else if($imc >=40){
    $estnutricional = "Obesidade Grau 3";
};
// fim calculo Estado Nutricional



$sql = "INSERT INTO aluno (escolaaluno, turmaaluno, nomealuno, dtnascimento, idade, sexo, peso, 
altura, imc, percentil, estnutricional) 
VALUES ('$escola','$turma','$nomealuno','$dtnascimento','$idadebd','$sexo','$peso','$altura',
'$imc','$percentil','$estnutricional')";

if (mysqli_query($con, $sql)) {
    echo "<script>alert('Registro Salvo com Sucesso!');window.location.href = '../cadalunos.html';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




?>