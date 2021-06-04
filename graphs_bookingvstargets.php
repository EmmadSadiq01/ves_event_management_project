 
<?php include 'db_connect.php' ?>
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
                            <h3 class="panel-title">Month Wise Booking VS Target Data</h3>
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
                <div class="panel-body">
                <div id="chart_area" style="width: 550px; height: 400px; float:Left; padding-right:5px"></div>
                <div id="chart_area2" style="width: 550px; height: 400px; float:Left;"></div>
                </div>
        </div>
        </div>  
	    </div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback();

function load_monthwise_data(year, title)
{
    var temp_title = title + ' '+year+'';
    $.ajax({
        url:"graph/bookvstarget_AE.php",
        method:"POST",
        data:{year:year},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data, temp_title);
        }
    });
}

function drawMonthwiseChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Month');
    data.addColumn('number', 'Booking');
    data.addColumn('number', 'target');
    $.each(jsonData, function(i, jsonData){
        var month = jsonData.month;
        var booking = parseFloat($.trim(jsonData.booking));
        var target = parseFloat($.trim(jsonData.target));
        data.addRows([[month, booking, target]]);
    });
    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Date"
        },
        vAxis: {
            title: 'Amount'
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
    chart.draw(data, options);
}

function load_monthwise_data2(year, title)
{
    var temp_title = title + ' '+year+'';
    $.ajax({
        url:"graph/bookvstarget_BE.php",
        method:"POST",
        data:{year:year},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart2(data, temp_title);
        }
    });
}

function drawMonthwiseChart2(chart_data2, chart_main_title2)
{
    var jsonData2 = chart_data2;
    var data2 = new google.visualization.DataTable();
    data2.addColumn('string', 'Month');
    data2.addColumn('number', 'Booking');
    data2.addColumn('number', 'target');
    $.each(jsonData2, function(i, jsonData2){
        var month = jsonData2.month;
        var booking = parseFloat($.trim(jsonData2.booking));
        var target = parseFloat($.trim(jsonData2.target));
        data2.addRows([[month, booking, target]]);
    });
    var options2 = {
        title:chart_main_title2,
        
        hAxis: {
            title: "Date"
        },
        vAxis: {
            title: 'Amount'
        },
    };

    var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_area2'));
    chart2.draw(data2, options2);
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
            load_monthwise_data(year, 'Month Wise Booking VS Target Data Evening Hall-Portion A For');
            load_monthwise_data2(year, 'Month Wise Booking VS Target Data Evening Hall-Portion B For');
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
            load_monthwise_data(year, 'Month Wise Booking VS Target Data Evening Hall-Portion A For');
            load_monthwise_data2(year, 'Month Wise Booking VS Target Data Evening Hall-Portion Data B For');
        }
    });

});

</script>