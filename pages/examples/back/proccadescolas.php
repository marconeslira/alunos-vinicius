<?php

require "conect.php";

$nomeescola = $_POST['nomeescola'];


$sql = "INSERT INTO escola (nomeescola) VALUES ('$nomeescola')";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('Registro Salvo com Sucesso!');window.location.href = '../cadescolas.html';</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>