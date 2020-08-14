<?php

require "conect.php";

$nomeescola = $_POST['nomeescola'];
$nometurma = $_POST['nometurma'];
$anoletivo = $_POST['anoletivo'];


$sql = "INSERT INTO turma (nomeescola, nometurma, anoletivo) VALUES ('$nomeescola', '$nometurma', '$anoletivo')";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Registro Salvo com Sucesso!');window.location.href = '../cadturmas.html';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>