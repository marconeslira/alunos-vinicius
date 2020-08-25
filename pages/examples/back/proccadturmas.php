<?php

require "conect.php";

$nomeescola = $_POST['nomeescola'];
$nometurma = $_POST['nometurma'];
$anoletivo = $_POST['anoletivo'];


$sql = mysqli_query($con, "SELECT * FROM turma WHERE nomeescola =  '$nomeescola' AND nometurma = '$nometurma' AND anoletivo = '$anoletivo' ");

if (mysqli_num_rows($sql)>0) {

    echo "<script>alert('Esta Turma já está Cadastrada no sistema!');window.location.href = '../cadturmas.php';</script>";

}else{


    $sql = "INSERT INTO turma (nomeescola, nometurma, anoletivo) VALUES ('$nomeescola', '$nometurma', '$anoletivo')";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Registro Salvo com Sucesso!');window.location.href = '../cadturmas.php';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>