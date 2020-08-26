<?php

require "conect.php";
$id = $_POST['idescola'];
$nomeescola = $_POST['nomeescola'];


$up = "UPDATE escola SET nomeescola='$nomeescola' WHERE idescola='$id'";
$res = mysqli_query($con, $up);

if (mysqli_query($con, $up)) {

    echo "<script>alert('Dados Atualizados com Sucesso!');window.location.href = '../cadescolas.php';</script>";

} else {

      echo "Error: " . $up . "<br>" . mysqli_error($con);
}
?>