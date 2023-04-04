@extends('admins.layouts.layout')
@section('content')
    <style>
        #hidden {
            display: none;
        }
    </style>
    {{-- check vendor modal --}}

    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" >
    Launch demo modal
  </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach ($myData as $key => $item)
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['name'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Email</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['email'] }}" placeholder="Example input placeholder">
                        </div>
                        
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['mobile'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">City</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['city'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">State</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['state'] }}" placeholder="Example input placeholder">
                        </div>
                        
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Country</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['country'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Address</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['address'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['pincode'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['account_holder_name'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['bank_name'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['account_number'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['bank_code'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_name'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_address'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_city'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_state'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_country'] }}" placeholder="Example input placeholder">
                        </div>     
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_pincode'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_mobile'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['shop_email'] }}" placeholder="Example input placeholder">
                        </div>
                        
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['gst_number'] }}" placeholder="Example input placeholder">
                        </div>
                        
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['pan_number'] }}" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                value="{{ $item['business_license_number'] }}" placeholder="Example input placeholder">
                        </div>
                        
                        


                    </div>
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    {{-- check vendor end modal --}}






    <!--**********************************
                                            Content body start
                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
            <!-- row -->


            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profile Datatable</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Account Number</th>
                                            <th>Bank code</th>
                                            <th>Mobile</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myData as $key => $item)
                                            {{-- @if ($item['status'] == 0) --}}
                                            @if ($item['account_number'] and $item['bank_code'] and $item['mobile'] and $item['shop_name'] != null)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    {{-- <td><img class="rounded-circle" width="35"
                                                    src="images/profile/small/pic1.jpg" alt=""></td> --}}
                                                    <td>{{ $item['account_number'] }}</td>
                                                    <td>{{ $item['bank_code'] }}</td>
                                                    <td>{{ $item['mobile'] }}</td>
                                                    <td>
                                                        {{-- <label class="switch">
                                                            <input type="checkbox" {{ $item['status'] ? 'checked' : '' }}>>
                                                            <span class="slider"></span>
                                                         </label> --}}



                                                        @if ($item['status'] == 1 and $item['terminate'] == 1)
                                                            <span
                                                                style="padding:6px 5px;border:1px solid;color:rgb(255, 255, 255);background-color:red">Account
                                                                Terminate</span>
                                                        @elseif($item['status'] == 1)
                                                            <span
                                                                style="padding:6px 5px;border:1px solid;color:rgb(255, 255, 255);background-color:rgb(0, 182, 9)">Approved</span>
                                                        @elseif($item['status'] == 0)
                                                            <span
                                                                style="padding:6px 5px;border:1px solid;color:rgb(255, 255, 255);background-color:red">No
                                                                approved</span>
                                                        @endif

                                                    </td>


                                                    <td>
                                                        <div class="d-flex">
                                                            <form action="{{ url('admin/vendor_approve', $item['id']) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="text" value="{{ $item['id'] }}"
                                                                    name="id" id="hidden">
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure ?')"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                        class="fas fa-pencil-alt"></i></button>
                                                            </form>
                                                            <button class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="fas fa-th-list" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal"></i></button>
                                                            <form action="{{ url('admin/terminate', $item['id']) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="text" value="{{ $item['id'] }}"
                                                                    name="id" id="hidden">
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure you want to terminate that vendor?')"
                                                                    class="btn btn-danger shadow btn-xs sharp me-1"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>



                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                            {{-- @endif --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--**********************************
                                            Content body end
                                        ***********************************-->
@endsection
