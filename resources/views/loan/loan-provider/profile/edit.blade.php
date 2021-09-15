@extends('loan.master')
@section('title', 'Profile Edit')

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
                <button type="button" class="btn btn-primary" id="update-profile">Update Profile</button>
            </div>
        </div>
    </div>

    <div id="app" class="wrapper wrapper-content">

        <div class="row animated fadeInRight">
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-title"><h5>Bank Detail</h5></div>
                    <div>
                        <div class="ibox-content no-padding border-left-right">
                            <div class="form-group">
                                <div class="file-manager text-center profile_info" data-title="Profile Picture" data-name="image">
                                    <div id="image-upload" data-submit="" class="landscape-img img-cropper-lg">

                                    </div>
                                    <small class="text-success">click frame to select image</small>
                                    <div class="clearfix mt-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content profile-content">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" value="{{ $data->profile->bank_name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Branch Name</label>
                                <input type="text" name="branch_name" value="{{ $data->profile->branch_name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Branch Code</label>
                                <input type="text" name="branch_code" value="{{ $data->profile->branch_code }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address Line</label>
                                <textarea name="branch_address" class="form-control no-resize">{{ $data->profile->branch_address }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="ibox ">
                    <div class="ibox-title"><h5>Contacts Detail</h5></div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2>Primary Contact</h2>
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" name="first_name" value="{{ $data->profile->first_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Middle name</label>
                                    <input type="text" name="middle_name" value="{{ $data->profile->middle_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" name="last_name" value="{{ $data->profile->last_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" value="{{ $data->profile->designation }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile no.</label>
                                    <input type="text" name="mobile" value="{{ $data->profile->mobile }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Land-line no.</label>
                                    <input type="text" name="landline" value="{{ $data->profile->landline }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h2>Secondary Contact</h2>
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <input type="text" name="contact_person" value="{{ $data->profile->contact_person }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="contact_designation" value="{{ $data->profile->contact_designation }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Contact no.</label>
                                    <input type="text" name="contact_number" value="{{ $data->profile->contact_number }}" class="form-control">
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
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css') !!}
@endsection

@section('scripts')
    {{--    {!! Html::script('') !!}--}}
    {{--    {!! Html::script(asset('vendor/datatables/buttons.server-side.js')) !!}--}}
    {{--    {!! $dataTable->scripts() !!}--}}
    {{--    {!! Html::script('/js/template/plugins/sweetalert/sweetalert.min.js') !!}--}}
    {{--    {!! Html::script('/js/template/moment.js') !!}--}}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js') !!}
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
            loadImage();
            function loadImage(){
                var img = '{!! $data->profile->image !!}';
                if(img.length > 0){
                    $('#image-upload').append('<img src="'+ img +'" class="img-fluid" id="img-cropper-result">');
                }
            }

            $(document).on('click', '#update-profile', function(){
                var forms = new Array(), img;
                $('.form-control').each(function(){
                    forms.push($(this).val() || null)
                });
                img = $('#img-cropper-result').attr('src') || null;
                forms.push(img)
                console.log(forms);
                $.post('{!! route('profile-update') !!}', {
                    _token: '{!! csrf_token() !!}',
                    forms: forms
                }, function(data){
                    console.log(data);
                    window.location.replace(data);
                });
            });

        });
    </script>
@endsection
