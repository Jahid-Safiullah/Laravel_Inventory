@extends('admin.layout')

@section('content')
    <div class="">
        <div class="col-md-12 grid-margin stretch-card">
            <div style="border-radius: 25px;" class="card  shadow-lg p-3 mb-5 bg-body border border-info">

                <div>
                    <button style="border-radius: 10px;" type="submit" class="btn btn-primary mr-2 border border-light"><i
                            class="fas fa-edit" style="color: #000000;"></i>Edit</button>

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
                                <input style="border-radius: 10px;" type="text" class="form-control" id="Product"
                                  name="product_name"  placeholder="Product Name">
                            </div>
                        </div>

                        <div class="input-group mb-3">
                        <label for="Product" class="col-sm-2 col-form-label">Catagory Name</label>
                            <select class="form-control" name="catagory_name" aria-label="Default select example" required>
                                <option selected>Open this select menu</option>

                                @foreach ($catagories as $catagory)
                                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach

                            </select>
                        </div>
                      
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="file" class="form-control" id="image"
                                   name="supplier_image" placeholder="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input style="border-radius: 10px;" type="number" class="form-control" id="status"
                                   name="supplier_status" placeholder="status">
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
