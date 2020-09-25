
<?php

require "conect.php";

$escola = $_POST['escola'];
$turma = $_POST['turma'];
$nomealuno = $_POST['nomealuno'];

//busca o ano letivo da turma recebida e setando para o aluno
$sql = mysqli_query($con, "SELECT * FROM turma WHERE nometurma = '$turma'");
$result = mysqli_fetch_assoc($sql);
$anoletivoaluno = $result['anoletivo'];

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

$percentil = $_POST['percentil'];

//calculo Estado Nutricional
if(($percentil == "-p3") || ($percentil == "p3")){
    $estnutricional = "Baixo Peso";
}else if($percentil == "p3-p5"){
    $estnutricional = "Eutrófico/Risco Baixo Peso";
}else if(($percentil == "p3-p15") || ($percentil == "p15") || ($percentil == "p15-p50") || ($percentil == "p50-p85")){
    $estnutricional = "Eutrófico";
}else if($percentil == "p85-p97"){
    $estnutricional = "Eutrófico/Risco de Obesidade";
}else if($percentil == "+p97"){
    $estnutricional = "Obesidade";
};
// fim calculo Estado Nutricional

$sql = mysqli_query($con, "SELECT * FROM aluno WHERE nomealuno =  '$nomealuno' AND dtnascimento = '$dtnascimento' AND anoletivoaluno = '$anoletivoaluno'");

if (mysqli_num_rows($sql)>0) {

    echo "<script>alert('Este aluno já tem cadastro no sistema!');window.location.href = '../cadalunos.php';</script>";

} else {

    $sql = "INSERT INTO aluno (escolaaluno, turmaaluno, nomealuno, dtnascimento, idade, sexo, peso, 
    altura, imc, percentil, estnutricional, anoletivoaluno) 
    VALUES ('$escola','$turma','$nomealuno','$dtnascimento','$idadebd','$sexo','$peso','$altura',
    '$imc','$percentil','$estnutricional', '$anoletivoaluno')";
    
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Registro Salvo com Sucesso!');window.location.href = '../cadalunos.php';</script>";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

}

?>