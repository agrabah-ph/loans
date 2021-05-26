@extends('layouts.master-borrower')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-2">
                <div class="card">
                    <h5 class="card-header">Loan Application Form</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="loan_type">Loan Type</label>
                                    <input type="loan_type" class="form-control" id="loan_type" value="Farmer Loan"  placeholder="Loan Type" readonly>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amount">Desired Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="loan_purpose">Loan Purpose</label>
                                    <input type="text" class="form-control" name="loan_purpose" id="loan_purpose" placeholder="">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="terms">Terms to Pay</label>
                                    <select name="terms" id="" class="form-control">
                                        <option value="6">6 Month</option>
                                        <option value="12">12 Month</option>
                                        <option value="24">24 Month</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="tenure_in_business">How long have you been in the agriculture business?</label>
                                    <select name="tenure_in_business" id="" class="form-control">
                                        <option value="6">6 Month</option>
                                        <option value="12">1 Years</option>
                                        <option value="24">2 Years</option>
                                        <option value="36">3 Years</option>
                                        <option value="62">5 Years and Above</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="current_address">Current Address</label>
                                    <input type="text" class="form-control" name="current_address" id="current_address" placeholder="">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" placeholder="">
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
                            <button type="submit" class="btn btn-block ag-primary">Submit Loan Application</button>
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
