@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-6">
                        <div id="chartdiv1"></div>
                    </div>
                    <div class="col-6">
                        <div id="chartdiv2"></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-0" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="stats-number">114</span> <span class="stats-label">New Loan Applications Today</span></li>
                        <li class="list-group-item"><span class="stats-number">114</span> <span class="stats-label">New Loan Applications Today</span></li>
                        <li class="list-group-item"><span class="stats-number">114</span> <span class="stats-label">New Loan Applications Today</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div id="datepicker" data-date="12/03/2012"></div>
            <input type="hidden" id="my_hidden_input">
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        #chartdiv1 {
            width: 100%;
            height: 200px;
        }
        #chartdiv2 {
            width: 100%;
            height: 200px;
        }
        .stats-number{
            display: inline-block;
            font-weight: 800;
            color: #7F9BB6;
            width: 30%;
            font-size: 28px;
        }
        .stats-label{
            display: inline-block;
            width: 70%;
            float: right;
        }
        .datepicker-inline{
            width: 100%;
        }
        .datepicker-inline table{
            width: 100%;
        }
        .datepicker table td{
            height: 50px;
            border: 1px solid gainsboro;
            border-radius: 0;
        }
        .datepicker table tr:nth-child(2) th{
            background: #C3CEDB;
            color: #fff;
            border-radius: 0;
        }
        .datepicker table tr:nth-child(3) th{
            border:  1px solid gainsboro;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            moment.updateLocale('en', {
                weekdaysMin : ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
            });
            $('#datepicker').datepicker();
            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
            });
        });

    </script>
    <script>
        am4core.ready(function() {

// Themes begin
            am4core.useTheme(am4themes_animated);
// Themes end

            var chart = am4core.create("chartdiv1", am4charts.XYChart);

            var data = [];

            chart.data = [{
                "year": "2014",
                "income": 23.5,
                "expenses": 21.1,
                "lineColor": chart.colors.next()
            }, {
                "year": "2015",
                "income": 26.2,
                "expenses": 30.5
            }, {
                "year": "2016",
                "income": 30.1,
                "expenses": 34.9
            }, {
                "year": "2017",
                "income": 20.5,
                "expenses": 23.1
            }, {
                "year": "2018",
                "income": 30.6,
                "expenses": 28.2,
                "lineColor": chart.colors.next()
            }, {
                "year": "2019",
                "income": 34.1,
                "expenses": 31.9
            }, {
                "year": "2020",
                "income": 34.1,
                "expenses": 31.9
            }, {
                "year": "2021",
                "income": 34.1,
                "expenses": 31.9,
                "lineColor": chart.colors.next()
            }, {
                "year": "2022",
                "income": 34.1,
                "expenses": 31.9
            }, {
                "year": "2023",
                "income": 34.1,
                "expenses": 31.9
            }, {
                "year": "2024",
                "income": 34.1,
                "expenses": 31.9
            }];

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.ticks.template.disabled = true;
            categoryAxis.renderer.line.opacity = 0;
            categoryAxis.renderer.grid.template.disabled = true;
            categoryAxis.renderer.minGridDistance = 40;
            categoryAxis.dataFields.category = "year";
            categoryAxis.startLocation = 0.4;
            categoryAxis.endLocation = 0.6;


            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;
            valueAxis.renderer.line.opacity = 0;
            valueAxis.renderer.ticks.template.disabled = true;
            valueAxis.min = 0;

            var lineSeries = chart.series.push(new am4charts.LineSeries());
            lineSeries.dataFields.categoryX = "year";
            lineSeries.dataFields.valueY = "income";
            lineSeries.tooltipText = "income: {valueY.value}";
            lineSeries.fillOpacity = 0.5;
            lineSeries.strokeWidth = 3;
            lineSeries.propertyFields.stroke = "lineColor";
            lineSeries.propertyFields.fill = "lineColor";

            var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
            bullet.circle.radius = 6;
            bullet.circle.fill = am4core.color("#fff");
            bullet.circle.strokeWidth = 3;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "panX";
            chart.cursor.lineX.opacity = 0;
            chart.cursor.lineY.opacity = 0;

            chart.scrollbarX = new am4core.Scrollbar();
            chart.scrollbarX.parent = chart.bottomAxesContainer;

        }); // end am4core.ready()
    </script>
    <script>
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart2 = am4core.create("chartdiv2", am4charts.XYChart);

            // Add data
            chart2.data = [{
                "country": "Cam Sur",
                "visits": 2025
            }, {
                "country": "Albay",
                "visits": 1882
            }, {
                "country": "Cam Norte",
                "visits": 1809
            }];

            // Create axes

            var categoryAxis = chart2.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;

            categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                if (target.dataItem && target.dataItem.index & 2 == 2) {
                    return dy + 25;
                }
                return dy;
            });

            var valueAxis2 = chart2.yAxes.push(new am4charts.ValueAxis());

            // Create series
            var series = chart2.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;

        }); // end am4core.ready()
    </script>
@endpush
