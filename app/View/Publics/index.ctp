    <?php //conexion 
      $conexion = mysqli_connect("localhost","root","","control_covid19");
      //if($conexion){ //echo "connected";}//
    ?>
    
    <!--chart gender-->
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart','bar']});
        google.charts.setOnLoadCallback(drawRightY);

        function drawRightY() {
            var data = google.visualization.arrayToDataTable([
            ['Género', 'Contagios'],
            <?php
            $sql = "SELECT gender, Count(*) as persons FROM patients GROUP BY gender";
            $fire = mysqli_query($conexion,$sql);
            while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['gender']."',".$result['persons']."],";
            }
            ?>
            ]);
            var materialOptions = {
                chart: {
                title: 'CASOS CONFIRMADOS POR GÉNERO',
                subtitle: ''
                }
            };
            var materialChart = new google.charts.Bar(document.getElementById('ChartGender'));
            materialChart.draw(data, materialOptions);
            }
    </script>
    <!--end charts gender-->

    <!--chart origin-->
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['origin', 'persons'],
            <?php
              $sql = "SELECT origin, Count(*) as persons FROM patients GROUP BY origin";
              $fire = mysqli_query($conexion,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['origin']."',".$result['persons']."],";
              }
              ?>
            ]);
          var options = {
            //title: 'CASOS CONFIRMADOS POR ORIGEN',
            is3D: true,
          };
          var chart = new google.visualization.PieChart(document.getElementById('ChartOrigin'));
          chart.draw(data, options);
        }
      </script>
    <!--end chart origin-->
    
    
    <!--chart ages-->
    <?php
      $cero_a_9 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) as persons FROM patients WHERE age BETWEEN '0' AND '9'"));
      $diez_a_19 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) as persons FROM patients WHERE age BETWEEN '10' AND '19'"));
      $veinte_a_39 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) as persons FROM patients WHERE age BETWEEN '20' AND '39'"));
      $masde_40 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT COUNT(*) as persons FROM patients WHERE age > '40'"));
      $prueba ="1";
    ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['', 'Contagios'],
          ['0 A 9 AÑOS', '<?php echo $cero_a_9['persons'];?>'], 
          ['10 A 19 AÑOS', '<?php echo $diez_a_19['persons'];?>'],
          ['20 A 39 AÑOS', '<?php echo $veinte_a_39['persons'];?>'],
          ['MÁS DE 40 AÑOS', '<?php echo $masde_40['persons'];?>']
          ]);

        var options = {
          title: 'CASOS CONFIRMADOS EDADES',
          legend: { position: 'none' },
          chart: { title: 'CASOS CONFIRMADOS EDADES',
                   subtitle: '' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };
        var chart = new google.charts.Bar(document.getElementById('ChartAges'));
        chart.draw(data, options);
      };
    </script>
    <!--end chart ages-->  

    <!--chart departments-->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Departamento', 'Contagios'],
          <?php
            $sql = "SELECT d.name_department as department, COUNT(*) as persons FROM departments d, patients p 
            WHERE p.department_id = d.id GROUP BY d.name_department ORDER BY persons desc";
            $fire = mysqli_query($conexion,$sql);
            while ($result = mysqli_fetch_assoc($fire)) {
              echo"['".$result['department']."',".$result['persons']."],";
            }
            ?>
          ]);
        var options = {
          title: 'CASOS CONFIRMADOS POR DEPARTAMENTO',
          legend: { position: 'none' },
          chart: { title: 'CASOS CONFIRMADOS POR DEPARTAMENTO',
                   subtitle: '' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Departamentos'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };
        var chart = new google.charts.Line(document.getElementById('lineChartdepartments'));
        chart.draw(data, options);
      };
    </script>
    <!--end chart -->

    <!--chart states-->
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Estado', 'persons'],
            <?php
              $sql = "SELECT s.title_state, COUNT(*) as persons FROM patients p, states s 
              WHERE p.state_id = s.id GROUP BY s.title_state";
              $fire = mysqli_query($conexion,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['title_state']."',".$result['persons']."],";
              }
              ?>
            ]);
          var options = {
            //title: 'CASOS CONFIRMADOS POR ESTADO',
            is3D: true,
          };
          var chart = new google.visualization.PieChart(document.getElementById('ChartStates'));
          chart.draw(data, options);
        }
      </script>
    <!--end chart states-->

    <!--chart forecasts-->
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Pronóstico', 'persons'],
            <?php
              $sql = "SELECT s.title_forecast, COUNT(*) as persons FROM forecasts f, forecast_states s, patients p  
              WHERE f.forecast_state_id = s.id AND f.patient_id = p.id GROUP BY s.title_forecast ORDER BY persons desc";
              $fire = mysqli_query($conexion,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['title_forecast']."',".$result['persons']."],";
              }
              ?>
            ]);
          var options = {
            //title: 'PRONÓSTICOS DE LOS PACIENTES',
            is3D: true,
          };
          var chart = new google.visualization.PieChart(document.getElementById('ChartForecasts'));
          chart.draw(data, options);
        }
      </script>
    <!--end chart forecasts-->

    <!-----------------------------------------Pruebas de graficas-------------------------------------------------------------------->
 <!--chart origin-->


    <script type='text/javascript'>
     google.charts.load('current', {
       'packages': ['geochart'],
       // Note: Because markers require geocoding, you'll need a mapsApiKey.
       // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
       'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
     });
     google.charts.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
        var data = google.visualization.arrayToDataTable([
            ['location', 'VACUNADOS'],
            <?php
              $sql = "SELECT location, SUM(total_vaccinations) AS VACUNADOS FROM `centro_america` WHERE date<= DATE_SUB(NOW(), INTERVAL 6 month) GROUP BY location";
              $fire = mysqli_query($conexion,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['location']."',".$result['VACUNADOS']."],";
              }
              ?>
            ]);
        
            
 

            var options = {
            region: '013', // Centroamerica
            colorAxis: {colors: ['#f1b300']},
            // backgroundColor: '#81d4fa',
           datalessRegionColor: '#bbbfca',
           defaultColor: '#f5f5f5',
        };

      var chart = new google.visualization.GeoChart(document.getElementById('vacunados'));
      chart.draw(data, options);
    };
    </script>





 

