@extends('vendors.layouts.layout')
@section('content')



    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mt-3">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Password</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Update</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="breadcrumb-item">UPDATE YOUR PASSWORD TO SECURE YOUR DASHBOARD...</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">


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
                                    <div class="alert alert-primary">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif





                                <form method="post" action="{{ url('vendor/password-update') }}" id="frm">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="text-label form-label" for="validationCustomUsername">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            <input type="text" class="form-control" id="validationCustomUsername"
                                                placeholder="Enter a username.." required="" readonly
                                                value="{{ Auth::guard('vendor')->user()->email }}">
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-label form-label" for="validationCustomUsername">Admin
                                            Type</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            <input type="text" class="form-control" id="validationCustomUsername"
                                                placeholder="Enter a username.." required="" readonly
                                                value="{{ Auth::guard('vendor')->user()->name }}">
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <label class="text-label form-label" for="dlab-password">Old Password<span
                                                style="color:rgb(255, 0, 0)"> *</span> <span id="error_password" style="margin-left: 10px"></span></label>
                                        <div class="input-group transparent-append">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                            <input type="password" class="form-control currentpassword "
                                                name="currentpassword" id="dlab-password" placeholder="Choose a safe one.."
                                                required="">
                                            <span class="input-group-text show-pass">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="mb-3 mt-2">
                                        <label class="text-label form-label" for="dlab-password2">Update Password <span
                                                style="color:rgb(255, 0, 0)"> *</span></label>
                                        <div class="input-group transparent-append">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                            <input type="password" name="newpassword" class="form-control" id="password"
                                                placeholder="Choose a safe one.." required="">

                                            <span class="input-group-text " id="togglePassword">

                                            </span>
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-label form-label" for="dlab-password">Confirm Password<span
                                                style="color:rgb(255, 0, 0)"> *</span></label>
                                        <div class="input-group transparent-append">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                            <input type="password" name="confirmpassword" class="form-control"
                                                id="password" placeholder="Choose a safe one.." required="">

                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp; <span id="notmatchpass"></span>
                                    </div>
                                    {{-- <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required="" >
                                        <label class="form-check-label" for="invalidCheck2">
                                            Check Me out
                                        </label>
                                    </div>
                                </div> --}}
                                    <button type="submit"  class="btn me-3 btn-success ">Update your
                                        password</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>









                {{-- <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="breadcrumb-item ">UPDATE YOUR PROFILE </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">


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
                                @if (Session::has('success_profile'))
                                    <div class="alert alert-primary">
                                        {{ Session::get('success_profile') }}
                                    </div>
                                @endif





                                 <form method="post" action="{{ url('vendor/profile-update') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="text-label form-label" for="validationCustomUsername">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            <input type="text" class="form-control" id="validationCustomUsername"
                                                placeholder="Enter a username.." required="" readonly
                                                value="{{ Auth::guard('vendor')->user()->email }}">
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-label form-label" for="validationCustomUsername">Admin
                                            Type</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            <input type="text" class="form-control "  id="myText"
                                                placeholder="Enter a username.." required="" name="name"
                                                value="{{ Auth::guard('vendor')->user()->name }}">
                                            
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-label form-label" for="validationCustomUsername">Admin
                                            Type</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                            <input type="text" class="form-control "
                                                id="validationCustomUsername" placeholder="Enter a username.."
                                                required="" name="mobile" value="{{ Auth::guard('vendor')->user()->mobile }}">
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="text-label form-label" for="validationCustomUsername">Admin
                                            Type</label>
                                        <div class="input-group">

                                            <input type="file" class="form-control mobile"
                                                id="validationCustomUsername" placeholder="Enter a username.."
                                                required="" style="height:30px" name="image">
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>

                                    </div> 

                                    <button type="submit"  class="btn me-2 btn-primary mt-2">Update your profile</button>

                                </form> 
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection
