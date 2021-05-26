 
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
                    <div style="float:right;">
                        <select name="ddlContent" id="ddlContent" onchange="SelectedTextValue(this)">
                            <option selected="selected" value="">Select</option>
                            <option selected value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                        <input name="txtContent" type="hidden" id="txtContent" />
                    </div>
                    <div id="chart_div" style="width: 800px; height: 500px;"></div> 
                    </div>
                    
                </div>
            </div>
	</div>

</div>
<script type="text/javascript">
function SelectedTextValue(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent").value = selectedValue;
            }
            else {
        var d = new Date();
            var n = d.getMonth();
                document.getElementById("txtContent").value = n;
            }
        var my = document.getElementById("txtContent").value;

      }
        google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);
      function drawStuff() {
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Date', 'Booking','target'],
          <?php
              $sql = "SELECT * from bookings, bookingtarget where target_date AND eventDate Like '%_____05%'";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "['".$row["eventDate"]."', '".$row["bookingAmount"]."','".$row["target_price"]."'],";
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