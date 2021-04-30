@extends('layouts.master')

@section('title')
    Account Setup
@endsection

@section('content')
    <div>
        <section class="wizard-section">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6">
                    <div class="wizard-content-left d-flex justify-content-center align-items-center">
                        <h1>Setup Your Account</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-wizard">
                        <form action="" method="post" role="form">
                            <div class="form-wizard-header">
                                <p>Fill all form field to go next step</p>
                                <ul class="list-unstyled form-wizard-steps clearfix">
                                    <li class="active"><span>1</span></li>
                                    <li><span>2</span></li>
                                    <li><span>3</span></li>
                                    <li><span>4</span></li>
                                </ul>
                            </div>
                            <fieldset class="wizard-fieldset show">
                                <h5>Personal Information</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="fname">
                                    <label for="fname" class="wizard-form-text-label">First Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="mname">
                                    <label for="mname" class="wizard-form-text-label">Middle Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="lname">
                                    <label for="lname" class="wizard-form-text-label">Last Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">
                                <h5>Bank Information</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="bname">
                                    <label for="bname" class="wizard-form-text-label">Bank Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="brname">
                                    <label for="brname" class="wizard-form-text-label">Branch Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control wizard-required" id="email">
                                    <label for="email" class="wizard-form-text-label">Address Line</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="acname">
                                    <label for="acname" class="wizard-form-text-label">Account Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="acon">
                                    <label for="acon" class="wizard-form-text-label">Account Number*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="tin">
                                    <label for="tin" class="wizard-form-text-label">TIN*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                    <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">
                                <h5>Additional Information</h5>
                                <div class="form-group">
                                    <input type="email" class="form-control wizard-required" id="email">
                                    <label for="email" class="wizard-form-text-label">Contact Person</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control wizard-required" id="email">
                                    <label for="email" class="wizard-form-text-label">Contact Number</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control wizard-required" id="email">
                                    <label for="email" class="wizard-form-text-label">Designation</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                    <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">
                                <h5>Payment Information</h5>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                    <a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/form-wizard.css') }}">
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/form-wizard.js') }}" defer></script>
    <script>

    </script>
@endpush
