@extends('loan.master')

@section('title', 'Loan Products')

@section('styles')

    <style>
        @media (max-width: 500px) {
            .template-loan table td {
                white-space: nowrap;
                min-width: 150px;
            }
        }
    </style>

@endsection

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-6">
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
        <div class="col-sm-6">
            {{--            <div class="title-action">--}}
            {{--                <a href="#" class="btn btn-primary">This is action area</a>--}}
            {{--            </div>--}}
        </div>
    </div>

    <div id="app" class="wrapper wrapper-content product-list-container">

        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="col-form-label" for="status">Loan Type</label>
                        <select name="type" class="form-control loan_input">
                            <option value="" selected>Select type</option>
                            @foreach($loanTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <span id="term_value" class="float-right mt-2"></span>
                        <label class="col-form-label" for="product_name">Loan Term</label>
                        <div id="term_slider"></div>
                        {{--                        <input type="range" name="term" min="4" max="60" value="4" placeholder="How many months?" class="form-control loan_input">--}}
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <span id="amount_value" class="float-right mt-2"></span>
                        <label class="col-form-label" for="price">Loanable Amount</label>
                        <div id="amount_slider"></div>
                        {{--                        <input type="range" name="amount"  value="" placeholder="Enter Amount" class="form-control money loan_input">--}}
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <div class="loan-product-list project-list">
                                <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            {{--                                        <th></th>--}}
                                            <th>Loan Product Name</th>
                                            <th>Lending Partner</th>
                                            <th>Interest</th>
                                            <th>Term</th>
                                            <th class="text-right">Max Loan Amount</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="project-title">
                                                <a href="project_detail.html">Contract with Zender Company</a>
                                                <br/>
                                                <small>Created 14.08.2014</small>
                                            </td>
                                            <td>Interest</td>
                                            <td>Terms</td>
                                            <td>Amount</td>
                                            <td class="project-actions">
                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View
                                                </a>
                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit
                                                </a>
                                            </td>
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

    <div class="modal inmodal fade product-list-container" id="modal" data-type="" tabindex="-1" role="dialog" aria-hidden="true" data-category="" data-variant="" data-bal="">
        <div id="modal-size">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                    <div class="ibox product-detail">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="text-center">
                                        <img src="{{ asset('/images/logo-2.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-lg-7 align-self-center">
                                    <div class="text-center">
                                        <div class="m-t-md">
                                            <h1 class="font-bold m-b-xs text-uppercase text-success">Agrabah Lending</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5 ">
                                    <div class="text-center">
                                        <div class="m-t-md">
                                            <h2 class="font-bold text-success mb-0">20,000.00</h2>
                                            <small>Loanable Amount</small>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col">
                                            <dl class="small m-t-md text-center">
                                                <dt>Terms</dt>
                                                <dd>3 months</dd>
                                            </dl>
                                        </div>
                                        <div class="col">
                                            <dl class="small m-t-md text-center">
                                                <dt>Interest rate</dt>
                                                <dd>7.5%</dd>
                                            </dl>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <dl class="small m-t-md text-center">
                                                <dt>Amortization Rate</dt>
                                                <dd>7,166.67</dd>
                                            </dl>
                                        </div>
                                        <div class="col">
                                            <dl class="small m-t-md text-center">
                                                <dt>Amortization Type</dt>
                                                <dd>Monthly</dd>
                                            </dl>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary">
                                        <div class="panel-body text-center">
                                            <div class="m-t-md">
                                                <h2 class="font-bold text-info mb-0">20,000.00</h2>
                                                <small>Interest</small>
                                            </div>
                                            <div class="m-t-md">
                                                <h2 class="font-bold text-info mb-0">20,000.00</h2>
                                                <small>Agrabah Ventures Service Fee</small>
                                            </div>
                                            <div class="m-t-md">
                                                <h2 class="font-bold text-info mb-0">20,000.00</h2>
                                                <small>Total Payable Amount</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">Seaweed Production Loan</h2>
                                    <small>Short Loan</small>

                                    <div class="hr-line-solid"></div>

                                    <h4>Description</h4>
                                    <div class="small text-muted mb-2">
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                    </div>

                                    <h4>Requirements</h4>
                                    <div class="small text-muted mb-2">
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                    </div>

                                    <hr>

                                    <h4>Payment method</h4>
                                    <dd class="project-people mb-1">
                                        <span class="badge badge-primary">Manual</span>
                                        <span class="badge badge-primary">GCash</span>
                                        <span class="badge badge-primary">Palawan</span>
                                        <span class="badge badge-primary">Bank</span>
                                    </dd>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save-btn">Apply</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade product-list-container" id="application_modal" data-type="" tabindex="-1" role="dialog" aria-hidden="true"
         data-category="" data-variant="" data-bal="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{route('loan-submit-form')}}" method="post">
                <input type="hidden" name="id" id="loan_submit_id">
                @csrf
                <div class="modal-header" style="padding: 15px;">
                    <h4 class="modal-title">Loan Application Form</h4>
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <pre class="d-none">{{json_encode($farmer, 128)}}</pre>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>First name</label>
                                {{ Form::text('first_name', $farmer->profile->first_name, array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Middle name</label>
                                {{ Form::text('middle_name', $farmer->profile->middle_name, array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Last name</label>
                                {{ Form::text('last_name', $farmer->profile->last_name, array('class'=>'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                {{ Form::text('dob', $farmer->profile->dob, array('class'=>'form-control datepicker')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Place of Birth</label>
                                {{ Form::text('pob', $farmer->profile->pob, array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Gender</label>
                                {{ Form::select('gender',  ['M'=>'Male','F'=>'Female'], $farmer->profile->gender, array('class'=>'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Civil Status</label>
                                {{ Form::select('civil_status',  ['single'=>'Single','married'=>'Married','separated'=>'Separated','annulled_divorced'=>'Annulled/Divorced','widower'=>'Window/er'], $farmer->profile->civil_status, array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Citizenship</label>
                                {{ Form::text('citizenship', $farmer->profile->citizenship, array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Address</label>
                                {{ Form::textarea('address', $farmer->profile->address, array('class'=>'form-control','rows'=>3,'style'=>'resize:none')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Mobile</label>
                                {{ Form::text('mobile', $farmer->profile->mobile, array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Email</label>
                                {{ Form::text('email', $farmer->user->email, array('class'=>'form-control','disabled')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Gross Monthly Income</label>
                                {{ Form::text('gross_monthly_income', $farmer->profile->gross_monthly_income, array('class'=>'form-control ')) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Estimate Monthly Expenses</label>
                                {{ Form::text('monthly_expenses', $farmer->profile->monthly_expenses, array('class'=>'form-control ')) }}
                            </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="bg-muted p-4">
                                <strong>Naiintindihan ng humihiram na eto ay market testing sa pakikipag ugnayan ng Agrabah at CARD BDSFI na kung saan:</strong>
                                <br>
                                <br>
                                <p>1. Eto ay pilot testing/market testing na kung saan maaring one time lang ang pag hiram at ang mga susunod na pag hiram ay sa CARD BANK or ibang insitutition na ng CARD MRI pwedeng gawin</p>
                                <p>2. Ang hinihiram ay babayaran sa loob ng tatlong (3) buwan na may voluntary contribution na 2.5% ng prinsipal kada buwan, Kaugnay nito kung may pambayad na ang humihiram bago sumapit ang ikatlong buwan, maari nila itong bayaran ng buo or "partial"</p>

                                <p>3. Pumapayag at naiintindihan ng humihiram na ang disbursement at collection ay via Konect2 CARD, CARD Sulit Padala or GCASH. Ang ACCOUNT Number ng CARD BDSFI na kung saan maari itong bayaran ay ibibigay sa humhiram matapos "madisburse" and pera."</p>
                                <div class="text-center"><label><input type="checkbox" class="" id="terms_agree"> Naiintindihan</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary" disabled id="submit_app_loan">Apply</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="view-modal-layout d-none ">
        <div class="ibox">
            {{--            <div class="ibox-content">--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-b-md">
                        {{--                    <a href="#" class="btn btn-white btn-xs float-right">Edit project</a>--}}
                        <h2 class="loan-name">Loan product name</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    {{--                        <dl class="row mb-0">--}}
                    {{--                            <div class="col-sm-6 text-sm-right">--}}
                    {{--                                <dt>Status:</dt>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-sm-6 text-sm-left">--}}
                    {{--                                <dd class="mb-1 loan-status">--}}
                    {{--                                    <span class="label label-primary">Active</span>--}}
                    {{--                                </dd>--}}
                    {{--                            </div>--}}
                    {{--                        </dl>--}}
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Bank:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 loan-provider">Alex Smith</dd>
                        </div>
                    </dl>
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Amount:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 loan-amount"> 30,000</dd>
                        </div>
                    </dl>
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Terms:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 loan-terms"> 6 Months</dd>
                        </div>
                    </dl>
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Interest:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 loan-interest"> 10%</dd>
                        </div>
                    </dl>
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Agrabah Service Fee:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 service-fee"> {{ number_format(loanServiceFee(), 2) }}</dd>
                        </div>
                    </dl>
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Interest Rate:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 interest-rate"> 0.00</dd>
                        </div>
                    </dl>
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Amortization Rate:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 loan-amor"></dd>
                        </div>
                    </dl>

                </div>
                <div class="col-lg-6" id="cluster_info">

                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Type:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="mb-1 loan-type"> Short Term</dd>
                        </div>
                    </dl>
                    <dl class="row mb-0">
                        <div class="col-sm-6 text-sm-right">
                            <dt>Payment:</dt>
                        </div>
                        <div class="col-sm-6 text-sm-left">
                            <dd class="project-people mb-1">
                                <span class="badge badge-primary">Manual</span>
                                <span class="badge badge-primary">GCash</span>
                                <span class="badge badge-primary">Palawan</span>
                                <span class="badge badge-primary">Bank</span>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            {{--            </div>--}}
        </div>
    </div>


@endsection


@section('styles')
    {{--{!! Html::style('') !!}--}}
    {{--    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
    {{--    {!! Html::style('/css/template/plugins/sweetalert/sweetalert.css') !!}--}}
    {!! Html::style('/css/template/plugins/sweetalert/sweetalert.css') !!}
    {!! Html::style('/css/template/plugins/nouslider/jquery.nouislider.css') !!}
    {!! Html::style('/css/template/plugins/datapicker/datepicker3.css') !!}
    {!! Html::style('/css/template/plugins/iCheck/custom.css') !!}

@endsection

@section('scripts')
    {{--    {!! Html::script('') !!}--}}
    {!! Html::script('/js/template/plugins/jqueryMask/jquery.mask.min.js') !!}
    {!! Html::script('/js/template/moment.js') !!}
    {!! Html::script('/js/template/numeral.js') !!}
    {!! Html::script('/js/template/plugins/sweetalert/sweetalert.min.js') !!}
    {!! Html::script('/js/template/plugins/nouslider/jquery.nouislider.min.js') !!}
    {!! Html::script('/js/template/plugins/datapicker/bootstrap-datepicker.js') !!}
    {!! Html::script('/js/template/plugins/iCheck/icheck.min.js') !!}

    {{--    {!! Html::script(asset('vendor/datatables/buttons.server-side.js')) !!}--}}
    {{--    {!! $dataTable->scripts() !!}--}}
    {{--    {!! Html::script('/js/template/plugins/sweetalert/sweetalert.min.js') !!}--}}
    {{--    {!! Html::script('/js/template/moment.js') !!}--}}
    <script>
        // $(document).on('click', '.show_application', function () {
        //     $('#application_modal').modal('show');
        //     $('#loan_submit_id').val($(this).data('id'));
        // });
        $(document).on('change', '#terms_agree', function () {
            $('#submit_app_loan').prop('disabled', !this.checked);
        });

        $(document).ready(function () {
            var modal = $('#modal');
            function checkBxInit(){
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            }

            var mem = $('.datepicker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd',
                placement: 'bottom',
                startView: 2
            });

            $(document).on('change', '#spouse_date_of_birth', function(){
                var dob = moment($(this).val());
                $('input[name=spouse_age]').val(moment().diff(dob, 'years')).trigger('focus');
                $(this).trigger('focus');
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            var term_slider = document.getElementById('term_slider');

            noUiSlider.create(term_slider, {
                start: 80,
                behaviour: 'tap',
                connect: 'lower',
                step: 1,
                range: {
                    'min': 2,
                    'max': 90
                },
                format: {
                    // 'to' the formatted value. Receives a number.
                    to: function (value) {
                        return parseInt(value);
                    },
                    // 'from' the formatted value.
                    // Receives a string, should return a number.
                    from: function (value) {
                        return parseInt(value);
                    }
                }
            });

            $('#term_value').html(term_slider.noUiSlider.get());
            var timer;
            term_slider.noUiSlider.on('slide', function () {
                $('#term_value').html(term_slider.noUiSlider.get())
                timer = setTimeout(function(){
                    getList($('select[name=type]').val(), term_slider.noUiSlider.get(), range_slider.noUiSlider.get())
                }, 1000);
            });

            var range_slider = document.getElementById('amount_slider');

            noUiSlider.create(range_slider, {
                start: [10000, 500000],
                behaviour: 'drag',
                connect: true,
                range: {
                    'min': 10000,
                    'max': 1000000
                },
                step: 10000,
                format: {
                    // 'to' the formatted value. Receives a number.
                    to: function (value) {
                        return parseInt(Math.round(value));
                    },
                    // 'from' the formatted value.
                    // Receives a string, should return a number.
                    from: function (value) {
                        return parseInt(Math.round(value));
                    }
                }
            });

            var range_value = range_slider.noUiSlider.get();
            $('#amount_value').html(numberWithCommas(range_value[0]) + " - " + numberWithCommas(range_value[1]));
            range_slider.noUiSlider.on('slide', function () {
                var range_value = range_slider.noUiSlider.get();
                $('#amount_value').html(numberWithCommas(range_value[0]) + " - " + numberWithCommas(range_value[1]));
                timer = setTimeout(function(){
                    getList($('select[name=type]').val(), term_slider.noUiSlider.get(), range_value)
                }, 1000);
            });

            $(document).on('ifClicked', 'input[name=employment]', function () {
                console.log("You clicked " + $(this).val());
                var box = $('#employment-select-box');
                if($(this).val() === 'Employed'){
                    box.empty().append('' +
                        '<div class="form-group">' +
                        '<label for="employment_employed">Type *</label>' +
                        '<select name="employment_employed" data-title="Type" id="employment_employed" class="form-control required">' +
                        '<option value="" readonly></option>' +
                        '<option value="Private">Private</option>' +
                        '<option value="Government">Government</option>' +
                        '</select>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-lg-7">' +
                        '<div class="form-group">' +
                        '<label for="employee_position">Position *</label>' +
                        '<select name="employed_position" data-title="Position" id="employed_position" class="form-control required">' +
                        '<option value="" readonly></option>' +
                        '<option value="Staff">Staff</option>' +
                        '<option value="Professional">Professional</option>' +
                        '<option value="Office/Manager">Office/Manager</option>' +
                        '<option value="OFW">OFW</option>' +
                        '<option value="Trading/Merchandising">Trading/Merchandising</option>' +
                        '<option value="Others">Others</option>' +
                        '</select>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-5">' +
                        '<div class="form-group">' +
                        '<label for="employer_contact_number">Tel No.</label>' +
                        '<input name="employer_contact_number" data-title="Tel No." type="text" class="form-control" id="employed_employer_contact_number">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label for="employer_business_address">Employer/Business Address *</label>' +
                        '<textarea name="employer_business_address" data-title="Employer/Business Address" class="form-control no-resize" required id="employer_business_address"></textarea>' +
                        '</div>' +
                        '');
                }
                if($(this).val() === 'Self Employed'){
                    box.empty().append('' +
                        '<div class="form-group">' +
                        '<label for="self_employed_type">Type *</label>' +
                        '<select name="self_employed_type" data-title="Type" id="self_employed_type" class="form-control required">' +
                        '<option value="" readonly></option>' +
                        '<option value="Service">Service</option>' +
                        '<option value="Agricultural">Agricultural</option>' +
                        '<option value="Transportation">Transportation</option>' +
                        '<option value="Manufacturing/Processing">Manufacturing/Processing</option>' +
                        '<option value="Trading/Merchandising">Trading/Merchandising</option>' +
                        '<option value="Others">Others</option>' +
                        '</select>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-lg-7">' +
                        '<div class="form-group">' +
                        '<label for="self_employed_business_name">Business Name *</label>' +
                        '<input name="self_employed_business_name" data-title="Business Name" type="text" class="form-control required" id="self_employed_business_name">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-5">' +
                        '<div class="form-group">' +
                        '<label for="self_employed_business_number">Tel No.</label>' +
                        '<input name="self_employed_business_number" data-title="Tel No." type="text" class="form-control" id="self_employed_business_number">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label for="self_employed_business_address">Business Address *</label>' +
                        '<textarea name="self_employed_business_address" data-title="Business Address" class="form-control no-resize required" id="self_employed_business_address"></textarea>' +
                        '</div>' +
                        '');
                }
            });

            // var term_slider = document.getElementById("term_slider");
            // var term_value = document.getElementById("term_value");
            // term_value.innerHTML = term_slider.value; // Display the default slider value
            // term_slider.oninput = function() {
            //     term_value.innerHTML = this.value;
            // }

            // $('.money').mask("#,##0.00", {reverse: true});

            getList(null, null, null);

            $(document).on('change keyup', '.loan_input', function () {
                getList($('select[name=type]').val(), $('input[name=term]').val(), $('input[name=amount]').val());
            });

            function numberWithCommas(x) {
                return x.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            $(document).on('click', '.show_loan', function () {

                var name = $(this).data('name');
                var provider = $(this).data('provider');
                var amount = $(this).data('amount');
                var type = $(this).data('type');
                var duration = $(this).data('duration');
                var interest_rate = $(this).data('interest_rate');

                var title = 'Loan Product 1';
                modal.find('#modal-size').removeClass().addClass('modal-dialog modal-lg');
                modal.find('.modal-title').text(title);
                modal.find('#modal-save-btn').addClass('d-none');

                var loan_view_layout = $('.view-modal-layout').clone().removeClass('d-none')
                var lvl_name = loan_view_layout.find('.loan-name');
                var lvl_status = loan_view_layout.find('.loan-status');
                var lvl_provider = loan_view_layout.find('.loan-provider');
                var lvl_amount = loan_view_layout.find('.loan-amount');
                var lvl_terms = loan_view_layout.find('.loan-terms');
                var lvl_type = loan_view_layout.find('.loan-type');
                var lvl_interest = loan_view_layout.find('.loan-interest');
                var lvl_interest_rate = loan_view_layout.find('.interest-rate');
                var lvl_amor = loan_view_layout.find('.loan-amor');
                var service_fee = loan_view_layout.find('.service-fee').text().split(",").join("");
                // var lvl_service_fee = loan_view_layout.find('.service-fee');

                lvl_name.html(name);
                // lvl_status.text.name);
                lvl_provider.text(provider);
                lvl_amount.text(numberWithCommas(amount));
                lvl_terms.text(duration);
                lvl_type.text(type);
                lvl_interest.text(interest_rate);

                console.log(parseFloat(service_fee));
                // amount += parseFloat(service_fee);
                var loan_amor = ((amount + (interest_rate/100) * amount) + parseFloat(service_fee)) / duration;
                lvl_amor.text(numberWithCommas(loan_amor));
                lvl_interest_rate.text(numberWithCommas((interest_rate/100) * amount));
                /**
                 * amount: 30000
                 created_at: "2021-07-06T13:59:53.000000Z"
                 description: "et"
                 duration: 29
                 id: 1
                 interest_rate: 64
                 loan_provider_id: 1
                 loan_type_id: 2
                 name: "Loan Product 1"
                 provider:
                 account_id: "00001"
                 created_at: "2021-07-06T13:59:53.000000Z"
                 id: 1
                 profile: {id: 21, model_id: 1, model_type: "App\\LoanProvider", first_name: "Emory", middle_name: "Hartmann", …}
                 updated_at: "2021-07-06T13:59:53.000000Z"
                 user_id: 22
                 __proto__: Object
                 type:
                 created_at: "2021-07-06T13:59:53.000000Z"
                 display_name: "Long Term Loan"
                 id: 2
                 name: "long-term-loan"
                 updated_at: "2021-07-06T13:59:53.000000Z"
                 __proto__: Object
                 updated_at: "2021-07-06T13:59:53.000000Z"
                 */

                modal.find('.modal-body').empty().append(loan_view_layout.html());
                modal.modal('show');
            });

            $(document).on('ifClicked', '.collateral', function () {
                var type = $(this).data('type');
                // console.log("You clicked " + type);
                var boxs = $('#collateral-box');
                switch (type) {
                    case 'land-title':
                        console.log('land-title');
                        boxs.empty().append('' +
                            '<div class="form-group">' +
                            '<div class="i-checkss">' +
                            '<label class="check-labels"><input type="radio" value="Residential"><i></i> Residential</label>' +
                            '</div>' +
                            '<div class="i-checkss">' +
                            '<label class="check-labels"><input type="radio" value="Agracultural"><i></i> Agracultural</label>' +
                            '</div>' +
                            '</div>' +
                            '');
                        break;
                    case 'vehicle':
                        console.log('vehicle');
                        boxs.empty().append('' +
                            '<div class="form-group">' +
                            '<label>Vehicle Model</label>' +
                            '<input type="text" name="" class="form-control required">' +
                            '</div>' +
                            '<div class="form-group row">' +
                            '<div class="col i-checkss">' +
                            '<label class="check-labels"><input type="radio" name="vehicle-status" value="Brand new"><i></i> Brand new</label>' +
                            '</div>' +
                            '<div class="col i-checkss">' +
                            '<label class="check-labels"><input type="radio" name="vehicle-status" value="2nd Hand"><i></i> 2nd Hand</label>' +
                            '</div>' +
                            '</div>' +
                            '');
                        break;
                    default:
                        boxs.empty();
                        break
                }
                $('.i-checkss').iCheck({
                    radioClass: 'iradio_square-green'
                });
            });

            $(document).on('ifClicked', '.disbursement_type', function () {
                var type = $(this).val();
                console.log("You clicked " + type);
                var boxs = modal.find('#disbursement_info_box');
                switch (type) {
                    case 'Konect2':
                        boxs.empty().append('' +
                            '<h2 class="text-center text-danger">Not Available</h2>' +
                        '');
                        break;
                    case 'Sulit Padala':
                        boxs.empty().append('' +
                            '<h2 class="text-center text-danger">Not Available</h2>' +
                            '');
                        break;
                    default:
                        boxs.empty().append('' +
                            '<div class="form-group">' +
                            '<label>Account Name</label>' +
                            '<input type="text" name="account_name" class="form-control">' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label>Account Number</label>' +
                            '<input type="text" name="account_number" class="form-control">' +
                            '</div>' +
                        '');
                        break;
                }
                $('.i-checkss').iCheck({
                    radioClass: 'iradio_square-green'
                });
            });

            $(document).on('click', '#modal-save-btn', function(){
                var type = modal.data('type');
                console.log(type);
                switch(type){
                    case 'loan-application-detail':
                        $('.has-error-box').removeClass('has-error-box');
                        var inputs = new Array(), error = 0;
                        inputs.push(modal.data('id'));

                        var spouse_comaker_info = new Array();
                        $('.spouse_comaker_info').each(function(){
                            var name = $(this).attr('name');
                            var title = $(this).data('title');
                            var value = ($(this).val().length < 1) ? 'N/A': $(this).val();
                            var values = new Array();
                            values.push(name);
                            values.push(title);
                            values.push(value);

                            spouse_comaker_info.push(values);
                        });
                        inputs.push(spouse_comaker_info);

                        var farming_info = new Array();
                        $('.farming_info').each(function(){
                            var name = $(this).attr('name');
                            var title = $(this).data('title');
                            var value = ($(this).val().length < 1) ? 'N/A': $(this).val();
                            var values = new Array();
                            if($(this).is('input[type=checkbox]')){
                                value = ($(this).is(':checked')) ? 1 : 0;
                            }
                            values.push(name);
                            values.push(title);
                            values.push(value);

                            farming_info.push(values);
                        });
                        inputs.push(farming_info);

                        var employment_info = new Array();
                        $('.employment_info').each(function(){
                            var name = $(this).attr('name');
                            var title = $(this).data('title');
                            var value = ($(this).val().length < 1) ? 'N/A': $(this).val();
                            var values = new Array();

                            if($(this).is('input[type=radio]')){
                                if($(this).is(":not(:checked)")){
                                    return true;
                                }else{
                                    var employment = new Array();
                                    employment.push($('input[name='+ name +']:checked').val());
                                    $('#employment-select-box').find('.form-control').each(function(){
                                        var item = new Array();
                                        item.push($(this).attr('name'));
                                        item.push($(this).data('title'));
                                        item.push($(this).val());
                                        employment.push(item);
                                    });
                                    value = employment;
                                }
                            }

                            values.push(name);
                            values.push(title);
                            values.push(value);

                            employment_info.push(values);
                        });
                        inputs.push(employment_info);

                        var income_asset_info = new Array();
                        $('.income_asset_info').each(function(){
                            var name = $(this).attr('name');
                            var title = $(this).data('title');
                            var value = $(this).val();
                            var values = new Array();

                            if(title === 'Assets'){
                                if($(this).children().length > 0){
                                    var assets = new Array();
                                    $(this).find('.repeater-item').each(function(){
                                        var item = new Array();
                                        item.push($(this).find('input[name=asset_name]').val());
                                        item.push($(this).find('input[name=asset_location]').val());
                                        item.push($(this).find('input[name=asset_size]').val());
                                        assets.push(item);
                                    });
                                    value = assets;
                                }
                            }
                            values.push(name);
                            values.push(title);
                            values.push(value);
                            income_asset_info.push(values);
                        });
                        inputs.push(income_asset_info);

                        var info_loan_detail = new Array();
                        $('.info-loan-detail').each(function(){
                            var forms = new Array();
                            var title = $(this).data('title');
                            var value = new Array();
                            switch (title) {
                                case 'Purpose of Loan':
                                    $(this).find('input[type=checkbox]:checked').each(function(){
                                        value.push($(this).val());
                                    });
                                    if($(this).find('input[type=checkbox]:checked').length < 1){
                                        $(this).closest('.form-group').addClass('has-error-box');
                                        error += 1;
                                    }
                                    break;
                                case 'Primary User':
                                    value.push(($(this).val().length < 1) ? 'N/A': $(this).val());
                                    break;
                                case 'Relationship to Applicant':
                                    value.push(($(this).val().length < 1) ? 'N/A': $(this).val());
                                    break;
                                case 'Place of use':
                                    $(this).find('input[type=checkbox]:checked').each(function(){
                                        value.push($(this).val());
                                    });
                                    if($(this).find('input[type=checkbox]:checked').length < 1){
                                        $(this).addClass('has-error-box');
                                        error += 1;
                                    }
                                    break;
                                case 'Collateral':
                                    var innerValue = new Array();
                                    var box = $('#collateral-box');
                                    if($(this).find('input[type=radio]:checked').val() === 'None'){
                                        innerValue.push(box.find('input[type=radio]:checked').val());
                                    }
                                    if($(this).find('input[type=radio]:checked').val() === 'Land Title: TCT No.'){
                                        innerValue.push(box.find('input[type=radio]:checked').val());
                                    }
                                    if($(this).find('input[type=radio]:checked').val() === 'Motor Vehicle'){
                                        innerValue.push(box.find('input[type=radio]:checked').val());
                                        // innerValue.push(box.find('input[type=text]').val());
                                        innerValue.push((box.find('input[type=text]').val().length < 1) ? 'N/A': box.find('input[type=text]').val());
                                        if(box.find('input[type=text]').val().length < 1){
                                            box.find('input[type=text]').closest('.form-group').addClass('has-error');
                                            error += 1;
                                        }
                                    }
                                    value.push($(this).find('input[type=radio]:checked').val());
                                    value.push(innerValue);
                                    break;
                            }

                            forms.push(title);
                            forms.push(value);
                            info_loan_detail.push(forms);
                        });
                        inputs.push(info_loan_detail);

                        var credit_financial_info = new Array();
                        $('.credit-financial-info').each(function(){
                            var forms = new Array();
                            var title = $(this).data('title');
                            var value = new Array();

                            $(this).find('.form-repeater').each(function(){
                                var innerValue = new Array();
                                $(this).find('.form-control').each(function(){
                                    var innestValue = new Array();
                                    innestValue.push($(this).data('title'), $(this).val());
                                    innerValue.push(innestValue);
                                });


                                value.push(innerValue);
                            });

                            forms.push(title);
                            forms.push(value);
                            credit_financial_info.push(forms);
                        });
                        inputs.push(credit_financial_info);

                        var trade_reference_info = new Array();
                        $('.trade-reference-info').each(function(){
                            var forms = new Array();
                            var title = $(this).data('title');
                            var value = new Array();

                            $(this).find('.form-repeater').each(function(){
                                var innerValue = new Array();
                                $(this).find('.form-control').each(function(){
                                    var innestValue = new Array();
                                    innestValue.push($(this).data('title'), $(this).val());
                                    innerValue.push(innestValue);
                                });
                                value.push(innerValue);
                            });
                            forms.push(title);
                            forms.push(value);
                            trade_reference_info.push(forms);
                        });
                        inputs.push(trade_reference_info);

                        var reference_ids = new Array();
                        $('.reference-ids').each(function(){
                            var forms = new Array();
                            var title = $(this).data('title');
                            var value = new Array();

                            $(this).find('.form-control').each(function(){
                                var innestValue = new Array();
                                if($(this).data('base').length > 0){
                                    innestValue.push($(this).data('title'), $(this).data('base'), $(this).val());
                                    // innestValue.push($(this).data('title'), $(this).val(), $(this).val());
                                    value.push(innestValue);
                                }
                            });

                            forms.push(title);
                            forms.push(value);
                            reference_ids.push(forms);
                        });
                        inputs.push(reference_ids);

                        console.log(inputs);
                        console.log('error: '+ error);
                        if(error > 0){
                            return false;
                        }

                        if($('#terms_agree').prop('checked')){

                            // modal.modal('toggle');

                            $.post('{!! route('loan-submit-form') !!}', {
                                _token: '{!! csrf_token() !!}',
                                inputs: inputs
                            }, function(data){
                                console.log(data);
                                window.location.replace(data);
                            });

                        }else{
                            $('#terms_agree').closest('.form-group').addClass('has-error');
                        }


                        break;
                    case 'create-disbursement':
                        var datas = new Array(), error = 0;
                        datas.push(modal.find('input[name=account_type]:checked').val());
                        datas.push(modal.find('input[name=account_name]').val());
                        datas.push(modal.find('input[name=account_number]').val());
                        modal.find('.form-group').removeClass('has-error');
                        modal.find('.form-control').each(function(){
                            if($(this).val().length < 1){
                                $(this).closest('.form-group').addClass('has-error');
                                error += 1;
                            }
                        });

                        if( modal.find('#disbursement_info_box').children().length < 2 ) {
                            error += 1;
                        }
                        console.log(error);
                        if(error > 0){
                            return false;
                        }

                        console.log(datas);

                        $.post('{!! route('store-disbursement') !!}', {
                            _token: '{!! csrf_token() !!}',
                            datas: datas
                        }, function(data){
                            modal.modal('toggle');
                            swal("Success!", "You may proceed to Loan Application.", "success");
                        });

                        break;
                }
            });

            $(document).on('click', '.btn-action', function () {
                var loanProductID = $(this).data('id'), loanProductDiscolsure = $('#disclosure_'+loanProductID).html(), assetsBox = $('#assets-box');
                switch ($(this).data('action')) {
                    case 'apply-loan':
                        if(checkDisbursement() > 0){
                            return false;
                        }
                        modal.data('type', 'loan-application-detail');
                        modal.data('id', loanProductID);
                        modal.find('.modal-title').text('Loan Application Details');
                        modal.find('#modal-size').removeClass().addClass('modal-dialog modal-lg');
                        modal.find('#modal-save-btn').removeClass('d-none');
                        modal.find('#modal-save-btn').text('Submit Application');

                        // ------------------------
                        // modal.find('.modal-title').text('Loan Application Details');
                        // modal.find('#modal-size').removeClass().addClass('modal-dialog modal-lg');
                        // modal.modal({backdrop: 'static', keyboard: false});
                        // return false;
                        // ------------------------


                        modal.find('.modal-body').empty().append('' +
                            // first
                            '<div class="panel panel-default">' +
                            '<div class="panel-body">' +
                            '<h2 class="text-success"><strong>Spouse/Co-maker Info</strong></h2>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<label for="spouse_first_name">First name</label>' +
                            '<input name="spouse_first_name" data-title="First name" type="text" class="spouse_comaker_info form-control required" id="spouse_first_name">' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label for="spouse_middle_name">Middle name</label>' +
                            '<input name="spouse_middle_name" data-title="Middle name" type="text" class="spouse_comaker_info form-control required" id="spouse_middle_name">' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label for="spouse_last_name">Last name</label>' +
                            '<input name="spouse_last_name" data-title="Last name" type="text" class="spouse_comaker_info form-control required" id="spouse_last_name">' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-8">' +
                            '<div class="form-group">' +
                            '<label for="spouse_date_of_birth">Date of Birth</label>' +
                            '<input name="spouse_date_of_birth" data-title="Date of Birth" type="text" class="spouse_comaker_info dob-input form-control required" id="spouse_date_of_birth">' +
                            '</div>' +
                            '</div>' +
                            '<div class="col">' +
                            '<div class="form-group">' +
                            '<label for="spouse_age">Age</label>' +
                            '<input name="spouse_age" data-title="Age" type="text" class="form-control" id="spouse_age" readonly>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<div class="row">' +
                            '<div class="col">' +
                            '<div class="form-group">' +
                            '<label for="spouse_civil_status">Civil Status *</label>' +
                            '<select name="spouse_civil_status" data-title="Civil Status" class="spouse_comaker_info form-control required" id="spouse_civil_status">' +
                            '<option value="" readonly></option>' +
                            '<option value="Single">Single</option>' +
                            '<option value="Married">Married</option>' +
                            '<option value="Widow/er">Widow/er</option>' +
                            '<option value="Separated">Separated</option>' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<label for="spouse_gender">Gender</label>' +
                            '<select name="spouse_gender" data-title="Gender" class="spouse_comaker_info form-control required" id="spouse_gender">' +
                            '<option value="" readonly></option>' +
                            '<option value="Male">Male</option>' +
                            '<option value="Female">Female</option>' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<label for="spouse_land_line">Land Line</label>' +
                            '<input name="spouse_land_line" data-title="Land Line" type="text" class="spouse_comaker_info form-control" id="spouse_land-line">' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<label for="spouse_mobile">Mobile</label>' +
                            '<input name="spouse_mobile" data-title="Mobile" type="text" class="spouse_comaker_info form-control" id="spouse_mobile">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<label for="spouse_tin">Tin No.</label>' +
                            '<input name="spouse_tin" data-title="Tin No." type="text" class="spouse_comaker_info form-control" id="spouse_tin">' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<label for="spouse_sss_gsis">SSS / GSIS No.</label>' +
                            '<input name="spouse_sss_gsis" data-title="SSS / GSIS No." type="text" class="spouse_comaker_info form-control" id="spouse_sss_gsis">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label for="spouse_education">Education</label>' +
                            '<select name="spouse_education" data-title="Education" class="spouse_comaker_info form-control required" id="spouse_education">' +
                            '<option value="" readonly></option>' +
                            '<option value="High School">High School</option>' +
                            '<option value="College">College</option>' +
                            '<option value="Post Graduate">Post Graduate</option>' +
                            '<option value="Under Graduate">Under Graduate</option>' +
                            '<option value="Vocational">Vocational</option>' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +



                            // second
                            '<div class="panel panel-default">' +
                            '<div class="panel-body">' +
                            '<div class="row">' +
                            '<div class="col-12 col-lg-6">' +
                            '<h2 class="text-success"><strong>Farming Info</strong></h2>' +
                            '<div class="form-group">' +
                            '<label for="farming_description">Farming Description *</label>' +
                            '<textarea name="farming_description" data-title="Farming Description" class="farming_info form-control required" id="farming_description"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-12 col-lg-6">' +
                            '<h2 class="text-success"><strong>Membership / Group</strong></h2>' +
                            '<div class="form-group">' +
                            '<label for="organization">Organization</label>' +
                            '<input name="organization" type="text" data-title="Organization" class="farming_info form-control" id="organization">' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<div class="i-checks">' +
                            '<label class="check-labels">' +
                            '<input data-title="4P\'s" name="four_ps" type="checkbox" value="1" class="farming_info"><i></i> 4P\'s' +
                            '</label>' +
                            '</div>' +
                            '<div class="i-checks">' +
                            '<label class="check-labels">' +
                            '<input data-title="PWD" name="pwd" type="checkbox" value="1" class="farming_info"><i></i> PWD' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                            '<div class="form-group">' +
                            '<div class="i-checks">' +
                            '<label class="check-labels">' +
                            '<input data-title="Indigenous" name="indigenous" type="checkbox" value="1" class="farming_info"><i></i> Indigenous' +
                            '</label>' +
                            '</div>' +
                            '<div class="i-checks">' +
                            '<label class="check-labels">' +
                            '<input data-title="Livelihood" name="livelihood" type="checkbox" value="1" class="farming_info"><i></i> Livelihood' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +


                            // third
                            '<div class="panel panel-default">' +
                            '<div class="panel-body">' +
                            '<h2 class="text-success"><strong>Employment</strong></h2>' +
                            '<div class="row">' +
                            '<div class="col-lg-4">' +
                            '<div class="form-group">' +
                            '<div class="i-checks">' +
                            '<label class="check-labels">' +
                            '<input data-title="Employment" required="required" name="employment" type="radio" value="Employed" class="employment_info" checked><i></i> Employed' +
                            '</label>' +
                            '</div>' +
                            '<div class="i-checks">' +
                            '<label class="check-labels">' +
                            '<input data-title="Employment" required="required" name="employment" type="radio" value="Self Employed" class="employment_info"><i></i> Self Employed' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-8">' +
                            '<div id="employment-select-box">' +
                            '<div class="form-group">' +
                            '<label for="employment_employed">Type *</label>' +
                            '<select name="employment_employed" data-title="Type" id="employment_employed" class="form-control required">' +
                            '<option value="" readonly></option>' +
                            '<option value="Private">Private</option>' +
                            '<option value="Government">Government</option>' +
                            '</select>' +
                            '</div>' +
                            '<div class="row">' +
                            '<div class="col-lg-7">' +
                            '<div class="form-group">' +
                            '<label for="employee_position">Position *</label>' +
                            '<select name="employed_position" data-title="Position" id="employed_position" class="form-control required">' +
                            '<option value="" readonly></option>' +
                            '<option value="Staff">Staff</option>' +
                            '<option value="Professional">Professional</option>' +
                            '<option value="Office/Manager">Office/Manager</option>' +
                            '<option value="OFW">OFW</option>' +
                            '<option value="Trading/Merchandising">Trading/Merchandising</option>' +
                            '<option value="Others">Others</option>' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-lg-5">' +
                            '<div class="form-group">' +
                            '<label for="employer_contact_number">Tel No.</label>' +
                            '<input name="employer_contact_number" data-title="Tel No." type="text" class="form-control" id="employed_employer_contact_number">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label for="employer_business_address">Employer/Business Address *</label>' +
                            '<textarea name="employer_business_address" data-title="Employer/Business Address" class="form-control no-resize" required id="employer_business_address"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +


                            // fourth
                            '<div class="panel panel-default">' +
                            '<div class="panel-body">' +
                            '<h2 class="text-success"><strong>Monthly Income</strong></h2>' +
                            '<div class="table-responsive">' +
                            '<table id="monthly-income">' +
                            '<tr>' +
                            '<th></th>' +
                            '<th>Business</th>' +
                            '<th>Employment</th>' +
                            '<th>Total</th>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Applicant Monthly Income</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="applicant_business_income" data-title="Applicant Business Income" class="income_asset_info form-control row-input required" id="rowa-a-income" required>' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="applicant_employment_income" data-title="Applicant Employment Income" class="income_asset_info form-control row-input required" id="rowa-b-income" required>' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group display_peso">' +
                            '<input type="number" name="" value="0.00" class="form-control text-success" id="rowa-total" readonly>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Spouse\'s Monthly Income</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="spouse_business_income" data-title="Spouse Business Income" class="income_asset_info form-control row-input required" id="rowb-a-income" required>' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="spouse_employment_income" data-title="Spouse Employment Income" class="income_asset_info form-control row-input required" id="rowb-b-income" required>' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group display_peso">' +
                            '<input type="number" name="" value="0.00" class="form-control text-success" id="rowb-total" readonly>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Other Monthly Income</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="other_monthly_income" data-title="Other Monthly Income" class="income_asset_info form-control row-input required" id="rowc-income" required>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Other Source of Income <small>(Pension, Allowance, Salary, <br> Business Sales, Harvest, Others)</small></td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="other_source_income" data-title="Other Source Income" class="income_asset_info form-control row-input required" id="rowd-income" required>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Total Monthly Income</td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td>' +
                            '<div class="form-group display_peso">' +
                            '<input type="number" name="" value="0.00" class="form-control text-success" id="rowabcd-total" readonly>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Less Monthly Expenses <small>(Living, Utilitites, Rental, <br> Transpo, Food, Tuition)</small></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="monthly_expenses" data-title="Less Monthly Expenses (Living, Utilitites, rental, transpo..)" class="income_asset_info form-control row-input required" id="rowe-expense" required>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Other Expenses</td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" name="other_expenses" data-title="Other Expenses" class="income_asset_info form-control row-input required" id="rowf-expense" required>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>Total Expenses</td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td>' +
                            '<div class="form-group display_peso">' +
                            '<input type="number" name="" value="0.00" class="form-control text-success" id="rowef-total" readonly>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '<tr class="grand-total">' +
                            '<td>Net Monthly Income</td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td>' +
                            '<div class="form-group display_peso">' +
                            '<input name="" type="number" class="form-control text-success" id="total-income" value="0.00" readonly>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '</table>' +
                            '</div>' +
                            '<div class="hr-line-dashed"></div>' +
                            '<div class="repeater-container" id="other_payments">' +
                            '<div class="row header d-none d-lg-flex">' +
                            '<div class="col-4"><div class="box">Other assets aside from collateral <small>car, rental, real state</small></div></div>' +
                            '<div class="col-4"><div class="box">Location/Description</div></div>' +
                            '<div class="col-4"><div class="box">Size(sq.m.) Estimated Value</div></div>' +
                            '</div>' +
                            '<div class="income_asset_info repeater-lists" name="assets" data-title="Assets" id="assets-box"></div>' +
                            '<div class="actions text-right">' +
                            '<a href="javascript:;" class="btn-add btn-action" data-action="add-asset">' +
                            '<img src="https://img.icons8.com/ios-glyphs/30/38c172/plus-math.png"/>' +
                            '</a> &nbsp;' +
                            '<a href="javascript:;" class="btn-delete btn-action" data-action="remove-asset">' +
                            '<img src="https://img.icons8.com/ios-glyphs/30/38c172/minus-math.png"/>' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +

                            // old
                            '<div class="panel panel-default" id="loan-details">' +
                                '<div class="panel-body">' +
                                    '<h2 class="text-success"><strong>LOAN DETAILS</strong></h2>' +
                                    '<h3>Purpose of Loan</h3>' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            '<div class="form-group row info-loan-detail" data-title="Purpose of Loan">' +
                                                '<div class="col-12 col-lg-4 col-md-6">' +
                                                    '<div class="i-checks">' +
                                                        '<label class="check-labels"><input type="checkbox" value="Auto Financing"><i></i> Auto Financing</label>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="col-12 col-lg-4 col-md-6">' +
                                                    '<div class="i-checks">' +
                                                        '<label class="check-labels"><input type="checkbox" value="Housing"><i></i> Housing</label>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="col-12 col-lg-4 col-md-6">' +
                                                    '<div class="i-checks">' +
                                                        '<label class="check-labels"><input type="checkbox" value="Working Capital"><i></i> Working Capital</label>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="col-12 col-lg-4 col-md-6">' +
                                                    '<div class="i-checks">' +
                                                        '<label class="check-labels"><input type="checkbox" value="Other"><i></i> Other</label>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    // '<div class="row">' +
                                    //     '<div class="col-lg-6">' +
                                    //         '<div class="form-group">' +
                                    //             '<h3>Primary User</h3>' +
                                    //             '<input type="text" name="primary-user" class="form-control info-loan-detail" data-title="Primary User">' +
                                    //         '</div>' +
                                    //     '</div>' +
                                    //     '<div class="col-lg-6">' +
                                    //         '<div class="form-group">' +
                                    //             '<h3>Relationship to Applicant</h3>' +
                                    //             '<input type="text" name="relationship" class="form-control info-loan-detail" data-title="Relationship to Applicant">' +
                                    //         '</div>' +
                                    //     '</div>' +
                                    // '</div>' +
                                    '<h3>Place of use</h3>' +
                                    '<div class="row info-loan-detail" data-title="Place of use">' +
                                        '<div class="col-12 col-lg-4">' +
                                            '<div class="form-group">' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="checkbox" value="Residential"><i></i> Residential</label>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="form-group">' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="checkbox" value="Agricultural"><i></i> Agricultural</label>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-12 col-lg-4">' +
                                            '<div class="form-group">' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="checkbox" value="Residential / Commercial"><i></i> Residential / Commercial</label>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="form-group">' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="checkbox" value="Clean Loan / No Collateral"><i></i> Clean Loan / No Collateral</label>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-12 col-lg-4">' +
                                            '<div class="form-group">' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="checkbox" value="Commercial"><i></i> Commercial</label>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<h3>Collateral</h3>' +
                                    '<div class="row">' +
                                        '<div class="col-lg-4">' +
                                            '<div class="form-group info-loan-detail" data-title="Collateral">' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="radio" name="collateral" class="collateral" data-type="none" value="None" checked><i></i> None</label>' +
                                                '</div>' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="radio" name="collateral" class="collateral" data-type="land-title" value="Land Title: TCT No."><i></i> Land Title: TCT No.</label>' +
                                                '</div>' +
                                                '<div class="i-checks">' +
                                                    '<label class="check-labels"><input type="radio" name="collateral" class="collateral" data-type="vehicle" value="Motor Vehicle"><i></i> Motor Vehicle</label>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-lg-8" id="collateral-box"></div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +

                            '<div class="panel panel-default" id="credit">' +
                                '<div class="panel-body">' +
                                    '<h2 class="text-success"><strong>CREDIT / FINANCIAL INFORMATION</strong></h2>' +
                                    '<div class="row">' +
                                        '<div class="col-lg-6 form-repeat-box-parent">' +
                                            '<h3>Bank Accounts</h3>' +
                                            '<div class="form-repeat-box credit-financial-info" data-title="Bank Accounts">' +
                                                '<div class="row form-repeater">' +
                                                    '<div class="col-12 col-lg-6">' +
                                                        '<div class="form-group">' +
                                                            '<input type="text" name="bank-name" class="form-control" data-title="Bank name" placeholder="Bank name">' +
                                                            // '<select name="" class="form-control" data-title="Account type">' +
                                                            //     '<option value="">Account type</option>' +
                                                            //     '<option value="Savings">Savings</option>' +
                                                            //     '<option value="Checking">Checking</option>' +
                                                            //     '<option value="Time Deposit">Time Deposit</option>' +
                                                            // '</select>' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<div class="col-12 col-lg-6">' +
                                                        '<div class="form-group">' +
                                                            '<input type="text" name="" class="form-control" data-title="Account No." placeholder="Account No.">' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="btn-group-xs text-right">' +
                                                '<button type="button" class="btn btn-xs btn-white btn-action" data-action="account-add"><i class="text-success fa fa-plus"></i></button>' +
                                                '<button type="button" class="btn btn-xs btn-white btn-action" data-action="repeater-remove"><i class="text-danger fa fa-minus"></i></button>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-lg-6 form-repeat-box-parent">' +
                                            '<h3>Credit References</h3>' +
                                            '<div class="form-repeat-box credit-financial-info" data-title="Credit References">' +
                                                '<div class="row form-repeater">' +
                                                    '<div class="col-12 col-lg-6">' +
                                                        '<div class="form-group">' +
                                                            '<input type="text" name="asdf" class="form-control" placeholder="Bank / Financing" data-title="Bank / Financing">' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<div class="col-12 col-lg-6">' +
                                                        '<div class="form-group">' +
                                                            '<input type="text" name="sdfg" class="form-control" placeholder="Monthly Amortization" data-title="Monthly Amortization">' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="btn-group-xs text-right">' +
                                                '<button type="button" class="btn btn-xs btn-white btn-action" data-action="reference-add"><i class="text-success fa fa-plus"></i></button>' +
                                                '<button type="button" class="btn btn-xs btn-white btn-action" data-action="repeater-remove"><i class="text-danger fa fa-minus"></i></button>' +
                                            '</div>' +
                                        '</div>' +


                                    '</div>' +




                                '</div>' +
                            '</div>' +

                            '<div class="panel panel-default">' +
                                '<div class="panel-body">' +
                                    '<h2 class="text-success"><strong>TRADE AND OTHER REFERENCES</strong></h2>' +
                                    '<div class="form-repeat-box-parent">' +
                                        '<div class="form-repeat-box trade-reference-info" data-title="Trade and other reference">' +
                                            '<div class="row form-repeater">' +
                                                '<div class="col-12 col-lg-4">' +
                                                    '<div class="form-group">' +
                                                        '<input type="text" name="" class="form-control" placeholder="Customer name / Co-maker" data-title="Customer name / Co-maker">' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="col-12 col-lg-4">' +
                                                    '<div class="form-group">' +
                                                        '<input type="text" name="" class="form-control" placeholder="Address" data-title="Address">' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="col-12 col-lg-4">' +
                                                    '<div class="form-group">' +
                                                        '<input type="text" name="" class="form-control" placeholder="Contact No." data-title="Contact No.">' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="btn-group-xs text-right">' +
                                            '<button type="button" class="btn btn-xs btn-white btn-action" data-action="trade-add"><i class="text-success fa fa-plus"></i></button>' +
                                            '<button type="button" class="btn btn-xs btn-white btn-action" data-action="repeater-remove"><i class="text-danger fa fa-minus"></i></button>' +
                                        '</div>' +
                                    '</div>' +

                                '</div>' +
                            '</div>' +

                            '<div class="panel panel-default">' +
                                '<div class="panel-body reference-ids" data-title="Reference ID\'s / Documents">' +
                                    '<h2 class="text-success"><strong>REFERENCE ID\'s / DOCUMENTS</strong></h2>' +
                                    '<div class="row">' +
                                        '<div class="col-lg-6 img-box">' +
                                            '<div class="form-group">' +
                                                '<label>Attachment #1 <span class="text-danger">*</span></label>' +
                                                '<input type="file" name="reference_id_a" data-title="Attachment #1" data-base="" class="form-control required image-upload" accept="image/*" required>' +
                                            '</div>' +
                                            '<img class="img-input img-fluid">' +
                                        '</div>' +
                                        '<div class="col-lg-6 img-box">' +
                                            '<div class="form-group">' +
                                                '<label>Attachment #2 <span class="text-danger">*</span></label>' +
                                                '<input type="file" name="reference_id_b" data-title="Attachment #2" data-base="" class="form-control required image-upload" accept="image/*" required>' +
                                            '</div>' +
                                            '<img class="img-input img-fluid">' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="row">' +
                                        '<div class="col-lg-6 img-box">' +
                                            '<div class="form-group">' +
                                                '<label>Attachment #3</label>' +
                                                '<input type="file" name="reference_id_c" data-title="Attachment #3" data-base="" class="form-control image-upload" accept="image/*" required>' +
                                            '</div>' +
                                            '<img class="img-input img-fluid">' +
                                        '</div>' +
                                        '<div class="col-lg-6 img-box">' +
                                            '<div class="form-group">' +
                                                '<label>Attachment #4</label>' +
                                                '<input type="file" name="reference_id_d" data-title="Attachment #4" data-base="" class="form-control image-upload" accept="image/*" required>' +
                                            '</div>' +
                                            '<img class="img-input img-fluid">' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="row">' +
                                        '<div class="col-lg-6 img-box">' +
                                            '<div class="form-group">' +
                                                '<label>Attachment #5</label>' +
                                                '<input type="file" name="reference_id_e" data-title="Attachment #5" data-base="" class="form-control image-upload" accept="image/*" required>' +
                                            '</div>' +
                                            '<img class="img-input img-fluid">' +
                                        '</div>' +
                                        '<div class="col-lg-6 img-box">' +
                                            '<div class="form-group">' +
                                                '<label>Attachment #6</label>' +
                                                '<input type="file" name="reference_id_f" data-title="Attachment #6" data-base="" class="form-control image-upload" accept="image/*" required>' +
                                            '</div>' +
                                            '<img class="img-input img-fluid">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +



                            '<div class="panel panel-default">' +
                                '<div class="panel-body">' +
                                    '<h2 class="text-success"><strong>TERMS</strong></h2>' +
                                    '<div class="row">' +
                                        '<div class="col">' +
                                            '<div class="bg-muted p-4">' +
                                                loanProductDiscolsure +
                                                '<div class="text-center i-checks"><label><input type="checkbox" class="form-control" id="terms_agree">&nbsp; Naiintindihan</label></div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +

                        '');

                        checkBxInit();

                        $('.dob-input').datepicker({
                            startView: 2,
                            todayBtn: false,
                            keyboardNavigation: false,
                            forceParse: false,
                            autoclose: true,
                            format: "mm/dd/yyyy"
                        });

                        modal.modal({backdrop: 'static', keyboard: false});

                        {{--swal({--}}
                        {{--    title: "Are you sure?",--}}
                        {{--    text: "Your loan application will be submitted!",--}}
                        {{--    type: "warning",--}}
                        {{--    showCancelButton: true,--}}
                        {{--    confirmButtonColor: "#DD6B55",--}}
                        {{--    confirmButtonText: "Yes!",--}}
                        {{--    cancelButtonText: "No!",--}}
                        {{--    closeOnConfirm: true,--}}
                        {{--    closeOnCancel: true--}}
                        {{--},--}}
                        {{--function (isConfirm) {--}}
                        {{--    if (isConfirm) {--}}
                        {{--        $.get('{!! route('loan-apply') !!}', {--}}
                        {{--            id: loanProductID--}}
                        {{--        }, function (data) {--}}
                        {{--            console.log('success');--}}
                        {{--            console.log(data);--}}
                        {{--        });--}}
                        {{--    } else {--}}
                        {{--        swal("Cancelled", "Loan application cancelled", "error");--}}
                        {{--    }--}}
                        {{--});--}}

                        break;
                    case 'account-add':
                        var box = $(this).closest('.form-repeat-box-parent').find('.form-repeat-box');
                        box.append('' +
                            '<div class="row form-repeater">' +
                                '<div class="col">' +
                                    '<div class="form-group">' +
                                        '<input type="text" name="bank-name" class="form-control" data-title="Bank name" placeholder="Bank name">' +
                                        // '<select name="" class="form-control" data-title="Account type">' +
                                        //     '<option value="">Account type</option>' +
                                        //     '<option value="Savings">Savings</option>' +
                                        //     '<option value="Checking">Checking</option>' +
                                        //     '<option value="Time Deposit">Time Deposit</option>' +
                                        // '</select>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col">' +
                                    '<div class="form-group">' +
                                        '<input type="text" name="" class="form-control" placeholder="Account No." data-title="Account No.">' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '');
                        break;
                    case 'reference-add':
                        var box = $(this).closest('.form-repeat-box-parent').find('.form-repeat-box');
                        box.append('' +
                            '<div class="row form-repeater mb-1">' +
                                '<div class="col">' +
                                    '<div class="form-group">' +
                                        '<input type="text" name="asdf" class="form-control" placeholder="Bank / Financing" data-title="Bank / Financing">' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col">' +
                                    '<div class="form-group">' +
                                        '<input type="text" name="sdfg" class="form-control" placeholder="Monthly Amortization" data-title="Monthly Amortization">' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '');
                        break;
                    case 'trade-add':
                        var box = $(this).closest('.form-repeat-box-parent').find('.form-repeat-box');
                        box.append('' +
                            '<div class="row form-repeater">' +
                                '<div class="col">' +
                                    '<div class="form-group">' +
                                        '<input type="text" name="" class="form-control" placeholder="Customer/Co-maker name" data-title="Customer name / Co-maker">' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col">' +
                                    '<div class="form-group">' +
                                        '<input type="text" name="" class="form-control" placeholder="Address" data-title="Address">' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col">' +
                                    '<div class="form-group">' +
                                        '<input type="text" name="" class="form-control" placeholder="Contact No." data-title="Contact No.">' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '');
                        break;
                    case 'repeater-remove':
                        var repeater = $(this).closest('.form-repeat-box-parent').find('.form-repeat-box').find('.form-repeater');
                        if(repeater.length > 1){
                            repeater.last().remove();
                        }
                        break;
                    case 'add-asset':
                        assetsBox.append('' +
                            '<div class="repeater-item">' +
                            '<div class="row mb-2">' +
                            '<div class="col-12 col-lg-4">' +
                            '<input type="text" name="asset_name" class="form-control required" data-title="Other assets aside from collateral" placeholder="Other assets aside from collateral">' +
                            '</div>' +
                            '<div class="col-12 col-lg-4">' +
                            '<input type="text" name="asset_location" class="form-control required" data-title="Location/Description" placeholder="Location/Description">' +
                            '</div>' +
                            '<div class="col-12 col-lg-4">' +
                            '<input type="text" name="asset_size" class="form-control required" data-title="Size(sq.m.) Estimated Value" placeholder="Size(sq.m.) Estimated Value">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '');
                        break;
                    case 'remove-asset':
                        assetsBox.find('.repeater-item').last().remove();
                        break;
                    case 'view-product':
                        $.get('{!! route('loan-product-info') !!}', {
                            id: loanProductID
                        }, function(data){
                            console.log(data);
                            var total_amount = ((data.interest_rate/100) * data.amount) + data.amount;
                            var service_fee = parseFloat('{!! loanServiceFee() !!}');
                            total_amount += service_fee;
                            var loan_amor = ((data.amount + (data.interest_rate/100) * data.amount) + service_fee) / data.duration;

                            // return false;
                            modal.find('.modal-body').empty().append('' +
                                '<div class="ibox product-detail">' +
                                    '<div class="ibox-content">' +

                                        '<div class="row">' +
                                            '<div class="col-lg-5">' +
                                                '<div class="text-center">' +
                                                    '<img src="'+ data.provider.profile.image +'" alt="" class="img-fluid">' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="col-lg-7 align-self-center">' +
                                                '<div class="text-center">' +
                                                    '<div class="m-t-md">' +
                                                        '<h1 class="font-bold m-b-xs text-uppercase text-success">'+ data.provider.profile.bank_name +'</h1>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<hr>' +

                                        '<div class="row">' +
                                            '<div class="col-md-5 ">' +
                                                // '<div class="text-center">' +
                                                //     '<img src="'+ data.provider.profile.image +'" alt="" class="img-fluid">' +
                                                //     '<div class="m-t-md">' +
                                                //         '<h2 class="font-bold m-b-xs">'+ data.provider.profile.bank_name +'</h2>' +
                                                //     '</div>' +
                                                // '</div>' +
                                                // '<hr>' +
                                                '<div class="text-center">' +
                                                    '<div class="m-t-md">' +
                                                        '<h2 class="font-bold text-success mb-0">'+ numberWithCommas(data.amount) +'</h2>' +
                                                        '<small>Loanable Amount</small>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<hr>' +
                                                '<div class="row">' +
                                                    '<div class="col-12 col-lg-6">' +
                                                        '<dl class="small text-center">' +
                                                            '<dt>Loan Terms</dt>' +
                                                            '<dd>'+ data.duration +' '+ data.timing_name +'</dd>' +
                                                        '</dl>' +
                                                    '</div>' +
                                                    '<div class="col-12 col-lg-6">' +
                                                        '<dl class="small text-center">' +
                                                            '<dt>Amortization Rate</dt>' +
                                                            '<dd>'+ numberWithCommas(loan_amor) +'</dd>' +
                                                        '</dl>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="row">' +
                                                    '<div class="col-12 col-lg-6">' +
                                                        '<dl class="small text-center">' +
                                                            '<dt>Interest rate</dt>' +
                                                            '<dd>'+ data.interest_rate +'%</dd>' +
                                                        '</dl>' +
                                                    '</div>' +
                                                    // '<div class="col">' +
                                                    //     '<dl class="small text-center">' +
                                                    //         '<dt>Amortization Type</dt>' +
                                                    //         '<dd>'+ data.timing_name +'</dd>' +
                                                    //     '</dl>' +
                                                    // '</div>' +
                                                '</div>' +
                                                '<div class="panel panel-primary">' +
                                                    '<div class="panel-body text-center">' +
                                                        '<div class=" ">' +
                                                            '<h2 class="font-bold text-info mb-0">'+ numberWithCommas((data.interest_rate/100) * data.amount) +'</h2>' +
                                                            '<small>Interest</small>' +
                                                        '</div>' +
                                                        '<div class=" ">' +
                                                            '<h2 class="font-bold text-info mb-0">{!! number_format(loanServiceFee(), 2) !!}</h2>' +
                                                            '<small>Agrabah Ventures Service Fee</small>' +
                                                        '</div>' +
                                                        '<div class=" ">' +
                                                            '<h2 class="font-bold text-info mb-0">'+ numberWithCommas(total_amount) +'</h2>' +
                                                            '<small>Total Payable Amount</small>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="col-md-7">' +
                                                '<h2 class="font-bold m-b-xs">'+ data.name +'</h2>' +
                                                '<small>'+ data.type.display_name +'</small>' +
                                                '<div class="hr-line-solid"></div>' +
                                                data.description +
                                                data.requirements +
                                                '<hr>' +
                                                '<h4>Payment method</h4>' +
                                                '<dd class="project-people mb-1">' +
                                                    '<span class="badge badge-primary">Manual</span>&nbsp;' +
                                                    '<span class="badge badge-primary">GCash</span>&nbsp;' +
                                                    '<span class="badge badge-primary">Palawan</span>&nbsp;' +
                                                    '<span class="badge badge-primary">Bank</span>' +
                                                '</dd>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '');
                        });

                        modal.data('type', 'loan-product-detail');
                        modal.data('id', loanProductID);
                        modal.find('.modal-title').text('Loan Application Details');
                        modal.find('#modal-size').removeClass().addClass('modal-dialog modal-lg');
                        modal.find('#modal-save-btn').addClass('d-none');
                        // modal.find('#modal-save-btn').text('Submit Application');

                        modal.modal({backdrop: 'static', keyboard: false});
                        break;
                }
            });

            $(document).on('change', '.image-upload', function(){
                var preview = $(this).closest('.img-box').find('.img-input');
                var input = $(this);
                var file = this.files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function () {
                    preview.attr('src', reader.result);
                    input.data('base', reader.result);
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
            });

            $(document).on('keyup', '.row-input', function(){
                computeMonthlyTable();
            });

            // $('.row-input').keyup(function(){
            //     computeMonthlyTable();
            // });

            function getList(type, term, amount) {
                // console.log('type: ' + type);
                // console.log('term: ' + term);
                // console.log('amount: ' + numeral(amount).format('0'));
                var list = new Array();
                jQuery.ajaxSetup({async: false});
                $.get('{!! route('loan-product-list-get') !!}', {
                    type: type,
                    term: term,
                    amount: amount
                }, function (data) {
                    // console.log(data);
                    for (var a = 0; a < data.length; a++) {
                        // console.log(data[a].provider.profile.image);
                        var img = (data[a].provider.profile.image === null) ? '<img alt="image" class="img-fluid" style="width: 200px;" src="/img/blank-profile.jpg">': '<img alt="image" class="img-fluid" style="width: 200px;" src="'+ data[a].provider.profile.image +'">';
                        list.push('' +
                            '<tr>' +
                            '<td>' +
                                '' + data[a].name + '' +
                                '<br/>' +
                                '<small>' + data[a].type.display_name + '</small>' +
                            '</td>' +
                            '<td class="project-title">' +
                                '<h2 class="text-success mb-1"><strong>' + data[a].provider.profile.bank_name + '</strong></h2>' +
                                img +
                            '</td>' +
                            '<td>' + data[a].interest_rate + '%</td>' +
                            '<td>' + data[a].duration + ' ' + data[a].timing_name + '</td>' +
                            '<td class="text-right">' + numeral(data[a].amount).format('0,0.00') + '</td>' +
                            '<td class="project-actions">' +
                            // '<a href="#" class="btn btn-white btn-sm show_loan" data-name="' + data[a].name + '" data-provider="' + data[a].provider.profile.bank_name + '" data-amount="' + data[a].amount + '" data-type="' + data[a].type.display_name + '" data-duration="' + data[a].duration + '" data-interest_rate="' + data[a].interest_rate + '"><i class="fa fa-search"></i> View </a>' +
                            '<button type="button" class="btn btn-white btn-sm btn-action" data-action="view-product" data-id="' + data[a].id + '"><i class="fa fa-search"></i> View </button>' +
                            '<button type="button" class="btn btn-white btn-sm show_application btn-action" data-action="apply-loan" data-id="' + data[a].id + '"><i class="fa fa-check"></i> Apply </button>' +
                            '<div class="d-none" id="disclosure_' + data[a].id + '"> ' + data[a].disclosure_html + '</div>' +
                            '</td>' +
                            '</tr>' +
                            '');
                    }
                });
                $('.loan-product-list').find('tbody').empty().append(list.join(''));
            }

            function checkDisbursement() {
                var status = 0;
                // jQuery.ajaxSetup({async:false});
                $.get('{!! route('check-disbursement') !!}', function(data){
                    console.log(data);
                    if(data){
                        console.log('exist');
                    }else{
                        status += 1;
                        swal({
                            title: "Disbursement account not exist!",
                            text: "Create disbursement account to proceed in loan!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#6a73dd",
                            cancelButtonColor: "#DD6B55",
                            confirmButtonText: "Create!",
                            cancelButtonText: "No thanks!",
                            closeOnConfirm: true,
                            closeOnCancel: true },
                        function (isConfirm) {
                            if (isConfirm) {
                                modal.data('type', 'create-disbursement');
                                modal.find('.modal-title').text('Disbursement Account Information');
                                modal.find('#modal-size').removeClass().addClass('modal-dialog modal-md');
                                modal.find('#modal-save-btn').removeClass('d-none');
                                modal.find('.modal-body').empty().append('' +
                                    '<div class="panel panel-default">' +
                                        '<div class="panel-body">' +
                                            '<div class="row">' +
                                                '<div class="col-12 col-lg-4 col-md-6 form-group">' +
                                                    '<label class="i-checks"> <input type="radio" name="account_type" class="disbursement_type" value="GCash" checked> GCash </label>' +
                                                '</div>' +
                                                '<div class="col-12 col-lg-4 col-md-6 form-group">' +
                                                    '<label class="i-checks"> <input type="radio" name="account_type" class="disbursement_type" value="Konect2" readonly> Konect2 </label>' +
                                                '</div>' +
                                                '<div class="col-12 col-lg-4 col-md-6 form-group">' +
                                                    '<label class="i-checks"> <input type="radio" name="account_type" class="disbursement_type" value="Sulit Padala" readonly> Sulit Padala </label>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-12 col-lg-4 col-md-6" id="disbursement_info_box">' +
                                                    '<div class="form-group">' +
                                                        '<label>Account Name</label>' +
                                                        '<input type="text" name="account_name" class="form-control">' +
                                                    '</div>' +
                                                    '<div class="form-group">' +
                                                        '<label>Account Number</label>' +
                                                        '<input type="text" name="account_number" class="form-control">' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '');
                                $('.i-checks').iCheck({
                                    checkboxClass: 'icheckbox_square-green',
                                    radioClass: 'iradio_square-green',
                                });
                                modal.modal({backdrop: 'static', keyboard: false});
                            } else {
                                swal("Cancelled", "Process cancelled", "error");
                            }
                        });
                    }
                });
                return status;
            }

            function computeMonthlyTable() {
                var rowAAIncome = parseInt($('#rowa-a-income').val() || 0);
                var rowABIncome = parseInt($('#rowa-b-income').val() || 0);
                var rowATotal = $('#rowa-total');

                var rowBAIncome = parseInt($('#rowb-a-income').val() || 0);
                var rowBBIncome = parseInt($('#rowb-b-income').val() || 0);
                var rowBTotal = $('#rowb-total');

                var rowCIncome = parseInt($('#rowc-income').val() || 0);
                var rowDIncome = parseInt($('#rowd-income').val() || 0);

                var rowABCDTotal = $('#rowabcd-total');

                var rowEExpense = parseInt($('#rowe-expense').val() || 0);
                var rowFExpense = parseInt($('#rowf-expense').val() || 0);
                var rowEFTotal = $('#rowef-total');

                var totalIncome = $('#total-income');
                var rowASum = 0;
                var rowBSum = 0;
                var rowABCDSum = 0;
                var rowEFSum = 0;
                var totalIncomeSum = 0;

                rowASum += rowAAIncome;
                rowASum += rowABIncome;
                rowATotal.val(rowASum);
                // rowATotal.val(numeral(rowASum).format('0,0'));

                rowBSum += rowBAIncome;
                rowBSum += rowBBIncome;
                rowBTotal.val(rowBSum);
                // rowBTotal.val(numeral(rowBSum).format('0,0.00'));

                rowABCDSum += rowAAIncome;
                rowABCDSum += rowABIncome;
                rowABCDSum += rowBAIncome;
                rowABCDSum += rowBBIncome;
                rowABCDSum += rowCIncome;
                rowABCDSum += rowDIncome;

                rowABCDTotal.val(rowABCDSum);
                // rowABCTotal.val(numeral(rowABCSum).format('0,0.00'));

                rowEFSum += rowEExpense;
                rowEFSum += rowFExpense;

                rowEFTotal.val(rowEExpense + rowFExpense);
                // rowDETotal.val(numeral(rowDExpense + rowEExpense).format('0,0.00'));

                totalIncomeSum += rowABCDSum;
                totalIncomeSum -= rowEFSum;

                totalIncome.val(totalIncomeSum);
                // totalIncome.val(numeral(totalIncomeSum).format('0,0.00'));
            }

        });
    </script>
@endsection
