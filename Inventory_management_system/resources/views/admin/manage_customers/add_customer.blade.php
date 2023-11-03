@extends('admin.layout')

@section('content')
    <div class="">
        <div class="col-md-12 grid-margin stretch-card">
            <div style="border-radius: 25px;" class="card  shadow-lg p-3 mb-5 bg-body border border-info">


                <!-- <div class="template-demo">

                                  <button type="button" class="btn btn-outline-info btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                                  </button>
                                  <button type="button" class="btn btn-outline-warning btn-icon-text">
                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Reset </button>
                                </div> -->

                <div>
                   <a style="color: white" href=""  style="border-radius: 20px; text-decoration:none" type="submit" class="btn btn-primary mr-2 border border-light">
                    <i class="fa-regular fa-eye" style="color: #070707;"></i>All Units</a>

                </div>

                <div class="card-body">
                    <div style=" text-align: center;">
                        <div class="line"></div>
                        <h3 class="card-title "> Add Unit </h3>
                        <div class="line"></div>
                    </div>


                    <br>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample"  >
                        <div class="form-group row " >
                            <label for="supplier" class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="col-sm-10 ">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="supplier"
                                    placeholder="Unit Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="examplel2" class="col-sm-2 col-form-label">Unit Status</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="text" class="form-control"
                                    id="examplel2" placeholder="Email">
                            </div>
                        </div>


                        {{-- <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="mobile"
                                    placeholder="Mobile number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="location"
                                    placeholder="Location">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="address"
                                    placeholder="Address">
                            </div>
                        </div> --}}



                        <div class="d-flex align-items-end flex-column">
                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input style="border-radius: 10px;" type="checkbox" class="form-check-input"> Remember
                                    me </label>
                            </div>
                            <div class="">
                                <a href="" class="btn btn-primary mr-2 border border-light" style="border-radius: 10px;" type="submit">Submit</a>
                                <a href="" class="btn btn-warning mr-2 border border-light" style="border-radius: 10px;" type="submit">Cancel</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    </div>
@endsection
