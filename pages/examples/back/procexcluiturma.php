<?php

require "conect.php";
$id = $_GET['id'];

//buscando o nome da turma
$sql1 = mysqli_query($con, "SELECT nometurma FROM turma WHERE idturma = '$id'");
while ($row_tur2 = mysqli_fetch_assoc($sql1)) {
    $nometurma = $row_tur2["nometurma"];}

//verificando se existe alunos cadastrados para a turma antes de excluir
$sql = mysqli_query($con, "SELECT * FROM aluno WHERE turmaaluno = '$nometurma'");


if (mysqli_num_rows($sql)>0) {

    echo "<script>alert('Esta Turma não pode ser Excluída porque existem alunos cadastrados!');window.location.href = '../cadturmas.php';</script>";

} else {
//caso não haja alunos exclui
$del = "DELETE FROM turma WHERE idturma = '$id'";
$res = mysqli_query($con, $del);

}

if (mysqli_query($con, $del)) {

    echo "<script>alert('Registro Excluído com Sucesso!');window.location.href = '../cadturmas.php';</script>";

} else {

      echo "Error: " . $del . "<br>" . mysqli_error($con);
}
?>