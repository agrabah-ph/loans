@extends('loan.master')

@section('title', 'Reports')

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
{{--        <div class="col-sm-8">--}}
{{--            <div class="title-action">--}}
{{--                <a href="#" class="btn btn-primary">This is action area</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div id="app" class="wrapper wrapper-content">

        <div class="row">
            <div class="col-sm-3 order-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="form-group">
                            <input type="text" class="form-control m-b-xs" id="filter" placeholder="Search in table">
                        </div>
                        <div class="form-group">
                            <select name="loan-status-select" id="loan-status-select" class="form-control">
                                <option value="">Loan Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Active">Active</option>
                                <option value="Completed">Completed</option>
                                <option value="Declined">Declined</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="ibox float-e-margins">
{{--                    <div class="ibox-title">--}}
{{--                        <h5>Blank <small>page</small></h5>--}}
{{--                    </div>--}}
                    <div class="ibox-content" id="result-box">

                        <div class="text-center">
                            <h2>No records to show</h2>
                        </div>

{{--                        <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Info</th>--}}
{{--                                <th>Amount</th>--}}
{{--                                <th>Duration/Tenure</th>--}}
{{--                                <th>Created</th>--}}
{{--                                <th>Last Updated</th>--}}
{{--                                <th>Borrower</th>--}}
{{--                                <th class="text-right" data-sort-ignore="true"><i class="fa fa-cogs text-success"></i></th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <span>Product 1</span><br>--}}
{{--                                    <small>Short Loan</small>--}}
{{--                                </td>--}}
{{--                                <td>100000</td>--}}
{{--                                <td>5 months</td>--}}
{{--                                <td>5 dsys ago</td>--}}
{{--                                <td>1 hr ago</td>--}}
{{--                                <td>jasper garcera</td>--}}
{{--                                <td class="text-right">--}}
{{--                                    <div class="btn-group text-right">--}}
{{--                                        <a href="" class="action btn-white btn btn-xs"><i class="fa fa-search text-success"></i> Show</a>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                            <tfoot>--}}
{{--                            <tr>--}}
{{--                                <td colspan="7">--}}
{{--                                    <ul class="pagination pull-right"></ul>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tfoot>--}}
{{--                        </table>--}}

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
        {!! Html::script('/js/template/moment.js') !!}
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
            getList();
            $(document).on('change', '#loan-status-select', function(){
                getList();
            });
            function getList(){
                var status = $('#loan-status-select').val();
                var list = new Array();
                var box = $('#result-box');


                jQuery.ajaxSetup({
                    async: false
                });
                $.get('{!! route('get-loan-report') !!}', {
                    status: status
                }, function(data){
                    console.log(data);
                    console.log(data.length)
                    if(data.length > 0){
                        switch(status){
                            case 'Active':
                                for(let a = 0; a < data.length; a++){
                                    var borrower = (data[a].borrower.community_leader === 0)? 'Farmer':'Community Leader';
                                    list.push('' +
                                        '<tr>' +
                                        '<td>' +
                                            '<span>'+ data[a].borrower.profile.first_name +' '+ data[a].borrower.profile.last_name +'</span><br>' +
                                            '<small>'+ borrower +'</small>' +
                                        '</td>' +
                                        '<td>' +
                                            '<span>'+ data[a].product.name +'</span><br>' +
                                            '<small>'+ data[a].product.type.display_name +'</small>' +
                                        '</td>' +
                                        '<td>'+ data[a].amount +'</td>' +
                                        '<td>'+ data[a].duration +' '+ data[a].timing +'/s</td>' +
                                        '<td>'+ data[a].created_at +'</td>' +
                                        '<td>' +
                                            '<span>'+ data[a].due_info.date_diff +'</span><br>' +
                                            '<small>'+ data[a].due_info.date_diff +'</small>' +
                                        '</td>' +
                                        '<td class="text-right">' +
                                        '<div class="btn-group text-right">' +
                                        // '<a href="" class="action btn-white btn btn-xs"><i class="fa fa-search text-success"></i> Show</a>' +
                                        '</div>' +
                                        '</td>' +
                                        '</tr>' +
                                        '');
                                }
                                break;
                            case 'Completed':
                                for(let a = 0; a < data.length; a++){
                                    list.push('' +
                                        '<tr>' +
                                        '<td>' +
                                        '<span>Product 1 '+ a +'</span><br>' +
                                        '<small>Short Loan</small>' +
                                        '</td>' +
                                        '<td>100000</td>' +
                                        '<td>5 months</td>' +
                                        '<td>5 dsys ago</td>' +
                                        '<td>1 hr ago</td>' +
                                        '<td>jasper garcera</td>' +
                                        '<td class="text-right">' +
                                        '<div class="btn-group text-right">' +
                                        '<a href="" class="action btn-white btn btn-xs"><i class="fa fa-search text-success"></i> Show</a>' +
                                        '</div>' +
                                        '</td>' +
                                        '</tr>' +
                                        '');
                                }
                                break;
                            default:
                                for(let a = 0; a < data.length; a++){
                                    list.push('' +
                                        '<tr>' +
                                        '<td>' +
                                        '<span>Product 1 '+ a +'</span><br>' +
                                        '<small>Short Loan</small>' +
                                        '</td>' +
                                        '<td>100000</td>' +
                                        '<td>5 months</td>' +
                                        '<td>5 dsys ago</td>' +
                                        '<td>1 hr ago</td>' +
                                        '<td>jasper garcera</td>' +
                                        '<td class="text-right">' +
                                        '<div class="btn-group text-right">' +
                                        '<a href="" class="action btn-white btn btn-xs"><i class="fa fa-search text-success"></i> Show</a>' +
                                        '</div>' +
                                        '</td>' +
                                        '</tr>' +
                                        '');
                                }
                        }

                    }else{
                        list.push('' +
                            '<tr>' +
                            '<td class="text-center" colspan="7"><h2>No Available Data</h2></td>' +
                            '</tr>' +
                        '');
                    }


                });

                list.join('');
                // console.log(list);
                switch(status){
                    case 'Active':
                        box.empty();
                        box.append('' +
                            '<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>' +
                                '<thead>' +
                                    '<tr>' +
                                    '<th>Borrower</th>' +
                                    '<th>Info</th>' +
                                    '<th>Amount</th>' +
                                    '<th>Duration/Tenure</th>' +
                                    '<th>Created</th>' +
                                    '<th>Next Due Date</th>' +
                                    '<th class="text-right" data-sort-ignore="true"><i class="fa fa-cogs text-success"></i></th>' +
                                    '</tr>' +
                                '</thead>' +
                                '<tbody>'+ list +'</tbody>' +
                                '<tfoot>' +
                                    '<tr>' +
                                    '<td colspan="7">' +
                                    '<ul class="pagination pull-right"></ul>' +
                                    '</td>' +
                                    '</tr>' +
                                '</tfoot>' +
                            '</table>' +
                        '');
                        break;
                    case 'Completed':
                        box.empty();
                        box.append('' +
                            '<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>' +
                                '<thead>' +
                                    '<tr>' +
                                    '<th>Borrower</th>' +
                                    '<th>Info</th>' +
                                    '<th>Amount</th>' +
                                    '<th>Duration/Tenure</th>' +
                                    '<th>Created</th>' +
                                    '<th>Last Payment</th>' +
                                    '<th class="text-right" data-sort-ignore="true"><i class="fa fa-cogs text-success"></i></th>' +
                                    '</tr>' +
                                '</thead>' +
                                '<tbody>'+ list +'</tbody>' +
                                '<tfoot>' +
                                    '<tr>' +
                                    '<td colspan="7">' +
                                    '<ul class="pagination pull-right"></ul>' +
                                    '</td>' +
                                    '</tr>' +
                                '</tfoot>' +
                            '</table>' +
                        '');
                        break;
                    default:
                        box.empty();
                        box.append('' +
                            '<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>' +
                                '<thead>' +
                                    '<tr>' +
                                    '<th>Borrower</th>' +
                                    '<th>Info</th>' +
                                    '<th>Amount</th>' +
                                    '<th>Duration/Tenure</th>' +
                                    '<th>Created</th>' +
                                    '<th class="text-right" data-sort-ignore="true"><i class="fa fa-cogs text-success"></i></th>' +
                                    '</tr>' +
                                '</thead>' +
                                '<tbody>'+ list +'</tbody>' +
                                '<tfoot>' +
                                    '<tr>' +
                                    '<td colspan="7">' +
                                    '<ul class="pagination pull-right"></ul>' +
                                    '</td>' +
                                    '</tr>' +
                                '</tfoot>' +
                            '</table>' +
                        '');
                        break;
                }
            }

        });
    </script>
@endsection
