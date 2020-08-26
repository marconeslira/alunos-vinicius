<?php

require "conect.php";

$nomeescola = $_POST['nomeescola'];


$sql = mysqli_query($con, "SELECT * FROM escola WHERE nomeescola =  '$nomeescola'");

if (mysqli_num_rows($sql)>0) {

    echo "<script>alert('Esta Escola já tem cadastro no sistema!');window.location.href = '../cadescolas.php';</script>";

} else {

$sql = "INSERT INTO escola (nomeescola) VALUES ('$nomeescola')";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Registro Salvo com Sucesso!');window.location.href = '../cadescolas.php';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>