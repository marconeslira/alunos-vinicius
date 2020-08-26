<?php

require "conect.php";
$idturma = $_POST['idturma'];
$nomeescola = $_POST['nomeescola'];
$nometurma = $_POST['nometurma'];
$anoletivo = $_POST['anoletivo'];


    $up = "UPDATE turma SET nomeescola='$nomeescola', nometurma='$nometurma', anoletivo='$anoletivo' WHERE idturma='$idturma'";
    $res = mysqli_query($con, $up);

if (mysqli_query($con, $up)) {
    echo "<script>alert('Dados Atualizados com Sucesso!');window.location.href = '../cadturmas.php';</script>";
} else {
      echo "Error: " . $up . "<br>" . mysqli_error($con);
}

?>