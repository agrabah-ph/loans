@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">Loan Types</h5>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Loan Type</th>
                                <th>Interest</th>
                                <th>Required Credit Points</th>
                                <th>Terms</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Farmer's Loan</td>
                                <td>10%</td>
                                <td>75%</td>
                                <td>43</td>
                                <td class="text-center"><a href="#" title="Click to edit"><i class="fas fa-pen-square"></i></a> <a href="#" title="Click to delete"><i class="fas fa-trash"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="card">
                    <h5 class="card-header">Create Loan Type</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="loan_type">Loan Type</label>
                                    <input type="loan_type" class="form-control" id="loan_type" placeholder="Loan Type">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="terms">Default Terms</label>
                                    <input type="text" class="form-control" id="terms">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="interest">Interest</label>
                                    <input type="text" class="form-control" id="interest" placeholder="5%">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="requiredCreditScore">Required Credit Score</label>
                                    <input type="text" class="form-control" id="requiredCreditScore" placeholder="Required Credit Score">
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<div class="form-check">--}}
                            {{--<input class="form-check-input" type="checkbox" id="gridCheck">--}}
                            {{--<label class="form-check-label" for="gridCheck">--}}
                            {{--Check me out--}}
                            {{--</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <button type="submit" class="btn btn-block ag-primary">Create Loan Type</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#example').DataTable({
                language: { search: '', searchPlaceholder: "Search..." },
            });
        });

    </script>
@endpush
