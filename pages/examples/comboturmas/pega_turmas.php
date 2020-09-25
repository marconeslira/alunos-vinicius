<?php
require "../back/conect.php";

$result_turma = "SELECT * FROM turma WHERE nomeescola='".$_POST['id']."' ORDER BY anoletivo";
$resultado_turma = mysqli_query($con, $result_turma) or die(mysqli_error($con));



while ($row_turma = mysqli_fetch_assoc($resultado_turma)) {
$nometurma = $row_turma["nometurma"];
$anoletivo = $row_turma["anoletivo"];
?>
<option value="<?php echo $nometurma; ?>"><?php echo $nometurma . ' - '; echo $anoletivo ?></option>
<?php } ?>



?>