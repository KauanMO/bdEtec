<?php $con = mysqli_connect("localhost", "root", "", "bdetec"); ?>

<html>
  <head>
    <meta charset="utf-8" />
    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
      var data = google.visualization.arrayToDataTable([

      ['Produtos','Quantidade'],
      <?php
      $query = "SELECT * from tbproduto";

      $exec = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($exec)) {
          echo "['" . $row["produto"] . "'," . $row["quantidade"] . "],";
      }
      ?>

      ]);

      var options = {
      title: 'Quantidade de produtos',
      backgroundColor: '#374050',
      legendTextStyle: { color: '#FFF' },
      titleTextStyle: { color: '#FFF' },
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data,options);
      }
    </script>
  </head>
  <body>
    <div class="container-fluid">
      <div id="piechart" style="width: 100%; height: 500px"></div>
    </div>

    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <div id="chart_div"></div>

    <script type="text/javascript">

      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawBasic);

      function drawBasic() {

            var data = google.visualization.arrayToDataTable([
              ['Produtos','Quantidade'],
       <?php
       $query = "SELECT * from tbproduto";

       $exec = mysqli_query($con, $query);
       while ($row = mysqli_fetch_array($exec)) {
           echo "['" . $row["produto"] . "'," . $row["quantidade"] . "],";
       }
       ?>

       ]);

            var options = {
              title: 'Quantidade de Produtos',
              chartArea: {width: '50%'},
              backgroundColor: '#374050',
              legendTextStyle: { color: '#FFF' },
              titleTextStyle: { color: '#FFF' },

              hAxis: {
                title: 'Total de produtos',
                minValue: 0,
                textStyle:{color: '#FFF'},
                legendTextStyle: { color: '#FFF' },
                titleTextStyle: { color: '#FFF' }
              },
              vAxis: {
                title: 'Produtos',
                textStyle:{color: '#FFF'},
                titleTextStyle: { color: '#FFF' },
              }
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, options);
          }
    </script>
  </body>
</html>