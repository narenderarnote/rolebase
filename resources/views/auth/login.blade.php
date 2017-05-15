
@extends('layouts.backend-2')

@section('title', 'Login')

@section('body-class', "login")

@push('scripts')
    <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function(){
            User.init();
        })
    </script>
@endpush

@section('content')
    <div class="content">
        <!-- BEGIN LOGIN FORM -->

        <form class="login-form" action="" method="post">

            {{ csrf_field() }}
            <h3 class="form-title">Sign In</h3>
            @include('common.errors')

            @if(session('msg_login_error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     {{ session('msg_login_error') }}
                </div>
            @endif
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span>
                Enter Email and password. </span>
            </div>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success uppercase">Login</button>
                <label class="rememberme check">
                <input type="checkbox" name="remember" value="1"/>Remember </label>
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
            <!-- <div class="login-options">
                <h4>Or login with</h4>
                <ul class="social-icons">
                    <li>
                        <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                    </li>
                </ul>
            </div> -->
            <div class="create-account">
                <p>
                    <a href="#register-btn" id="register-btn" class="uppercase">Create an account</a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="{{ route('password.forgot') }}" method="post">
            {{ csrf_field() }}
            <h3>Forget Password ?</h3>
            <p>
                 Enter your e-mail address below to reset your password.
            </p>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">Back</button>
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->

        <!-- BEGIN FORGOT PASSWORD FORM -->
        <!-- <form class="forget-form" action="/" method="post">
            <h3>Reset Password ?</h3>
            <p>
                 Enter your e-mail address below to reset your password.
            </p>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">Back</button>
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </form> -->
        <!-- END FORGOT PASSWORD FORM -->

        <!-- BEGIN REGISTRATION FORM -->
        <form class="register-form" action="/register" method="post">

            @customHash(#register-btn)

            {{ csrf_field() }}
            <h3>Sign Up</h3>

            @include('common.errors')
            <p class="hint">
                 Enter your personal details below:
            </p>
            <div class="form-group">
                <!-- <label>Register as </label><br/> -->
                <div class="btn-group error-msg" data-toggle="buttons">
                  <label class="btn btn-success">
                  <input type="radio" class="toggle" value="4" name="type">Register as Student </label>
                  <label class="btn btn-success">
                  <input type="radio" class="toggle" value="2" name="type">Register as Broker </label>
                  <!-- <label class="btn btn-success">
                  <input type="radio" class="toggle" value="3" name="type"> College </label> -->
                 </div>
            </div>

            <div class="form-group" id="first_name">
                <label class="control-label visible-ie8 visible-ie9">First Name</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="first_name"/>
            </div>
            <div class="form-group" id="last_name">
                <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last_name"/>
            </div>
            <div class="form-group " id="name">
                <label class="control-label visible-ie8 visible-ie9">Name</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Name" name="name"/>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
            </div>
            <div class="form-group " id="name">
                <label class="control-label visible-ie8 visible-ie9">Mobile Number</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile Number" name="phone"/>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password_confirmation"/>
            </div>
            
            <div class="form-group margin-top-20 margin-bottom-20">
                <label class="check">
                <input type="checkbox" name="tnc"/> I agree to the <a href="javascript:;">
                Terms of Service </a>
                & <a href="javascript:;">
                Privacy Policy </a>
                </label>
                <div id="register_tnc_error">
                </div>
            </div>
            <div class="form-actions">
                <button type="button" id="register-back-btn" class="btn btn-default">Back</button>
                <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </form>
        <!-- END REGISTRATION FORM -->
    </div>
@endsection




