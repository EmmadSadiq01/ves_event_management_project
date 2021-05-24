 
<?php include 'db_connect.php' ?>
<style>
   
</style> 

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <?php echo "Welcome ". $_SESSION['login_name']."!"  ?>
                    <div id="chart_div" style="width: 800px; height: 500px;"></div> 
                    </div>
                    
                </div>
            </div>
	</div>

</div>
<script type="text/javascript">
                  google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Date', 'Booking','target'],
          <?php
              $sql = "SELECT * FROM bookings";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "['".$row["eventDate"]."', '".$row["bookingAmount"]."','".$row["advanceAmount"]."'],";
                }
              } else {
                echo "0 results";
              }
                ?>
                        
        ]);

        var materialOptions = {
          width: 900,
          chart: {
            title: 'Comparision of Target and Booking',
            subtitle: 'To show how much manager achive targets'
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'Booking'}, // Left y-axis.
              brightness: {side: 'right', label: 'Target'} // Right y-axis.
            }
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          // button.innerText = 'Change to Classic';
          // button.onclick = drawClassicChart;
        }

        drawMaterialChart();
    };
    </script>