<!--------------------------------GEO REFERENCIA------------------------------------------------------------------->
<script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['LUGAR',   'INFECTADOS'],
          <?php
              $sql = "SELECT location, SUM(total_cases) AS INFECTADOS FROM `centro_america` WHERE date<= DATE_SUB(NOW(), INTERVAL 1 MONTH) GROUP BY location";
              $fire = mysqli_query($conexion,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['location']."',".$result['INFECTADOS']."],";
              }
              ?>
        ]);

        var options = {
          region: '013', // Centroamerica
          colorAxis: {colors: ['#DF0101']},
         // backgroundColor: '#81d4fa',
          datalessRegionColor: '#bbbfca',
          defaultColor: '#f5f5f5',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('ChartPrueba2'));
        chart.draw(data, options);
      };
    </script>





<!-- BARRAS1 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
          var data = google.visualization.arrayToDataTable([
            ['location', 'Muertes'],
            <?php
            $sql ="SELECT location, SUM(new_deaths_smoothed) AS DEATHS FROM `centro_america` WHERE date<= DATE_SUB(NOW(), INTERVAL 1 YEAR) GROUP BY location";
            $fire = mysqli_query($conexion,$sql);
            while ($result = mysqli_fetch_assoc($fire)) {
              echo"['".$result['location']."',".$result['DEATHS']."],";
            }
            ?>
      
        ]);
        var options = {
          title : '',
          colors: ['#1F1E1F'],
          vAxis: {title: ''},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };
        var chart = new google.visualization.ComboChart(document.getElementById('MAsintomaticos'));
        chart.draw(data, options);
      }
    </script>


<!-- BARRAS2 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
          var data = google.visualization.arrayToDataTable([
            ['location','Asintomaticos'],
            <?php
            $sql ="SELECT location, SUM(new_cases_smoothed) AS ASINTOMATICOS FROM `centro_america` WHERE date<= DATE_SUB(NOW(), INTERVAL 1 YEAR) GROUP BY location";
            $fire = mysqli_query($conexion,$sql);
            while ($result = mysqli_fetch_assoc($fire)) {
              echo"['".$result['location']."',".$result['ASINTOMATICOS']."],";
            }
            ?>
      
        ]);
       
      
        var options = {
          title : '',
          colors: ['#FD6732'],
          vAxis: {title: ''},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {2: {type: 'line'}}
        };
        var chart = new google.visualization.ComboChart(document.getElementById('cifras'));
        chart.draw(data, options);
      }
    </script>

  <!-- ULTIMA GRAFICA -->



<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['location','Decesos'],
        <?php
            $sql ="SELECT location, SUM(new_deaths_smoothed) AS DEATHS FROM `centro_america` WHERE date<= DATE_SUB(NOW(), INTERVAL 1 YEAR) GROUP BY location";
            $fire = mysqli_query($conexion,$sql);
            while ($result = mysqli_fetch_assoc($fire)) {
              echo"['".$result['location']."',".$result['DEATHS']."],";
            }
            ?>
       
      ]);

      var options = {
        title: 'Decesos en los dos últimos años',
        colors: ['#1ED760'],
        chartArea: {width: '50%'},
        hAxis: {
          title: '',
          minValue: 0
        },
        vAxis: {
          title: 'PAISES'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('Deceso'));

      chart.draw(data, options);
    }
    </script>