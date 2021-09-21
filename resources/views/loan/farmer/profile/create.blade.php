@extends('layouts.loan-provider-info')

{{--@section('title', 'Dashboard | '.getRoleName('display_name'))--}}
@section('title', 'Create Profile')

@section('content')
{{--    <div class="row">--}}
{{--        <div class="col">--}}
{{--            <div class="form-group">--}}
{{--                <div class="file-manager text-center">--}}
{{--                    <div id="image-upload" data-submit="" class="portrait-img img-cropper-md"></div>--}}
{{--                    <small class="text-success">click frame to select image</small>--}}
{{--                    <div class="clearfix mt-3"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <main class="page-forms page-register page-farmers">
        <div class="row no-gutters sign-in">
            <div class="col-12 col-lg-4 left d-none d-lg-flex" style="background-image: url({{ asset('images/loan/bg-img.jpg') }})">
                <div class="text">Setup Your Account</div>
            </div>
            <div class="col-12 col-lg-8 right d-flex align-items-center justify-content-center">

                <div class="content w-100">
                    <h1 class="d-block d-lg-none text-center">Setup Your Account</h1>
                    <small>Fill all form field to go next step</small>

                    <form id="form" action="{{ route('farmer-profile-store') }}" method="post" class="wizard-big">
                        @csrf

                        <h1>Profile</h1>
                        <fieldset>
                            <h2>Personal Information</h2>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="file-manager text-center profile_info" data-title="Profile Picture" data-name="image">
                                            <div id="image-upload" data-submit="" class="portrait-img-sm img-cropper-sm"></div>
                                            <small class="text-success">click frame to select image</small>
                                            <div class="clearfix mt-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input name="first_name" type="text" data-title="First name" class="profile_info form-control required" id="first_name">
                                                <label for="first_name">First name *</label>
                                            </div>
                                            <div class="form-group">
                                                <input name="middle_name" type="text" data-title="Middle name" class="profile_info form-control required" id="middle_name">
                                                <label for="middle_name">Middle name *</label>
                                            </div>
                                            <div class="form-group">
                                                <input name="last_name" type="text" data-title="Last name" class="profile_info form-control required" id="last_name">
                                                <label for="last_name">Last name *</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <input name="dob" type="text" data-title="Date of Birth" class="profile_info dob-input form-control required" id="dob">
                                                        <label for="dob">Date of Birth *</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <input name="age" type="text" class="form-control" id="age" readonly>
                                                        <label for="age">Age</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select name="civil_status" data-title="Civil Status" class="profile_info form-control required" id="civil_status">
                                                            <option value="" readonly></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widow/er">Widower</option>
                                                            <option value="Separated">Separated</option>
                                                        </select>
                                                        <label for="civil_status">Civil Status *</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select name="gender" data-title="Gender" class="profile_info form-control required" id="gender">
                                                            <option value="" readonly></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <label for="gender">Gender *</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select name="education" data-title="Education" class="profile_info form-control required" id="education">
                                                    <option value="" readonly></option>
                                                    <option value="High School">High School</option>
                                                    <option value="College">College</option>
                                                    <option value="Post Graduate">Post Graduate</option>
                                                    <option value="Under Graduate">Under Graduate</option>
                                                    <option value="Vocational">Vocational</option>
                                                </select>
                                                <label for="education">Education *</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="tin" type="text" data-title="Tin No." class="profile_info form-control" id="tin">
                                                <label for="tin">Tin No.</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="sss_gsis" type="text" data-title="SSS / GSIS No." class="profile_info form-control" id="sss_gsis">
                                                <label for="sss_gsis">SSS / GSIS No.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="land-line" type="text" data-title="Land Line" class="profile_info form-control" id="land-line">
                                                <label for="land-line">Land Line</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input name="mobile" type="text" data-title="Mobile" class="profile_info form-control" id="mobile">
                                                <label for="mobile">Mobile</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </fieldset>

                        <h1>More Info</h1>
                        <fieldset>
                            <h2>Secondary Information</h2>
                            <div class="row">
                                <div class="col-lg-6 div-box">
                                    <div class="form-group">
                                        <textarea name="address_current" data-title="Current Address" class="secondary_info form-control no-resize" required id="address_current"></textarea>
                                        <label id="address_current">Current Address *</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <input name="address_year_stay" data-title="Years of Stay" type="number" class="secondary_info form-control required" id="address_year_stay">
                                                <label for="address_year_stay">Years of Stay *</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <select name="address_status" data-title="Address Status" id="address_status" class="secondary_info form-control required">
                                                    <option value="" readonly></option>
                                                    <option value="Rented">Rented</option>
                                                    <option value="Owned (Mortgaged)">Owned (Mortgaged)</option>
                                                    <option value="Owned (Not Mortgaged)">Owned (Not Mortgaged)</option>
                                                    <option value="Living with parents / free use">Living with parents / free use</option>
                                                </select>
                                                <label for="address_status">Address Status *</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <h3 class="">Dependents</h3>

                                    <div class="repeater-container">
                                        <div class="row header d-none d-lg-flex">
                                            <div class="col-8"><div class="box">Name</div></div>
                                            <div class="col-4"><div class="box">Birthday</div></div>
                                        </div>
                                        <div class="secondary_info repeater-lists" name="dependents" data-title="Dependents" id="dependent-box"></div>
                                        <div class="actions text-right">
                                            <a href="javascript:;" class="btn-add btn-action" data-action="add-dependent">
                                                <img src="https://img.icons8.com/ios-glyphs/30/38c172/plus-math.png"/>
                                            </a> &nbsp;
                                            <a href="javascript:;" class="btn-add btn-action" data-action="remove-dependent">
                                                <img src="https://img.icons8.com/ios-glyphs/30/38c172/minus-math.png"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <h1>Finish</h1>
                        <fieldset>
                            <div class="terms-conditions-content">
                                <h2>Terms and Conditions</h2>
{{--                                <div class="content">--}}
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I hereby authorize Agrabah Ventures to collect and process my personal information I understand that my personal data is protected by the Data Privacy Act of 2012 (R.A. 10173)</p>
{{--                                </div>--}}
                            </div>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required i-checks"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </main>

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
{{--    {!! Html::style('/css/app.css') !!}--}}
{{--    {!! Html::style('/css/template/style.css') !!}--}}

    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css') !!}
    {!! Html::style('/css/template/plugins/iCheck/custom.css') !!}
    {!! Html::style('/css/template/plugins/steps/jquery.steps.css') !!}
    {!! Html::style('/css/template/plugins/datapicker/datepicker3.css') !!}
    {!! Html::style('/css/template/plugins/daterangepicker/daterangepicker-bs3.css') !!}
    {{--{!! Html::style('/js/template/plugins/') !!}--}}
    <style>
        #image-upload-input-error{
            left: -23px;
            top: -10px;
            position: absolute;
        }
    </style>
@endsection

@section('scripts')
    {{--{!! Html::script('') !!}--}}
{{--    <script src="{{ URL::to('/js/app.js') }}"></script>--}}
{{--    <script src="{{ URL::to('/js/template/inspinia.js') }}"></script>--}}
{{--    <script src="{{ URL::to('/js/template/plugins/metisMenu/jquery.metisMenu.js') }}"></script>--}}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js') !!}
    {!! Html::script('/js/template/plugins/iCheck/icheck.min.js') !!}
    {!! Html::script('/js/template/plugins/steps/jquery.steps.min.js') !!}
    {!! Html::script('/js/template/plugins/validate/jquery.validate.min.js') !!}
    {!! Html::script('/js/template/plugins/slimscroll/jquery.slimscroll.min.js') !!}
    {!! Html::script('/js/template/plugins/datapicker/bootstrap-datepicker.js') !!}
    {!! Html::script('/js/template/plugins/daterangepicker/daterangepicker.js') !!}
    {!! Html::script('/js/template/moment.js') !!}
    {!! Html::script('/js/template/numeral.js') !!}


    <script>
        $(document).ready(function(){
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // submitForm();

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    // Submit form input
                    // var form = $(this);
                    // form.submit();
                    submitForm();
                },
                onInit: function (event, currentIndex)
                {
                    $('#image-upload-input').prop('required',true);
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                }
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('.row-input').keyup(function(){
                computeMonthlyTable();
            });

            $(document).on('change', '#address_status', function(){
                if($(this).val() === 'Rented'){
                    if($('#landlord-box').length){
                        $('#landlord-box').remove();
                    }
                    $(this).closest('.div-box').append('' +
                        '<div id="landlord-box">' +
                            '<div class="form-group">' +
                                '<textarea name="landlord_address" class="form-control no-resize required" id="landlord_address"></textarea>' +
                                '<label for="landlord_address">Landlords address if rented *</label>' +
                            '</div>' +
                            '<div class="form-group">' +
                                '<input name="landlord_number" type="text" class="form-control required" id="landlord_number">' +
                                '<label for="landlord_number">Landlords contact number *</label>' +
                            '</div>' +
                        '</div>' +
                    '');
                }else{
                    $('#landlord-box').remove();
                }

            });

            $(document).on('change', '#dob', function(){
                var dob = moment($(this).val());
                $('input[name=age]').val(moment().diff(dob, 'years')).trigger('focus');
                $(this).trigger('focus');
            });

            $(document).on('click', '.btn-action', function(){
                var action = $(this).data('action'), dependentBox = $('#dependent-box'), assetsBox = $('#assets-box');
                switch(action){
                    case 'add-dependent':
                        var dependentCount = dependentBox.children().length;
                        dependentBox.append('' +
                            '<div class="repeater-item">' +
                                '<div class="row">' +
                                    '<div class="col-12 col-lg-7">' +
                                        '<input type="text" name="dependent-name-'+ dependentCount +'" class="form-control required" id="name-'+ dependentCount +'" placeholder="Name" required>' +
                                    '</div>' +
                                    '<div class="col-12 col-lg-5">' +
                                        '<input type="text" name="dependent-dob-'+ dependentCount +'" class="form-control required dob-input" id="dob-'+ dependentCount +'" placeholder="Date of Birth" required>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '');
                        $('.dob-input').datepicker({
                            startView: 1,
                            todayBtn: "linked",
                            keyboardNavigation: false,
                            forceParse: false,
                            autoclose: true,
                            format: "mm/dd/yyyy"
                        });
                        break;
                    case 'remove-dependent':
                        dependentBox.find('.repeater-item').last().remove();
                        break;
                }
            });

            $('.dob-input').datepicker({
                startView: 2,
                todayBtn: false,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "mm/dd/yyyy"
            });

            function submitForm(){
                var forms = new Array();

                var profile_info = new Array();
                $('.profile_info').each(function(){
                    var name = null;
                    var title = null;
                    var value = null;
                    if($(this).data('title') === 'Profile Picture'){
                        name = $(this).data('name');
                        title = $(this).data('title');
                        value = ($(this).find('img').attr('src').length < 1) ? 'N/A': $(this).find('img').attr('src');
                    }else{
                        name = $(this).attr('name');
                        title = $(this).data('title');
                        value = ($(this).val().length < 1) ? 'N/A': $(this).val();
                    }

                    var values = new Array();
                    values.push(name);
                    values.push(title);
                    values.push(value);

                    profile_info.push(values);
                });
                forms.push(profile_info);

                var secondary_info = new Array();
                $('.secondary_info').each(function(){
                    var name = $(this).attr('name');
                    var title = $(this).data('title');
                    var value = $(this).val();
                    var values = new Array();

                    if(title === 'Dependents'){
                        if($(this).children().length > 0){
                            var dependent = new Array();
                            $(this).find('.repeater-item').each(function(){
                                var item = new Array();
                                item.push($(this).find('input[type=text]').first().val());
                                item.push($(this).find('input[type=text]').last().val());
                                // item.push($(this).find('input[name=dependent-name]').val());
                                // item.push($(this).find('input[name=dependent-dob]').val());
                                dependent.push(item);
                            });
                            value = dependent;
                        }
                    }

                    values.push(name);
                    values.push(title);
                    values.push(value);

                    if( (title === 'Address Status') && (value === 'Rented') ){
                        var landlord = new Array();
                        landlord.push($('#landlord-box').find('#landlord_address').val());
                        landlord.push($('#landlord-box').find('#landlord_number').val());
                        values.push(landlord);
                    }
                    secondary_info.push(values);
                });
                forms.push(secondary_info);

                console.log(forms);

                $.post('{!! route('user-profile-store') !!}', {
                    _token: '{!! csrf_token() !!}',
                    forms: forms
                }, function(data){
                    console.log(data);
                    window.location.replace(data);
                });
            }

        });
    </script>

@endsection
