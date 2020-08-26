<?php

require "conect.php";
$id = $_GET['id'];



$del = "DELETE FROM aluno WHERE idaluno='$id'";
$res = mysqli_query($con, $del);

if (mysqli_query($con, $del)) {

    echo "<script>alert('Registro Excluído com Sucesso!');window.location.href = '../cadalunos.php';</script>";

} else {

      echo "Error: " . $del . "<br>" . mysqli_error($con);
}
?>