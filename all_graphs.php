<?php include 'db_connect.php' ?>
<style>
    #tcashout {
        border: 1px solid;
        background-color: #8773c1;
        color: #fff;
    }
    #tcashin {
        border: 1px solid;
        background-color: #8773c1;
        color: #fff;
    }
    #bvst {
        /* border: 1px solid; */
        margin-top: 20px;
        box-shadow: 5px 5px 8px #888888;
        height: 450px;
        width: 100%;
    }

    div.cashoutcard {
        width:49%;
        margin-top: 20px;
        box-shadow: 5px 5px 8px #888888;
        text-align: center;
        float:Left;
    }

    div.cashoutheader {
        background-color: #8773c1;
        color: white;
        padding: 10px;
        font-size: 40px;
        width: 100%;
        height: 400px;
    }

    div.cashoutcontainer {
        padding: 10px;
        font-weight: 600;
        font-size: 18px;
    }
</style>

<script>
    window.onload = function () {
        var date = new Date();
        var month = parseInt(date.getMonth()) + 1;
        var sel = "0" + month;
        document.getElementById('year').selectedIndex = sel;

        var n = date.getFullYear();

        var year = n + "-" + sel;
        if (year != '') {
            load_monthwise_data(year, 'Month Wise Booking VS Target Data Evening Hall-Portion A For');
            load_monthwise_data2(year, 'Month Wise Booking VS Target Data Evening Hall-Portion B For');
            load_monthwise_data3(year, 'Month Wise Cashout Data For');
            load_monthwise_data4(year, 'Month Wise Cashin Data For');
            load_totalcashout(year, 'Month Wisetotal Cashout Data For');
            load_totalcashin(year, 'Month Wisetotal Cashin Data For');
        }


    };

    $(document).ready(function () {

        var d = new Date();
        var n = d.getFullYear();

        $('#year').change(function () {
            var r = $(this).val();
            var year = n + "-" + r;
            if (year != '') {
                load_monthwise_data(year, 'Month Wise Booking VS Target Data Evening Hall-Portion A For');
                load_monthwise_data2(year, 'Month Wise Booking VS Target Data Evening Hall-Portion Data B For');
                load_monthwise_data3(year, 'Month Wise Cashout Data For');
                load_monthwise_data4(year, 'Month Wise Cashin Data For');
                load_totalcashout(year, 'Month Wise total Cashout Data For');
                load_totalcashin(year, 'Month Wise total Cashin Data For');
            }
        });

    });

