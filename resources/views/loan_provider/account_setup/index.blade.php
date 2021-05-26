@extends('layouts.master-loan-provider')

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
                        <form action="{{route('loan_provider.loan_provider.store')}}" method="POST" role="form">
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
                                @csrf
                                <h5>Personal Information</h5>
                                <div class="form-group">
                                    <input name="fname" type="text" class="form-control wizard-required" id="fname">
                                    <label for="fname" class="wizard-form-text-label">First Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="mname" type="text" class="form-control wizard-required" id="mname">
                                    <label for="mname" class="wizard-form-text-label">Middle Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="lname" type="text" class="form-control wizard-required" id="lname">
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
                                    <input name="bank_name" type="text" class="form-control wizard-required" id="bname">
                                    <label for="bname" class="wizard-form-text-label">Bank Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="branch_name" type="text" class="form-control wizard-required" id="brname">
                                    <label for="brname" class="wizard-form-text-label">Branch Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="address_line" type="text" class="form-control wizard-required" id="address_line">
                                    <label for="address_line" class="wizard-form-text-label">Address Line</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="account_name" type="text" class="form-control wizard-required" id="acname">
                                    <label for="acname" class="wizard-form-text-label">Account Name*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="account_number" type="text" class="form-control wizard-required" id="acon">
                                    <label for="acon" class="wizard-form-text-label">Account Number*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="tin" type="text" class="form-control wizard-required" id="tin">
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
                                    <input name="contact_person" type="text" class="form-control wizard-required" id="contact_person">
                                    <label for="contact_person" class="wizard-form-text-label">Contact Person</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="contact_number" type="text" class="form-control wizard-required" id="contact_number">
                                    <label for="contact_number" class="wizard-form-text-label">Contact Number</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input name="designation" type="text" class="form-control wizard-required" id="designation">
                                    <label for="designation" class="wizard-form-text-label">Designation</label>
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
                                    <button type="submit" class="form-wizard-submit float-right">Submit</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>w
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
