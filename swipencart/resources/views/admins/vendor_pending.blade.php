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
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Example label</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Example input placeholder">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Another label</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>


                </div>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>Pincode</th>
                                            <th>Account holder name</th>
                                            <th>Bank name</th>
                                            <th>Account number</th>
                                            <th>Bank Code</th>
                                            <th>Shop name</th>
                                            <th>Shop address</th>
                                            <th>Shop mobile</th>
                                            <th>Business license number</th>
                                            <th>Gst number</th>
                                            <th>Pan number</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myData as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                {{-- <td><img class="rounded-circle" width="35"
                                                    src="images/profile/small/pic1.jpg" alt=""></td> --}}
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['email'] }}</td>
                                                <td>{{ $item['mobile'] }}</td>
                                                <td>{{ $item['city'] }}</td>
                                                <td>{{ $item['state'] }}</td>
                                                <td>{{ $item['country'] }}</td>
                                                <td>{{ $item['address'] }}</td>
                                                <td>{{ $item['pincode'] }}</td>
                                                <td>{{ $item['account_holder_name'] }}</td>
                                                <td>{{ $item['bank_name'] }}</td>
                                                <td>{{ $item['account_number'] }}</td>
                                                <td>{{ $item['bank_code'] }}</td>
                                                <td>{{ $item['shop_name'] }}</td>
                                                <td>{{ $item['shop_address'] }}</td>
                                                <td>{{ $item['shop_mobile'] }}</td>
                                                <td>{{ $item['business_license_number'] }}</td>
                                                <td>{{ $item['gst_number'] }}</td>
                                                <td>{{ $item['pan_number'] }}</td>



                                            </tr>
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
