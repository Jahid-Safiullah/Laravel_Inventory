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
                    <button style="border-radius: 10px;" type="submit" class="btn btn-primary mr-2 border border-light"><i
                            class="fas fa-edit" style="color: #000000;"></i>Edit</button>

                </div>

                <div class="card-body">
                    <div style=" text-align: center;">
                        <div class="line"></div>
                        <h3 class="card-title "> Add Customer </h3>
                        <div class="line"></div>
                    </div>


                    <br>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" method="post" action="{{route('add_customer')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row " >
                            <label for="Customer" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-10 ">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="Customer"
                                  name="customer_name"  placeholder="Customer Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Customer Email</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="email" class="form-control"
                                   name="customer_email" id="exampleInputEmail2" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="mobile"
                                   name="customer_phone" placeholder="Mobile number">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="address"
                                name="customer_address"  placeholder="Address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="file" class="form-control" id="image"
                                   name="customer_image" placeholder="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 " >
                                <select name="status" style="border-radius: 10px; width: 920px; height:35px; background:#2A3038; color:azure"  id="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">In Active</option>

                                  </select>
                            </div>
                        </div>
                        <div class="d-flex align-items-end flex-column">
                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input style="border-radius: 10px;" type="checkbox" class="form-check-input"> Remember
                                    me </label>
                            </div>
                            <div class="">
                                <button style="border-radius: 10px;" type="submit" class="btn btn-primary mr-2 border border-light">Submit</button>
                                    <a href="{{route('all_customer')}}" class="btn btn-warning mr-2 border border-light" style="border-radius: 10px;" type="cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    </div>
@endsection
