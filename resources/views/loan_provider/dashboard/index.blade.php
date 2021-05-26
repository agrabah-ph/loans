@extends('layouts.master-loan-provider')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        {{--<div class="row">--}}
            {{--<div class="col-8">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-6">--}}
                        {{--<div id="chartdiv1"></div>--}}
                    {{--</div>--}}
                    {{--<div class="col-6">--}}
                        {{--<div id="chartdiv2"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-4">--}}
                {{--<div class="card border-0" style="width: 18rem;">--}}
                    {{--<ul class="list-group list-group-flush">--}}
                        {{--<li class="list-group-item"><span class="stats-number">114</span> <span class="stats-label">New Loan Applications Today</span></li>--}}
                        {{--<li class="list-group-item"><span class="stats-number">114</span> <span class="stats-label">New Loan Applications Today</span></li>--}}
                        {{--<li class="list-group-item"><span class="stats-number">114</span> <span class="stats-label">New Loan Applications Today</span></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-8">--}}
            {{--<div id="datepicker" data-date="12/03/2012"></div>--}}
            {{--<input type="hidden" id="my_hidden_input">--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-6">
                        <div id='chartDiv1'></div>
                    </div>

                    <div class="col-6">
                        <div id="chartDiv2"></div>
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
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
    </script>
    <script>
    </script>
@endpush
