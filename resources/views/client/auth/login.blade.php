@extends('layouts.master-client')

@section('title')
    Login
@endsection

@section('content')
    <div class="wrapper">
        <div class="login-container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left-pane">
                        <div class="img-container">
                            <img src="http://ag-test.juanna.co/wp-content/themes/agbh-theme/img/logo.png" class="img-fluid logo-img">
                        </div>

                        <div class="logo-header">
                            <span class="font-weight-bold logo-header-lbl">Lorem Ipsum Dolor</span>
                        </div>

                        <div class="description">
                            <ul>
                                <li>Easy to use</li>
                                <li>Report Generator</li>
                                <li>Join us now</li>
                            </ul>
                        </div>

                        <div class="left-pane-footer">
                            <span class="link-to-homepage">Back to homepage</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="right-pane">
                        <div class="pane-login-container">
                            <div class="w-underline">
                                <span class="font-weight-bold login-lbl">Login</span>
                            </div>
                            <div class="login-sub-lbl">
                                Log in using your login and password or use social media login to enter.
                            </div>
                        </div>

                        <div class="form-container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Email address</label>
                                    <input type="email" class="form-control ag-input"  placeholder="yourname@domain.co">
                                </div>
                                <div class="col-lg-12 m-t-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control ag-input"  placeholder="password">
                                </div>
                            </div>
                        </div>

                        <div class="separator">
                            <h2 class="middle-line">
                                <span>or</span>
                            </h2>
                            <span>Log in with</span>
                        </div>


                        <div class="socials-container">
                            <div style="width: 100%; padding: 5px; display: flex; justify-content: center">
                                <img style="width: 30px; height: 30px;" src="http://agrabah.test/images/google.png">
                                <img style="width: 30px; height: 30px; margin-left: 20px; margin-right: 20px;" src="http://agrabah.test/images/facebook.png">
                                <img style="width: 30px; height: 30px;" src="http://agrabah.test/images/twitter.png">
                            </div>
                        </div>

                        <div class="btn-container">
                            <button class="btn ag-btn btn-primary" type="submit">Login</button>
                        </div>

                        <div class="right-pane-footer">
                            <span class="forgot-password-lbl">Forgot password?</span> <br /> <br /> <br /> <br />
                            <span class="not-registered-lbl">Not registered yet? Sign up now!</span>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .not-registered-lbl {
        font-weight: bold;
        color: #487BAD;
        cursor: pointer;
        font-size: 1.2rem;
    }

    .right-pane-footer {
        margin-left: 15%;
        margin-right: 160px;
        text-align: center;
        margin-top: 20px;
        height: 10%;
    }

    .forgot-password-lbl {
        font-weight: bold;
        font-size: 0.8rem;
        cursor: pointer;
    }

    .btn-container {
        margin-left: 15%;
        margin-right: 160px;
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }

    .socials-container {
        margin-left: 15%;
        margin-right: 160px;
        background: #EBEBEB;
        padding: 10px;
        border-radius: 10px;
    }

    .middle-line {
        width: 100%;
        text-align: center;
        border-bottom: 2px solid #B9B9B9;
        line-height: 0.1em;
        margin: 31px 0 20px;
    }

    .separator {
        padding-left: 15%;
        padding-right: 160px;
        text-align: center;
        padding-bottom: 10px;
    }

    .separator span {
        font-size: 0.8rem;
        font-weight: bold;
    }

    .middle-line span {
        background: #F3F4F6;
        padding: 0 10px;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .m-t-3 {
        margin-top: 3%;
    }

    .left-pane {
        background: #084d91;
        color: #fff;
        height: 100vh;
    }

    .right-pane {
        color: #181919;
    }

    .login-lbl {
        font-size: 2rem;
    }

    .login-sub-lbl {
        padding-top: 10px;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .form-container {
        padding-left: 15%;
        padding-top: 5%;
        font-weight: bold;
        padding-right: 160px;
    }

    .w-underline {
        width: 79%;
        border-bottom: 4px solid #C8C8C8;
    }

    .pane-login-container {
        padding-top: 20%;
        padding-left: 15%;
    }

    .link-to-homepage {
        cursor: pointer;
        font-size: 0.8rem;
    }
    .img-container {
        display: flex;
        justify-content: center;
    }

    .logo-header-lbl {
        font-size: 1.4rem;
    }

    .description {
        padding: 4% 0 0 15%;
    }

    .left-pane-footer {
        margin-top: 40%;
        text-align: center;
    }

    .logo-header {
        padding: 10% 0 0 15%;
    }

    .logo-img {
        filter: brightness(0) invert(1);
        width: 50%;
        margin-top: 30%;
    }

    body {
        overflow: hidden;
    }
</style>

@section('styles')
@endsection

@section('scripts')
    <script>

    </script>
@endsection