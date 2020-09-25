<?php

require "conect.php";
$id = $_GET['id'];

//buscando o nome da escola
$sql1 = mysqli_query($con, "SELECT nomeescola FROM escola WHERE idescola = '$id'");
while ($row_esc = mysqli_fetch_assoc($sql1)) {
    $nomeescola = $row_esc["nomeescola"];}

//verificando se existe alunos e/ou turmas cadastradas para a escola antes de excluir
$sql = mysqli_query($con, "SELECT * FROM aluno WHERE escolaaluno = '$nomeescola'");
$sql2 = mysqli_query($con, "SELECT * FROM turma WHERE nomeescola = '$nomeescola'");

if ((mysqli_num_rows($sql)>0) || (mysqli_num_rows($sql2)>0)  )  {

    echo "<script>alert('Esta Escola não pode ser Excluída porque existem alunos e/ou turmas cadastrados!');window.location.href = '../cadescolas.php';</script>";

} else {
//caso não haja alunos ou turmas exclui
$del = "DELETE FROM escola WHERE idescola='$id'";
$res = mysqli_query($con, $del);

}

if (mysqli_query($con, $del)) {

    echo "<script>alert('Registro Excluído com Sucesso!');window.location.href = '../cadescolas.php';</script>";

} else {

      echo "Error: " . $del . "<br>" . mysqli_error($con);
}
?>