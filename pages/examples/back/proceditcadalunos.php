
<?php

require "conect.php";
$idaluno = $_POST['idaluno'];
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
$imc1 = ($peso / ($altura * $altura));
$imc = number_format($imc1, 2, '.', ',');
//fim calculo imc

$percentil = $_POST["percentil"];

//calculo Estado Nutricional
if(($percentil == "-p3") || ($percentil == "p3")){
    $estnutricional = "Baixo Peso";
}else if($percentil == "p3-p5"){
    $estnutricional = "Eutrófico/Risco Baixo Peso";
}else if(($percentil == "p3-p15") || ($percentil == "p15") || ($percentil == "p50-p85") || ($percentil == "p15-p50")){
    $estnutricional = "Eutrófico";
}else if($percentil == "p85-p97"){
    $estnutricional = "Eutrófico/Risco de Obesidade";
}else if($percentil == "+p97"){
    $estnutricional = "Obesidade";
};
// fim calculo Estado Nutricional

    $up = ("UPDATE aluno SET escolaaluno='$escola', turmaaluno='$turma', nomealuno='$nomealuno', dtnascimento='$dtnascimento', idade='$idadebd', sexo='$sexo', peso='$peso', 
    altura='$altura', imc='$imc', percentil='$percentil', estnutricional='$estnutricional' WHERE idaluno = '$idaluno'");
    
    if (mysqli_query($con, $up)) {
        echo "<script>alert('Dados Atualizados com Sucesso!');window.location.href = '../cadalunos.php';</script>";
    } else {
          echo "Error: " . $up . "<br>" . mysqli_error($con);
    }
    
?>