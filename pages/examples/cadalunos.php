<?php
require "back/conect.php";
//select for scholl
$result_esc = "SELECT * FROM escola order by nomeescola asc";
$resultado_esc = mysqli_query($con, $result_esc) or die(mysqli_error($con));
//select table registered
$result_cad = "SELECT * FROM aluno order by nomealuno asc";
$resultado_cad = mysqli_query($con, $result_cad) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CadAlunos</title>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dash.php" class="brand-link">
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="../../dash.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Início</p>
                </a>
              </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Cadastrar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./cadescolas.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Escolas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./cadturmas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Turmas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./cadalunos.php" class="nav-link active">
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
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consolidado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Escolas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Por Turma</p>
                </a>
              </li>
            </ul>
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
            <h1>Cadastro de Alunos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../dash.php">Início</a></li>
              <li class="breadcrumb-item active">Cadastro de Alunos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- conteúdo -->
    <section class="content">
      
      <div class="row"> <!-- inicio da linha 1 -->
        <div class="col-md-6"> <!--inicio da coluna 1 -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            
            </div>
            <form action="back/proccadalunos.php" method="POST" name="formulario">  <!--formulario inicio-->
            <div class="card-body">
              <div class="form-group">
                <label>* Escola</label>
                  <select name="escola" id="escolas" class="form-control select2" style="width: 100%;" required>
                    <option selected="selected">Selecione</option>
                    <?php
                        while ($row_esc = mysqli_fetch_assoc($resultado_esc)) {
                            $nomeescola = $row_esc["nomeescola"];
                    ?>
                        <option value="<?php echo $nomeescola; ?>"><?php echo $nomeescola; ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>* Turma</label>
                  <select id="turmas" style="display:none" name="turma" class="form-control select2" style="width: 100%;" required>         
                  </select>
              </div>
              <div class="form-group">
                <label for="inputName">* Nome do Aluno</label>
                <input type="text" id="aluno" name="nomealuno" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName">* Data Nascimento</label>
                <input type="date" id="dtnasc" name="dtnascimento" onblur="calcidade()" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName">Idade</label>
                <input type="text" id="compidade" name="idade" class="form-control" disabled >
              </div>
              <div class="form-group">
                <label>Sexo</label>
                  <select name="sexo" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Selecione</option>
                    <option>Masculino</option>
                    <option>Feminino</option>
                  </select>
              </div>
              </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6"> <!-- inicio da coluna 2 -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div> 
             <div class="card-body">
             <div class="form-group">
                <label for="inputName">Peso</label>
                <input type="text" id="peso" name="peso" class="form-control" onkeyup="substituiVirgula(this)">
              </div>
              <div class="form-group">
                <label for="inputName">Altura</label>
                <input type="text" id="altura" name="altura" onblur="calcimc()" class="form-control" onkeyup="substituiVirgula(this)">
              </div>
              <div class="form-group">
                <label for="inputName">IMC</label>
                <input disabled type="text" id="imc"  class="form-control" >
              </div>
              <div class="form-group">
                <label for="inputName">Percentil</label>
                <input type="text" id="percentil" name="percentil" class="form-control" onblur="calestnutri()">
              </div>
              <div class="form-group">
                <label for="inputName">Estado Nutricional</label>
                <input disabled type="text" id="estnutri"  class="form-control">
              </div>
              </div>

             </div>
          <div class="row"> <!-- botao salvar-->
              <div class="col-md-12">
                <input type="submit" value="salvar" class="btn btn-outline-primary float-right">
              </div>
           </div>
<!-- inicio da tabela cadastrados-->
      </div>
      <div class="col-md-12">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Alunos Cadastrados</h3>
            </div> 
            <div class="card-body">
              <table class="table table-striped" id="minhaTabela">
                  <thead class="bg-info">
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Escola</th>
                      <th scope="col">Turma</th>
                      <th scope="col">Peso</th>
                      <th scope="col">Altura</th>
                      <th scope="col">IMC</th>
                      <th scope="col">Est. Nutricional</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        while ($row_cad = mysqli_fetch_assoc($resultado_cad)) {
                            
                    ?>
                      <tr>
                        <td><?php echo $row_cad["nomealuno"];?></td>
                        <td><?php echo $row_cad["escolaaluno"];?></td>
                        <td><?php echo $row_cad["turmaaluno"];?></td>
                        <td><?php echo $row_cad["peso"];?></td>
                        <td><?php echo $row_cad["altura"];?></td>
                        <td><?php echo $row_cad["imc"];?></td>
                        <td><?php echo $row_cad["estnutricional"];?></td>
                        <td>
                        <a href="#" class="btn-sm btn-outline-info">Alterar</a>
                        <a href="#" class="btn-sm btn-outline-danger">Excluir</a>
                        </td>
                        
                      </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>   <!-- fim da tabela cadastrados -->
          </div>  
              </div>
          </div>
        </div>

      </div> <!--fim linha 1--> 

    </form>  <!--formulario fim-->
    </section>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="#"> By: SoftEncode.com</a> - </strong> Direitos Reservados.
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

<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>



</body>
</html>

