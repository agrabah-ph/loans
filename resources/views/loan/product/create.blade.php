@extends('loan.master')

@section('title', 'Loan Product Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>@yield('title')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index') }}">Lists</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>@yield('title')</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <button type="button" class="btn btn-primary btn-action" data-action="store">Store</button>
            </div>
        </div>
    </div>

    <div id="app" class="wrapper wrapper-content">
        {{--        {{ Form::open(array('route'=>array('farmer.store'), array('id'=>'form'))) }}--}}
        {{--        {{ Form::open(array('route'=>array('farmer.store'), 'method'=>'post', 'id'=>'form')) }}--}}

        {{ Form::open(['route'=>'products.store','id'=>'form']) }}
        @csrf
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Information
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Financial Production Name</label>
                                            {{ Form::text('name', null, array('class'=>'form-control','required')) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Financial Product Type</label>
                                            {{ Form::select('type', $types, null, array('class'=>'form-control')) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Product Description</label>
                                    <div class="summernote"></div>
                                </div>

                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control no-resize" style="resize: none"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Product Application Requirements</label>
                                    <textarea name="requirements" id="" cols="30" rows="5" class="form-control no-resize" style="resize: none"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disclosure</label>
                                    <textarea name="disclosure" id="disclosure" cols="30" rows="10"  class="form-control">LOAN APPLICATION AGREEMENT

                                        The borrower understand that this loan product is specifically made for seaweed farmers.
                                        Whereas :
                                        1. (Loan Provider) will lend twenty thousand pesos (P20,000).
                                        2. The loan will be used in growing the seaweed production.
                                        3. The loan duration is for the period of three (3) months with voluntary contribution of 3% fixed rate interest per month.
                                        4. Agrees and understand that the Disbursement and Collection of the said amount will be through Bank transfer, Cebuana Lhuillier, GCash or through Agrabah account.
                                    </textarea>
                                </div>




                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Loanable Amount</label>
                                            <input name="amount" id="amount" type="text" class="form-control money changeSchedule">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Loan Terms</label>
                                            <input name="duration" id="duration" type="text" data-mask="0#" class="form-control changeSchedule">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Interest Rate (%)</label>
                                            <input name="interest_rate" id="interest_rate" type="text"  class="form-control changeSchedule decimal">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="payment_schedule_input" id="payment_schedule_input">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Payment Schedules
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Timing</label>
                                            <select name="timing" id="timing" class="form-control changeSchedule">
                                                <option value="day">Day</option>
                                                <option value="week">Weeks</option>
                                                <option value="monthly" selected>Monthly</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Allowance</label>
                                                    <input name="allowance" id="allowance" type="text" data-mask="0#" value="1" class="form-control changeSchedule">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>1st Payment Allowance</label>
                                                    <input name="first_allowance" id="first_allowance" type="text" data-mask="0#" value="0" class="form-control changeSchedule">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row schedule_inputs">
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td>Assuming Approved Date</td>
                                                        <td class="text-right">{{now()->toFormattedDateString()}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Interest</td>
                                                        <td id="total_interest_amount" class="text-right">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agrabah Ventures Service Fee</td>
                                                        <td id="service_fee" class="text-right money">{{ loanServiceFee() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Payable Amount</td>
                                                        <td id="total_loan_amount" class="text-right">0</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Due Date</th>
                                                <th class="text-right">Amount</th>
                                                {{--                                <th class="text-right">Action</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody id="payment_schedule_review">
                                            <tr>
                                                <td colspan="99">--</td>
                                            </tr>
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

        {{ Form::close() }}

        <div class="modal inmodal fade" id="modal" data-type="" tabindex="-1" role="dialog" aria-hidden="true"
             data-category="" data-variant="" data-bal="">
            <div id="modal-size">
                <div class="modal-content">
                    <div class="modal-header" style="padding: 15px;">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                    class="sr-only">Close</span></button>
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
    </div>
@endsection


@section('styles')
    {!! Html::style('/css/template/plugins/iCheck/custom.css') !!}
    {!! Html::style('/css/template/plugins/summernote/summernote-bs4.css') !!}
    {{--{!! Html::style('') !!}--}}
    {{--    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
    {{--    {!! Html::style('/css/template/plugins/sweetalert/sweetalert.css') !!}--}}
@endsection

@section('scripts')
    {!! Html::script('/js/template/plugins/iCheck/icheck.min.js') !!}
    {!! Html::script('/js/template/plugins/summernote/summernote-bs4.js') !!}
{{--    {!! Html::script('/js/template/plugins/jqueryMask/jquery.mask.min.js') !!}--}}
    {!! Html::script('https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js') !!}
    {{--    {!! Html::script('') !!}--}}
    {{--    {!! Html::script(asset('vendor/datatables/buttons.server-side.js')) !!}--}}
    {{--    {!! $dataTable->scripts() !!}--}}
    {{--    {!! Html::script('/js/template/plugins/sweetalert/sweetalert.min.js') !!}--}}
    {{--    {!! Html::script('/js/template/moment.js') !!}--}}
    <script>
        Inputmask.extendAliases({
            pesos: {
                prefix: "₱ ",
                groupSeparator: ".",
                alias: "numeric",
                placeholder: "0",
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                clearMaskOnLostFocus: false
            },
            money: {
                prefix: "",
                groupSeparator: ".",
                alias: "numeric",
                placeholder: "0",
                autoGroup: true,
                digits: 2,
                digitsOptional: true,
                clearMaskOnLostFocus: false
            }
        });

        function numberWithCommas(x) {
            return parseFloat(x).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function populateSchedule() {
            var duration = $('#duration').val();
            var amount = $('#amount').val();
            var interest_rate = $('#interest_rate').val();
            var timing = $('#timing').val();
            var allowance = $('#allowance').val();
            var first_allowance = $('#first_allowance').val();
            var service_fee = $('#service_fee').text().split(",").join("");

            if(duration && interest_rate && amount){
                $.get('{!! route('generate-schedule') !!}', {
                    duration:duration,
                    amount:amount,
                    interest_rate:interest_rate,
                    timing:timing,
                    allowance:allowance,
                    first_allowance:first_allowance,
                }, function(data){
                    console.log(data);
                    var table = '';
                    var total = 0;
                    var loan_amount = amount.split(",").join("");
                    for (let i = 0; i < data.length; i++) {
                        const datum = data[i];
                        table +='<tr>';
                        table +='<td>';
                        table += datum.date;
                        table +='</td>'
                        table +='<td class="text-right">';
                        table += numberWithCommas(datum.amount);
                        table +='</td>';
                        table +='</tr>';
                        total += datum.amount;
                    }
                    var interest = total - loan_amount - service_fee;
                    $('#total_loan_amount').html(numberWithCommas(total));
                    $('#total_interest_amount').html(numberWithCommas(interest));
                    $('#payment_schedule_review').empty().append(table);
                    $('#payment_schedule_input').val(JSON.stringify(data))
                });
            }

        }

        $(document).on('change, input', '.changeSchedule', function () {
            populateSchedule();
        });

        $(document).ready(function () {
            $('.summernote').summernote();

            populateSchedule();
            // $('.money').mask("#,##0.00", {reverse: true});
            $(".money").inputmask({
                alias:"money"
            });
            $(".decimal").inputmask({
                alias: 'decimal',
                integerDigits:3,
                digits:3,
                allowMinus:false,
                digitsOptional: true,
                placeholder: "0"
            });


            $(document).on('click', '.btn-action', function () {
                switch ($(this).data('action')) {
                    case 'store':
                        $('#form').submit();

                        // console.log($('input[name=four_ps]').val());
                        // console.log($('input[name=pwd]').val());
                        // console.log($('input[name=indigenous]').val());
                        // console.log($('input[name=livelihood]').val());
                        break;
                }
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


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
