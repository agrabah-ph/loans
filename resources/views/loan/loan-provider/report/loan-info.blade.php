@extends('loan.master')

@section('title', 'Loan Info')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>@yield('title')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="\">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>@yield('title')</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
{{--                <a href="#" class="btn btn-primary">This is action area</a>--}}
            </div>
        </div>
    </div>

    <div id="app" class="wrapper wrapper-content">

        <div class="row">

            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <h2><strong>{{ $data->product->name }}</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt><small>Status:</small></dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        @switch($data->status)
                                            @case('Active')
                                            <dd class="mb-1"><span class="label label-primary">{{ $data->status }}</span></dd>
                                            @break
                                            @case('Cancelled')
                                            <dd class="mb-1"><span class="label label-danger">{{ $data->status }}</span></dd>
                                            @break
                                            @case('Completed')
                                            <dd class="mb-1"><span class="label label-success">{{ $data->status }}</span></dd>
                                            @break
                                            @case('Declined')
                                            <dd class="mb-1"><span class="label label-warning">{{ $data->status }}</span></dd>
                                            @break
                                            @case('Pending')
                                            <dd class="mb-1"><span class="label label-info">{{ $data->status }}</span></dd>
                                            @break
                                        @endswitch
                                    </div>
                                </dl>
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt><small>Amount:</small></dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1">{{ number_format($data->amount, 2) }}</dd>
                                    </div>
                                </dl>
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt><small>Tenure:</small></dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1"> {{ $data->duration }}
                                        @switch($data->timing)
                                        @case('day')
                                            day/s
                                        @break
                                        @case('week')
                                            week/s
                                        @break
                                        @case('monthly')
                                            month/s
                                        @break
                                        @endswitch
                                        </dd>
                                    </div>
                                </dl>
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt><small>Interest:</small></dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd>{{ $data->interest_rate }}%</dd>
                                    </div>
                                </dl>
{{--                                <dl class="row mb-0">--}}
{{--                                    <div class="col-sm-4 text-sm-right">--}}
{{--                                        <dt><small>Total Amount:</small></dt>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-8 text-sm-left">--}}
{{--                                        <dd class="mb-1"> {{ $data->interest_rate }}</dd>--}}
{{--                                    </div>--}}
{{--                                </dl>--}}

                            </div>
                            <div class="col-lg-6" id="cluster_info">

                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt><small>Updated at:</small></dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1">{{ \Carbon\Carbon::parse($data->updated_at)->diffForHumans() }}</dd>
                                    </div>
                                </dl>
                                <dl class="row mb-0">
                                    <div class="col-sm-4 text-sm-right">
                                        <dt><small>Created at:</small></dt>
                                    </div>
                                    <div class="col-sm-8 text-sm-left">
                                        <dd class="mb-1"> {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <dl class="row mb-0">--}}
{{--                                    <div class="col-sm-2 text-sm-right">--}}
{{--                                        <dt>Completed:</dt>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-10 text-sm-left">--}}
{{--                                        <dd>--}}
{{--                                            <div class="progress m-b-1">--}}
{{--                                                <div style="width: 60%;" class="progress-bar progress-bar-striped progress-bar-animated"></div>--}}
{{--                                            </div>--}}
{{--                                            <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>--}}
{{--                                        </dd>--}}
{{--                                    </div>--}}
{{--                                </dl>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="contact-box pb-1">
{{--                    <h3>Borrower Info</h3>--}}
                    <a class="row" href="profile.html">
                        <div class="col-4">
                            <div class="text-center">
                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="{!! $data->borrower->profile->image !!}">
                                <div class="m-t-xs font-bold">{!! ($data->borrower->community_leader == 0) ? 'Farmer':'Community Leader' !!}</div>
                            </div>
                        </div>
                        <div class="col-8">
                            <h3><strong>{{ $data->borrower->profile->first_name }} {{ $data->borrower->profile->last_name }}</strong></h3>
                            <p><i class="fa fa-mobile-phone"></i> {{ $data->borrower->profile->mobile }}</p>
                            <address>
                                {{ $data->borrower->profile->secondary_info[0][2] }}
                            </address>
                            <dl>
                                <dt><small>Total Loans:</small> {{ $borrower->loans_count }}</dt>
                            </dl>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col">
                                <h2>Payments Schedule</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Due Date</th>
                                            <th>Amount</th>
                                            <th>Amount Paid</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data->payment_schedules as $sched)
                                            <tr>
                                                <td>{{ $sched->due_date }}</td>
                                                <td>{{ $sched->payable_amount }}</td>
                                                <td>{{ $sched->paid_amount }}</td>
                                                <td>{{ $sched->status }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col">
                                <h2>Payments</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Payment Method</th>
                                            <th>Reference No.</th>
                                            <th>Amount Paid</th>
                                            <th>Date of Payment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data->payments as $payment)
                                            <tr>
                                                <td>{{ $payment->payment_method }}</td>
                                                <td>{{ $payment->reference_number }}</td>
                                                <td>{{ number_format($payment->paid_amount, 2) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($payment->paid_date)->toFormattedDateString() }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="modal inmodal fade" id="modal" data-type="" tabindex="-1" role="dialog" aria-hidden="true" data-category="" data-variant="" data-bal="">
        <div id="modal-size">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save-btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    {{--{!! Html::style('') !!}--}}
    {{--    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
    {{--    {!! Html::style('/css/template/plugins/sweetalert/sweetalert.css') !!}--}}
@endsection

@section('scripts')
    {{--    {!! Html::script('') !!}--}}
    {{--    {!! Html::script(asset('vendor/datatables/buttons.server-side.js')) !!}--}}
    {{--    {!! $dataTable->scripts() !!}--}}
    {{--    {!! Html::script('/js/template/plugins/sweetalert/sweetalert.min.js') !!}--}}
    {{--    {!! Html::script('/js/template/moment.js') !!}--}}
    <script>
        $(document).ready(function(){
            {{--var modal = $('#modal');--}}
            {{--$(document).on('click', '', function(){--}}
            {{--    modal.modal({backdrop: 'static', keyboard: false});--}}
            {{--    modal.modal('toggle');--}}
            {{--});--}}

            {{-- var table = $('#table').DataTable({--}}
            {{--     processing: true,--}}
            {{--     serverSide: true,--}}
            {{--     ajax: {--}}
            {{--         url: '{!! route('') !!}',--}}
            {{--         data: function (d) {--}}
            {{--             d.branch_id = '';--}}
            {{--         }--}}
            {{--     },--}}
            {{--     columnDefs: [--}}
            {{--         { className: "text-right", "targets": [ 0 ] }--}}
            {{--     ],--}}
            {{--     columns: [--}}
            {{--         { data: 'name', name: 'name' },--}}
            {{--         { data: 'action', name: 'action' }--}}
            {{--     ]--}}
            {{-- });--}}

            {{--table.ajax.reload();--}}

        });
    </script>
@endsection
