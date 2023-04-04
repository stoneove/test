@extends('vendors.layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-bottom:150px">



            <div class="col-lg-2"></div>
            <div class="col-lg-10">

                <div class="container d-flex justify-content-end " style="max-width:1200px!important;">
                    <div class="col-11 col-offset-2">
                        <div class="progress" style="height: 30px;margin-top:125px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    
                        <div class="card mt-4"> 
                            <div class="card-header font-weight-bold">Your all personal information</div>
                            <div class="card-body p-4 step">
                                <div class="radio-group row justify-content-between px-3 "
                                    style="justify-content:center !important;margin-bottom:-120px">
                                    {{-- <div class="col-auto me-sm-2 mx-1 card-block py-0 text-center radio">
                                        <div class="opt-icon"><i class="fas fa-user-plus"
                                                style="font-size: 80px; margin-left: 25px;"></i></div>
                                        <p><b>Add your crediential</b></p>
                                    </div> --}}

                                    <form action="{{url('vendor/detail-update')}}" method="post">
                                        @csrf
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Name</label>
                                        <input type="text" class="form-control inpt" name='name'
                                           value="{{Auth::guard('vendor')->user()->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Address</label>
                                        <input type="text" class="form-control inpt" name="address"
                                        value="{{Auth::guard('vendor')->user()->address}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">City</label>
                                        <input type="text" class="form-control inpt" name='city'
                                        value="{{Auth::guard('vendor')->user()->city}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">State</label>
                                        <input type="text" class="form-control inpt" name='state'
                                        value="{{Auth::guard('vendor')->user()->state}}">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Counrty</label>
                                        <input type="text" class="form-control inpt" name='country'
                                        value="{{Auth::guard('vendor')->user()->country}}">
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Select Country:</label>
                                        <select class="form-select inpt" name='country'  value="{{Auth::guard('vendor')->user()->country}}" >
                                            <option value="" disabled selected>-- Select Your Country --</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" {{$country->id == Auth::guard('vendor')->user()->country ? 'selected' : ''}}>{{$country->name}} - {{$country->code}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Pincode</label>
                                        <input type="text" class="form-control inpt" name='pincode'
                                        value="{{Auth::guard('vendor')->user()->pincode}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Mobile</label>
                                        <input type="text" class="form-control inpt" name='mobile'
                                        value="{{Auth::guard('vendor')->user()->mobile}}">
                                    </div>
                                
           



                                </div>

                                <div id="filter-records" class="mx-5"></div>
                            </div>
                            <div id="userinfo" class="card-body p-4 step" style="display: none">
                                <div class="text-center">
                                    <h5 class="card-title font-weight-bold pb-2">Your Business Detail</h5>
                                </div>




                     @foreach ($business_detail as $business_details)
                         


                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop Name</label>
                                    <input type="text" class="form-control inpt" name='shop_name'
                                    value="{{$business_details->shop_name}}">
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop Address</label>
                                    <input type="text" class="form-control inpt" name='shop_address'   value="{{$business_details->shop_address}}"
                                  >
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop city</label>
                                    <input type="text" class="form-control inpt" name='shop_city'   value="{{$business_details->shop_city}}"
                                  >
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop state</label>
                                    <input type="text" class="form-control inpt" name='shop_state'   value="{{$business_details->shop_state}}"
                                 >
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop country</label>
                                    <input type="text" class="form-control inpt" name='shop_country'    value="{{$business_details->shop_country}}"
                                    >
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop pincode</label>
                                    <input type="text" class="form-control inpt" name='shop_pincode'   value="{{$business_details->shop_pincode}}"
                                  >
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop mobile</label>
                                    <input type="text" class="form-control inpt" name='shop_mobile'  value="{{$business_details->shop_mobile}}"
                                  >
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Shop email</label>
                                    <input type="text" class="form-control inpt" name='shop_email'  value="{{$business_details->shop_email}}"
                                  >
                                </div>
                          
                           
                              
                          
                           
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Business license number</label>
                                    <input type="text" class="form-control inpt" name='business_license_number'  value="{{$business_details->business_license_number}}"
                                   >
                                </div>
                          
                           
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Gst Number</label>
                                    <input type="text" class="form-control inpt" name='gst_number'   value="{{$business_details->gst_number}}"
                                   >
                                </div>
                          
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Pan Number</label>
                                    <input type="text" class="form-control inpt" name='pan_number'   value="{{$business_details->pan_number}}"
                                   >
                                </div>
                          
                                @endforeach

                                <div class="text-center text-muted" style="margin-bottom:-130px"><b
                                        style="color: #dc3545;">*</b>  fields</div>
                            </div>
                            <div class="card-body step" style="display: none">
                            
                                <div class="text-center">
                                    <h5 class="card-title font-weight-bold pb-2">Your Bank Detail</h5>
                                </div>

                                @foreach ($bank_detail as $bank)
                            
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Account holder name</label>
                                    <input type="text" class="form-control inpt" name='account_holder_name' value="{{$bank->account_holder_name}}" >
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Bank name</label>
                                    <input type="text" class="form-control inpt" name='bank_name' placeholder="Place your bank name" value="{{$bank->bank_name}}">
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Account number</label>
                                    <input type="text" class="form-control inpt" name='account_number' placeholder="Place your bank number" value="{{$bank->account_number}}">
                                  </div>
                                  <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Bank code</label>
                                    <input type="text" class="form-control inpt" name='bank_code' placeholder="Place your bank code" value="{{$bank->bank_code}}">
                                  </div>
                            

                          
                      @endforeach

                             
                            </div>
                            {{-- <div class="card-body p-5 step" style="display: none">Step 4</div>
                            <div class="card-body p-5 step" style="display: none">Step 5</div> --}}
                            <div class="card-footer">
                                <button type="button" class="action back btn btn-sm btn-outline-primary"
                                    style="display: none">Back</button>
                                <button type="button" class="action next btn btn-sm btn-outline-primary float-end">Next</button>
                                <button type="submit" class="action submit btn btn-sm btn-outline-success float-end"
                                    style="display: none">Submit</button>
                            </div>
                        </div>
                        <form>
                    </div>
                </div>
            </div>






        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).on("click", ".li-search", function() {
            $("#txt-search").val($(this).html());
            setFormFields($(this).attr("id"));
            $("#filter-records").html("");
            $(".next").prop("disabled", false);
        });


        var step = 1;
        $(document).ready(function() {
            stepProgress(step);
        });

        $(".next").on("click", function() {
            var nextstep = false;
            if (step == 2) {
                nextstep = checkForm("userinfo");
            } else {
                nextstep = true;
            }
            if (nextstep == true) {
                if (step < $(".step").length) {
                    $(".step").show();
                    $(".step")
                        .not(":eq(" + step++ + ")")
                        .hide();
                    stepProgress(step);
                }
                hideButtons(step);
            }
        });

        // ON CLICK BACK BUTTON
        $(".back").on("click", function() {
            if (step > 1) {
                step = step - 2;
                $(".next").trigger("click");
            }
            hideButtons(step);
        });

        // CALCULATE PROGRESS BAR
        stepProgress = function(currstep) {
            var percent = parseFloat(100 / $(".step").length) * currstep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        };

        // DISPLAY AND HIDE "NEXT", "BACK" AND "SUMBIT" BUTTONS
        hideButtons = function(step) {
            var limit = parseInt($(".step").length);
            $(".action").hide();
            if (step < limit) {
                $(".next").show();
            }
            if (step > 1) {
                $(".back").show();
            }
            if (step == limit) {
                $(".next").hide();
                $(".submit").show();
            }
        };
    </script>
@endsection
