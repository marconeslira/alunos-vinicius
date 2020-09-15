<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['','Baixo Peso', 'Risc. Baixo Peso', 'Eutrófico', 'Obesidade', 'Risc. Obesidade'],
         
          <?php
          require '../examples/back/conect.php';
          
          //buscando quantidade de baixo peso
          $sql = "SELECT * FROM aluno WHERE estnutricional = 'Baixo Peso'";
          $consulta = mysqli_query($con, $sql);
          $res = mysqli_num_rows($consulta);     
          
          //buscando quantidade de risco baixo peso
          $sql1 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco Baixo Peso'";
          $consulta1 = mysqli_query($con, $sql1);
          $res1 = mysqli_num_rows($consulta1);  

          
          //buscando quantidade de Eutrófico
          $sql2 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico'";
          $consulta2 = mysqli_query($con, $sql2);
          $res2 = mysqli_num_rows($consulta2); 

          //buscando quantidade de Obesidade
          $sql3 = "SELECT * FROM aluno WHERE estnutricional = 'Obesidade'";
          $consulta3 = mysqli_query($con, $sql3);
          $res3 = mysqli_num_rows($consulta3); 

          //buscando quantidade de risco baixo peso
          $sql4 = "SELECT * FROM aluno WHERE estnutricional = 'Eutrófico/Risco de Obesidade'";
          $consulta4 = mysqli_query($con, $sql4);
          $res4 = mysqli_num_rows($consulta4);  
          ?>

           //EXIBINDO DADOS
          ['2020', <?php echo $res;?>, <?php echo $res1;?>, <?php echo $res2;?>, <?php echo $res3;?>, <?php echo $res4;?>]
        ]);
        
        var options = {
          chart: {
            title: '',
            subtitle: '',
            
          },
          bars: 'vertical' // Required for Material Bar Charts.

          
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 800px; height: 350px;"></div>
  </body>
</html>
