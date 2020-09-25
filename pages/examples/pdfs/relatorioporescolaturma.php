<?php
require "../back/fontkey.php";
require ('../back/conect.php');
require ('../FPDF/fpdf.php');

$anoletivo = $_POST['anoletivo'];
$nomeescola = $_POST['escola'];
$turmaaluno = $_POST['turma'];

//pega data atual do sistema
$data = Date("d/m/Y H:i:s");

//selecionando dados do BD
$sql = "SELECT * FROM aluno WHERE turmaaluno = '$turmaaluno' AND escolaaluno = '$nomeescola' AND anoletivoaluno = '$anoletivo' ORDER BY nomealuno";
$res = mysqli_query($con, $sql);
//$result = mysqli_fetch_assoc($res);

//instanciando o objeto da classe fpdf
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
//cabeçalho
$pdf->SetFont('Arial','B',12);
$pdf->Image('../../../dist/img/vllogomenu.png');
$pdf->Cell(150,10,utf8_decode('Secretaria Mun. de Educação da Lagoa dos Gatos - PE'),0,0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(20,2,utf8_decode('Usuário: '). $logado,0,1);
$pdf->Cell(134,3,'',0,0);
$pdf->Cell(20,10,'Impresso em: '. $data,0,1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(196,10,utf8_decode('Relatório de Alunos da ' . $nomeescola . ' - Turma: '.$turmaaluno . ' - Ano Letivo: ' . $anoletivo),'B',1);
$pdf->ln(5);

//cabeçalho da exibição de dados
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,8,utf8_decode('Nome do Aluno'),'B',0);
$pdf->Cell(12,8,utf8_decode('Idade'),'B',0);
$pdf->Cell(12,8,utf8_decode('Peso'),'B',0);
$pdf->Cell(15,8,utf8_decode('Altura'),'B',0);
$pdf->Cell(12,8,utf8_decode('IMC'),'B',0);
$pdf->Cell(20,8,utf8_decode('Percentil'),'B',0);
$pdf->Cell(50,8,utf8_decode('Est. Nutricional'),'B',1);

//laço de repetição para mostrar os dados encontrados
while ($result = mysqli_fetch_assoc($res)){

//mudança de tamanho de fonte
$pdf->SetFont('Arial','',10);
//inicio da apresentação dos dados
$pdf->Cell(60,8,utf8_decode($result['nomealuno']),0,0);
$pdf->Cell(12, 8,utf8_decode($result['idade']),0,0,'C');
$pdf->Cell(12, 8,utf8_decode($result['peso']),0,0,'C');
$pdf->Cell(15, 8,utf8_decode($result['altura']),0,0,'C');
$pdf->Cell(12, 8,utf8_decode($result['imc']),0,0,'C');
$pdf->Cell(20, 8,utf8_decode($result['percentil']),0,0);
$pdf->Cell(50, 8,utf8_decode($result['estnutricional']),0,0);
$pdf->Ln(5);
}
$pdf->Cell(196,4,'','B',1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,8,'TOTAIS:',0,1);

//EXIBINDO TOTAIS

//quantidade de Baixo Peso
$contando = "SELECT * FROM aluno WHERE estnutricional = 'Baixo Peso'  AND escolaaluno = '$nomeescola' AND turmaaluno = '$turmaaluno' AND anoletivoaluno = '$anoletivo'";
$rest = mysqli_query($con, $contando);
$cont1 = mysqli_num_rows($rest);
$pdf->Cell(30,10,'Baixo Peso: '.$cont1,0,0);

//quantidade Eutrófico/Risco de Baixo Peso
$contando = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco Baixo Peso'  AND escolaaluno = '$nomeescola' AND turmaaluno = '$turmaaluno' AND anoletivoaluno = '$anoletivo'";
$rest = mysqli_query($con, $contando);
$cont2 = mysqli_num_rows($rest);
$pdf->Cell(38,10,'Risc. Baixo Peso: '.$cont2,0,0);

//quantidade Eutrófico
$contando = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico'  AND escolaaluno = '$nomeescola' AND turmaaluno = '$turmaaluno' AND anoletivoaluno = '$anoletivo'";
$rest = mysqli_query($con, $contando);
$cont3 = mysqli_num_rows($rest);
$pdf->Cell(28,10,utf8_decode('Eutrófico: '.$cont3),0,0);

//quantidade obesidade
$contando = "SELECT * FROM aluno WHERE estnutricional = 'Obesidade'  AND escolaaluno = '$nomeescola' AND turmaaluno = '$turmaaluno' AND anoletivoaluno = '$anoletivo'";
$rest = mysqli_query($con, $contando);
$cont4 = mysqli_num_rows($rest);
$pdf->Cell(30,10,'Obesidade: '.$cont4,0,0);

//quantidade Eutrófico/Risco de Obesidade
$contando = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco de Obesidade'  AND escolaaluno = '$nomeescola' AND turmaaluno = '$turmaaluno' AND anoletivoaluno = '$anoletivo'";
$rest = mysqli_query($con, $contando);
$cont5 = mysqli_num_rows($rest);
$pdf->Cell(10,10,'Risc. Obesidade: '.$cont5,0,1);

$totalunos = ($cont1 + $cont2 + $cont3 + $cont4 + $cont5);

$pdf->Cell(10,10,'TOTAL DE ALUNOS: '.$totalunos,0,0);

$pdf->Output();
?>