<?php
require "back/fontkey.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curvas Percentil</title>
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
  <style>
    .conteiner{display: flex;flex-direction: row;justify-content: center;align-items: center}
    .box{width: 600px; height: 300px; margin-top: 5%; margin-left:4%; flex-direction: row;justify-content: center;align-items: center} 
    .box a{margin-left:5%; margin-right: 5%;}
    .titulo{text-align: center; margin-top: 5%;}
  </style>
</head>
<body>
<h2 class="titulo">Curvas de Percentis</h2><br>
<div class="conteiner">
    <div class="box">
        <a href="curvas/meninas0-5.pdf" target="blank" class="btn-lg btn-danger">Meninas: 0 - 5 Anos</a>
        <a href="curvas/meninas5-19.pdf" target="blank" class="btn-lg btn-danger">Meninas: 5 - 19 Anos</a>
        <br><br><br>
        <a href="curvas/meninos0-5.pdf" target="blank" class="btn-lg btn-primary">Meninos: 0 - 5 Anos</a>
        <a href="curvas/meninos5-19.pdf" target="blank" class="btn-lg btn-primary">Meninos: 5 - 19 Anos</a>
    </div>
</div>


<!-- ./wrapper -->

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>

</html>