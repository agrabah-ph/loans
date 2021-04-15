@extends('layouts.master-borrower')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Active Loan</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <p>Loan #1</p>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        Loan Provider
                                    </div>
                                    <div class="col-6">
                                        Feb 21, 2021
                                    </div>
                                </div>

                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary ag-primary">Loan Calendar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-top: 20px;">
                <div class="card">
                    <h5 class="card-header">Offered Loans</h5>
                    <div class="card-body">
                        {{--foreach--}}
                        <div class="row">
                            <div class="col-12" style="padding:15px;">
                                <div class="row">
                                    <div class="col-3">
                                        <div style="background-image: url('{{asset('images/logo.png')}}'); background-size: cover; background-position: center; margin: auto; background-repeat: no-repeat; width:120px; height: 120px; border-radius: 50%" ></div>
                                    </div>
                                    <div class="col-6" style="padding: 20px;">
                                        <p class="mb-0"><b>Loan Type</b></p>
                                        <p>Lorem ipsum dolor este con karne.</p>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-success ag-success" style="margin-top: 30px;">Apply for Loan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-12" style="padding:15px;">
                                <div class="row">
                                    <div class="col-3">
                                        <div style="background-image: url('{{asset('images/logo.png')}}'); background-size: cover; background-position: center; margin: auto; background-repeat: no-repeat; width:120px; height: 120px; border-radius: 50%" ></div>
                                    </div>
                                    <div class="col-6" style="padding: 20px;">
                                        <p class="mb-0"><b>Loan Type</b></p>
                                        <p>Lorem ipsum dolor este con karne.</p>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-success ag-success" style="margin-top: 30px;">Apply for Loan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12" style="padding:15px;">
                                <div class="row">
                                    <div class="col-3">
                                        <div style="background-image: url('{{asset('images/logo.png')}}'); background-size: cover; background-position: center; margin: auto; background-repeat: no-repeat; width:120px; height: 120px; border-radius: 50%" ></div>
                                    </div>
                                    <div class="col-6" style="padding: 20px;">
                                        <p class="mb-0"><b>Loan Type</b></p>
                                        <p>Lorem ipsum dolor este con karne.</p>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-success ag-success" style="margin-top: 30px;">Apply for Loan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection