<?php
require "../back/conect.php";

$result_turma = "SELECT * FROM turma WHERE nomeescola='".$_POST['id']."'";
$resultado_turma = mysqli_query($con, $result_turma) or die(mysqli_error($con));



while ($row_turma = mysqli_fetch_assoc($resultado_turma)) {
$nometurma = $row_turma["nometurma"];
?>
<option value="<?php echo $nometurma; ?>"><?php echo $nometurma; ?></option>
<?php } ?>



?>