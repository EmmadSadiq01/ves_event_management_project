 

<style>

</style> 

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
     <div class="container">  

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="panel-title">Month Wise MonyIn & MonyOut Data</h3>
                        </div>
                        <div class="col-md-3">
                        <select name="year" class="form-control" id="year">
                                        <option value="">Select Month of current year</option>
                                        <option value='01'>January</option>
                                        <option value='02'>February</option>
                                        <option value='03'>March</option>
                                        <option value='04'>April</option>
                                        <option value='05'>May</option>
                                        <option value='06'>June</option>
                                        <option value='07'>July</option>
                                        <option value='08'>August</option>
                                        <option value='09'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                        </div>
                    </div>
                </div>
                <div id="showcase"></div>
                <div class="panel-body">
                <div id="piechart" style="width: 550px; height: 400px; float:Left;"></div>
                </div>
        </div>
        </div>  
	    </div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});  
    google.charts.setOnLoadCallback();  
    
function load_monthwise_Piedata(year, title)
{
    var temp_title = title + ' '+year+'';
    $.ajax({
        url:"graph/cashout.php",
        method:"POST",
        data:{year:year},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwisePieChart(data, temp_title);
        }
    });
}

function drawMonthwisePieChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('number', 'Amount');
    $.each(jsonData, function(i, jsonData){
        var name = jsonData.name;
        var amount = parseFloat($.trim(jsonData.amount));
        data.addRows([[name, amount]]);
    });
    var options = {  
               title: 'Percentage of Cashout',
               pieHole: 0.2, 
 };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
    chart.draw(data, options); 
}
</script>

<script>
window.onload = function()
{
    var date = new Date();
    var month = parseInt(date.getMonth())+1;
    var sel = "0"+month;
    document.getElementById('year').selectedIndex = sel;

    var n = date.getFullYear();

        var year = n+"-"+sel;
        if(year != '')
        {
            load_monthwise_Piedata(year, 'Month Wise Cashout Data For');
        }

};

$(document).ready(function(){

    var d = new Date();
    var n = d.getFullYear();

    $('#year').change(function(){
        var r = $(this).val();
        var year = n+"-"+r;
        if(year != '')
        {
            load_monthwise_Piedata(year, 'Month Wise Cashout Data For');
        }
    });

});

</script>