</script>
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
                            <h4 class="panel-title">Month Wise Data Shows In Graph</h4>
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
                    <div id="bvst">
                        <div id="chart_area" style="width: 50%; height: 400px; float:Left; padding-right:5px"></div>
                        <div id="chart_area2" style="width: 50%; height: 400px; float:Left;"></div>
                    </div>
                    <div class="cashoutcard" style="margin-right:10px;">
                        <div class="cashoutheader" id="piechartcashout"></div>
                        <div class="cashoutcontainer">
                            Total Cashout<p id="tcashout"></p>
                        </div>
                    </div>
                    <div class="cashoutcard">
                        <div class="cashoutheader" id="piechartcashin"></div>
                        <div class="cashoutcontainer">
                            Total Profit<p id="tcashin"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { packages: ['corechart'] });
        google.charts.setOnLoadCallback();

        function load_monthwise_data(year, title) {
            var temp_title = title + ' ' + year + '';
            $.ajax({
                url: "graph/bookvstarget_AE.php",
                method: "POST",
                data: { year: year },
                dataType: "JSON",
                success: function (data) {
                    drawMonthwiseChart(data, temp_title);
                }
            });
        }

        function drawMonthwiseChart(chart_data, chart_main_title) {
            var jsonData = chart_data;
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Booking');
            data.addColumn('number', 'target');
            $.each(jsonData, function (i, jsonData) {
                var month = jsonData.month;
                var booking = parseFloat($.trim(jsonData.booking));
                var target = parseFloat($.trim(jsonData.target));
                data.addRows([[month, booking, target]]);
            });
            var options = {
                title: chart_main_title,
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

        function load_monthwise_data2(year, title) {
            var temp_title = title + ' ' + year + '';
            $.ajax({
                url: "graph/bookvstarget_BE.php",
                method: "POST",
                data: { year: year },
                dataType: "JSON",
                success: function (data) {
                    drawMonthwiseChart2(data, temp_title);
                }
            });
        }

        function drawMonthwiseChart2(chart_data2, chart_main_title2) {
            var jsonData2 = chart_data2;
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Month');
            data2.addColumn('number', 'Booking');
            data2.addColumn('number', 'target');
            $.each(jsonData2, function (i, jsonData2) {
                var month = jsonData2.month;
                var booking = parseFloat($.trim(jsonData2.booking));
                var target = parseFloat($.trim(jsonData2.target));
                data2.addRows([[month, booking, target]]);
            });
            var options2 = {
                title: chart_main_title2,

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

        function load_monthwise_data3(year, title) {
            var temp_title = title + ' ' + year + '';
            $.ajax({
                url: "graph/cashout.php",
                method: "POST",
                data: { year: year },
                dataType: "JSON",
                success: function (data) {
                    drawMonthwiseChart3(data, temp_title);
                }
            });
        }

        function drawMonthwiseChart3(chart_data3, chart_main_title3) {
            var jsonData3 = chart_data3;
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Name');
            data3.addColumn('number', 'Amount');
            $.each(jsonData3, function (i, jsonData3) {
                var name = jsonData3.name;
                var amount = parseFloat($.trim(jsonData3.amount));
                data3.addRows([[name, amount]]);
            });
            var options3 = {
                title: chart_main_title3,
                pieHole: 0.2,
            };
            var chart3 = new google.visualization.PieChart(document.getElementById('piechartcashout'));
            chart3.draw(data3, options3);
        }
        //-----cashin

        function load_monthwise_data4(year, title) {
            var temp_title = title + ' ' + year + '';
            $.ajax({
                url: "graph/cashin.php",
                method: "POST",
                data: { year: year },
                dataType: "JSON",
                success: function (data) {
                    drawMonthwiseChart4(data, temp_title);
                }
            });
        }

        function drawMonthwiseChart4(chart_data4, chart_main_title4) {
            var jsonData4 = chart_data4;
            var data4 = new google.visualization.DataTable();
            data4.addColumn('string', 'Month');
            data4.addColumn('number', 'Cash In');
            data4.addColumn('number', 'Cash out');
            $.each(jsonData4, function (i, jsonData4) {
                var month = jsonData4.month;
                var cashinamount = parseFloat($.trim(jsonData4.cashinamount));
                var cashoutamount = parseFloat($.trim(jsonData4.cashoutamount));
                data4.addRows([[month, cashinamount, cashoutamount]]);
            });
            var options4 = {
                title: chart_main_title4,
                isStacked: true,
                hAxis: {
                    title: "Date"
                },
                vAxis: {
                    title: 'Amount'
                },
            };
            var chart4 = new google.visualization.ColumnChart(document.getElementById('piechartcashin'));
            chart4.draw(data4, options4);
        }
        //-----end cashin
        function load_totalcashout(year) {
            // var temp_title = title + ' ' + year + '';
            $.ajax({
                url: "graph/totalcashout.php",
                method: "POST",
                data: { year: year },
                dataType: "JSON",
                success: function (data) {
                    document.getElementById('tcashout').innerHTML = data[0].amount;
                    // (data, temp_title);
                }
            });
        }
        //---total profit
        function load_totalcashin(year) {
            // var temp_title = title + ' ' + year + '';
            $.ajax({
                url: "graph/totalcashin.php",
                method: "POST",
                data: { year: year },
                dataType: "JSON",
                success: function (data) {
                    x = data[0].amount;
                    y = document.getElementById('tcashout').innerHTML;
                    z = x-y;
                    document.getElementById('tcashin').innerHTML = z;
                }
            });
        }
    </script>