<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Admin Login </title>
    <link rel="stylesheet" href="{{ asset('vendors/vendor/toastr/css/toastr.min.css')}}">
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendors/images/favicon.png') }}">
    <link href="{{ url('vendors/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="
    incation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <h3>Your login</h3>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account vendor</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (Session::has('message'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-info">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if (Session::has('fail'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <form action="{{url('vendor/signup') }}"   method="post">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Name</strong></label>
                                            <input type="text" class="form-control inpt" name="name"
                                                placeholder="sam" value="{{ old('name') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="text" class="form-control inpt" name="email"
                                                placeholder="sam....@gmail.com" value="{{ old('email') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control inpt" name="password"
                                                placeholder="********">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Confirm Password</strong></label>
                                            <input type="password" class="form-control inpt" name="confirm_password"
                                                placeholder="********">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            {{-- <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div> --}}
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{{url('vendor/login')}}}">Sign
                                                In</a></p>
                                    </div>
                                    {{-- <button type="button" class="btn btn-dark mb-2 me-2" id="toastr-success-top-right">Top
                                        Right</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('vendors/vendor/global/global.min.js') }}"></script>
    <script src="{{ url('vendors/js/custom.min.js') }}"></script>
    <script src="{{ url('vendors/js/dlabnav-init.js') }}"></script>
    <script src="{{ url('vendors/js/styleSwitcher.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ url('vendors/vendor/toastr/js/toastr.min.js')}}"></script>

        <!-- All init script -->
        <script src="{{ url('vendors/js/plugins-init/toastr-init.js')}}"></script>
</body>

</html>
