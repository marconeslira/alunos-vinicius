<?php
require "../examples/back/fontkey.php";
require "../examples/back/conect.php";

$nomeescola1 = $_POST['nomeescola1'];
$nomeescola2 = $_POST['nomeescola2'];
$anoletivo = $_POST['anoletivo'];

//pega total de alunos de cada escola
$result_esc1 = "SELECT * FROM aluno WHERE escolaaluno = '$nomeescola1' AND anoletivoaluno = '$anoletivo'";
$res1 = mysqli_query($con, $result_esc1) or die(mysqli_error($con));
$qtd1 = mysqli_num_rows($res1);

$result_esc2 = "SELECT * FROM aluno WHERE escolaaluno = '$nomeescola2' AND anoletivoaluno = '$anoletivo'";
$res2 = mysqli_query($con, $result_esc2) or die(mysqli_error($con));
$qtd2 = mysqli_num_rows($res2);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gráfico por Escola</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Import dataTables.css-->
 <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

 <!--CHART 1 COD-->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
                 
          <?php
          
          
          //buscando quantidade de baixo peso
          $sql = "SELECT * FROM aluno WHERE estnutricional = 'Baixo Peso' AND escolaaluno = '$nomeescola1' AND anoletivoaluno = '$anoletivo'";
          $consulta = mysqli_query($con, $sql);
          $res = mysqli_num_rows($consulta);     
          
          //buscando quantidade de risco baixo peso
          $sql1 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco Baixo Peso' AND escolaaluno = '$nomeescola1' AND anoletivoaluno = '$anoletivo'";
          $consulta1 = mysqli_query($con, $sql1);
          $res1 = mysqli_num_rows($consulta1);  

          
          //buscando quantidade de Eutrófico
          $sql2 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico' AND escolaaluno = '$nomeescola1' AND anoletivoaluno = '$anoletivo'";
          $consulta2 = mysqli_query($con, $sql2);
          $res2 = mysqli_num_rows($consulta2); 

          //buscando quantidade de Obesidade
          $sql3 = "SELECT * FROM aluno WHERE estnutricional = 'Obesidade' AND escolaaluno = '$nomeescola1' AND anoletivoaluno = '$anoletivo'";
          $consulta3 = mysqli_query($con, $sql3);
          $res3 = mysqli_num_rows($consulta3); 

          //buscando quantidade de risco baixo peso
          $sql4 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco de Obesidade' AND escolaaluno = '$nomeescola1' AND anoletivoaluno = '$anoletivo'";
          $consulta4 = mysqli_query($con, $sql4);
          $res4 = mysqli_num_rows($consulta4);  
          ?>

           //EXIBINDO DADOS
           ['ano','2020'],
           ['Baixo Peso', <?php echo $res;?>],
           ['Risc. Baixo Peso', <?php echo $res1;?>],
           ['Eutrófico', <?php echo $res2;?>],
           ['Obesidade', <?php echo $res3;?>],
           ['Risc. Obesidade', <?php echo $res4;?>]
        ]);
        
        var options = {
          title: '<?php echo $nomeescola1?> - Total de Alunos: <?php echo $qtd1?> ',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
 <!--END CHART 1 COD-->

 <!--CHART 2 COD-->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
                 
          <?php
        
          
          //buscando quantidade de baixo peso
          $sql6 = "SELECT * FROM aluno WHERE estnutricional = 'Baixo Peso' AND escolaaluno = '$nomeescola2' AND anoletivoaluno = '$anoletivo'";
          $consulta6 = mysqli_query($con, $sql6);
          $res6 = mysqli_num_rows($consulta6);     
          
          //buscando quantidade de risco baixo peso
          $sql7 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco Baixo Peso' AND escolaaluno = '$nomeescola2' AND anoletivoaluno = '$anoletivo'";
          $consulta7 = mysqli_query($con, $sql7);
          $res7 = mysqli_num_rows($consulta7);  

          
          //buscando quantidade de Eutrófico
          $sql8 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico' AND escolaaluno = '$nomeescola2' AND anoletivoaluno = '$anoletivo'";
          $consulta8 = mysqli_query($con, $sql8);
          $res8 = mysqli_num_rows($consulta8); 

          //buscando quantidade de Obesidade
          $sql9 = "SELECT * FROM aluno WHERE estnutricional = 'Obesidade' AND escolaaluno = '$nomeescola2' AND anoletivoaluno = '$anoletivo'";
          $consulta9 = mysqli_query($con, $sql9);
          $res9 = mysqli_num_rows($consulta9); 

          //buscando quantidade de risco baixo peso
          $sql10 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco de Obesidade' AND escolaaluno = '$nomeescola2' AND anoletivoaluno = '$anoletivo'";
          $consulta10 = mysqli_query($con, $sql10);
          $res10 = mysqli_num_rows($consulta10);  
          ?>

           //EXIBINDO DADOS
           ['ano','2020'],
           ['Baixo Peso', <?php echo $res6;?>],
           ['Risc. Baixo Peso', <?php echo $res7;?>],
           ['Eutrófico', <?php echo $res8;?>],
           ['Obesidade', <?php echo $res9;?>],
           ['Risc. Obesidade', <?php echo $res10;?>]
        ]);
        
        var options = {
          title: '<?php echo $nomeescola2?> - Total de Alunos: <?php echo $qtd2?> ',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart.draw(data, options);
      }
    </script>
 <!--END CHART 2 COD-->

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secundary elevation-4">
    <!-- Brand Logo -->
    <a href="../../dash.php" class="brand-link">
      <img src="../../dist/img/vllogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">VL-Nutri</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) 
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

       Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
                <a href="../../dash.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Cadastrar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/cadescolas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Escolas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/cadturmas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Turmas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/cadalunos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alunos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Relatórios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/buscarelgeral.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Geral Alunos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/buscaporescola.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Escola</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/buscaporescolaeturma.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Turma</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Gráficos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/chartconsolidado.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consolidado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/chartporescola.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Escola</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/chartporescolaeturma.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Turma</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/chartcompescolas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comparativo por Escola</p>
                </a>
              </li>
            </ul>
            
          </li>
          <li class="nav-item">
                <a href="../examples/back/exit.php" class="nav-link">
                  <i class="far fas fa-power-off"></i>
                  <p>Sair</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4><strong>Gráficos Comparativos entre Escolas</strong></h4>
            <h5><strong>Ano Letivo: </strong><?php echo $anoletivo?></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../dash.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Gráfico Comparativo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- conteúdo -->
    <section class="content">
      
       <!-- CHAMADA CHART -->
       <div id="donutchart" style="width: 100%; height: 300px;"></div><hr>
       <div id="donutchart2" style="width: 100%; height: 300px;"></div>

    </section>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://dlirati.com.br" target="blank"> By: dlirati.com.br</a> - </strong> Direitos Reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="../../dist/js/funcoes.js"></script>
<!-- jQuery 
<script src="../../plugins/jquery/jquery.min.js"></script>-->

<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>