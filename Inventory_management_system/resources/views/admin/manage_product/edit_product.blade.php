@extends('admin.layout')

@section('content')
    <div class="">
        <div class="col-md-12 grid-margin stretch-card">
            <div style="border-radius: 25px;" class="card  shadow-lg p-3 mb-5 bg-body border border-info">

                <div>
                    <a style="color: white" href="{{route('all_product')}}" style="border-radius: 20px; text-decoration:none" 
                        class="btn btn-primary mr-2 border border-light">
                        <i class="fa-regular fa-eye" style="color: #070707;"></i>All Product</a>

                </div>

                <div class="card-body">

                    <div style=" text-align: center;">
                        <div class="line"></div>
                        <h3 class="card-title "> Add Product </h3>
                        <div class="line"></div>
                    </div>
                    <br>

                    <form class="forms-sample" method="POST" action="{{route('add_product')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row " >
                            <label for="Product" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10 ">
                                <input value='{{$viewData->name}}' style="border-radius: 10px;" type="text" class="form-control" id="Product"
                                  name="product_name"  placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row " >
                            <label for="Product_des" class="col-sm-2 col-form-label">Product Description</label>
                            <div class="col-sm-10 ">
                                <input value='{{$viewData->des}}' id="Product_des" style="border-radius: 10px;" type="text" class="form-control" id="Product"
                                  name="product_des"  placeholder="Product Description">
                            </div>
                        </div>

                        <div class="input-group mb-3">
                        <label for="Catagory" class="col-sm-2 col-form-label">Catagory Name</label>
                            <select style="border-radius: 10px;"  class="form-control" name="product_name" aria-label="Default select example" required>
                                <option selected>Open this select menu</option>

                                @foreach ($catagoryData as $catagory)
                                
                                    <option {{($viewData->id)? "selected": ""}} value="{{$viewData->catagory}}" >{{$viewData->catagory}}</option>
                                    <option value="{{$catagory->name}}">{{$catagory->name}}</option>
                                    

                                @endforeach

                            </select>
                        </div>
                        <div class="input-group mb-3">
                        <label for="Unit" class="col-sm-2 col-form-label">Unit</label>
                            <select style="border-radius: 10px;" class="form-control" name="unit_name" aria-label="Default select example" required>
                                <option selected>Open this select menu</option>

                                @foreach ($unitData as $unit)
                                    <option value="{{$unit->name}}">{{$unit->name}}</option>
                                @endforeach

                            </select>
                        </div>
                   
                      
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="file" class="form-control" id="image"
                                   name="product_image" placeholder="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 " >
                                <select name="status" class="form-control"  style="border-radius: 10px; height:35px; background:#2A3038; color:azure"  id="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">In Active</option>

                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="SKU" class="col-sm-2 col-form-label">SKU</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="text" class="form-control" id="SKU"
                                   name="sku" placeholder="SKU">
                            </div>
                        </div>
                        <div class="d-flex align-items-end flex-column">
                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input style="border-radius: 10px;" type="checkbox" class="form-check-input"> Remember me
                                </label>
                            </div>
                            <div class="">
                                <button style="border-radius: 10px;" type="submit"
                                    class="btn btn-primary mr-2 border border-light">Submit</button>
                                <button style="border-radius: 10px;"
                                    class="btn btn-warning border border-light">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
