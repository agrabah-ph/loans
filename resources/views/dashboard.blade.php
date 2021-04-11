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
                        <div id="chartdiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        #chartdiv1 {
            width: 100%;
            height: 200px;
        }
        #chartdiv {
            width: 100%;
            height: 200px;
        }



    </style>
@endpush

@push('scripts')
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script>
        am4core.ready(function() {

// Themes begin
            am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
            chart.data = [{
                "year": "2021",
                "collection": 2025,
                "lineColor": chart.colors.next()
            }, {
                "year": "2020",
                "collection": 1882,
                "lineColor": chart.colors.next()
            }, {
                "year": "2019",
                "collection": 1809,
                "lineColor": chart.colors.next()
            }, {
                "year": "2018",
                "collection": 1322,
                "lineColor": chart.colors.next()
            },
            ];

// Create axes

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;

            categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
                if (target.dataItem && target.dataItem.index & 2 == 2) {
                    return dy + 25;
                }
                return dy;
            });

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;


// Themes begin
            am4core.useTheme(am4themes_animated);
// Themes end

            var chart1 = am4core.create("chartdiv1", am4charts.XYChart);

            var data = [];

            chart1.data = [{
                "year": "2014",
                "income": 23.5,
                "expenses": 21.1,

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
            }];

            var categoryAxis = chart1.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.ticks.template.disabled = true;
            categoryAxis.renderer.line.opacity = 0;
            categoryAxis.renderer.grid.template.disabled = true;
            categoryAxis.renderer.minGridDistance = 40;
            categoryAxis.dataFields.category = "year";
            categoryAxis.startLocation = 0.4;
            categoryAxis.endLocation = 0.6;


            var valueAxis = chart1.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;
            valueAxis.renderer.line.opacity = 0;
            valueAxis.renderer.ticks.template.disabled = true;
            valueAxis.min = 0;

            var lineSeries = chart1.series.push(new am4charts.LineSeries());
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

            chart1.cursor = new am4charts.XYCursor();
            chart1.cursor.behavior = "panX";
            chart1.cursor.lineX.opacity = 0;
            chart1.cursor.lineY.opacity = 0;

            chart1.scrollbarX = new am4core.Scrollbar();
            chart1.scrollbarX.parent = chart1.bottomAxesContainer;

        }); // end am4core.ready()
    </script>


@endpush
