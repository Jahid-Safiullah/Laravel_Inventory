
@extends('admin.layout')

@section('content')
    <div class="">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

              
                        <!-- <div class="template-demo">
                     
                          <button type="button" class="btn btn-outline-info btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                          </button>
                          <button type="button" class="btn btn-outline-warning btn-icon-text">
                            <i class="mdi mdi-reload btn-icon-prepend"></i> Reset </button>
                        </div> -->



                  <div class="card-body">
                    <h4 class="card-title">Add Supplier</h4>
                    <br>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Supplier Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Supplier Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                        </div>
                      </div> -->
                      <div class="d-flex align-items-end flex-column" >
                      <div class="form-check form-check-flat form-check-primary ">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me </label>
                      </div>
                      <div class="">
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>




      
    </div>
@endsection