@extends('admin.layout')

@section('content')
<div  class="px-4 mb-4 row justify-content-evenly"  style="justify-content: space-between;">

    <h3 class="card-title "> All Product </h3>

    <div class="input-group mb-3 col-4 "  >
        <input style="border-radius:  25px 0 0 25px;" type="text" class="form-control" placeholder="Product name.." aria-label="Product name" aria-describedby="button-addon2" >
        <button style="border-radius: 0 25px 25px 0;" class="btn btn-outline-secondary" type="button" id="button-addon2" >Search</button>
    </div>


</div>


<div class="table-responsive border border-rounded " style="border-radius: 25px;">

    <table class="table table-striped table-hover table-dark   " >
        <thead class="table-info">
          <tr >
            <th  style="color:white" scope="col">SL.</th>
            <th  style="color:white" scope="col">SKU</th>
            <th  style="color:white" scope="col">Product Name</th>
            <th  style="color:white" scope="col">Product Description</th>
            <th  style="color:white" scope="col">Catagory</th>
            <th  style="color:white" scope="col">Unit</th>
            <th  style="color:white" scope="col">Image</th>
            <th  style="color:white" scope="col">Status</th>
            <th  style="color:white" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($allProductData as $data)
          <tr>
            <th scope="row">1</th>
            <td>{{$data->sku}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->description}}</td>
            <td>{{$data->catagory}}</td>
            <td>{{$data->unit}}</td>
            <td>{{$data->image}}</td>
            <td>{{$data->status}}</td>
            <td class="d-flex " style="text-align: center;">
                <div class="">
                    <a href="{{url('edit_product',$data->id)}}" style="border-radius: 10px;" class="btn btn-warning mr-2 border border-light"><i class="fas fa-edit" style="color: rgb(0, 0, 0);"></i>Edit</a>
                </div>
                <div>
                    <a href="" style="border-radius: 10px;" class="btn btn-success mr-2 border border-light"><i class="fa-solid fa-toggle-on" style="color: #000000;"></i>Active</a>
                </div>
                <div>
                    <a href="" style="border-radius: 10px;" class="btn btn-danger mr-2 border border-light"><i class="fa-solid fa-trash" style="color: #000000;"></i>Delete</a>
                </div>
            </td>

          </tr>
          @endforeach
         
        </tbody>
      </table>
</div>

@endsection


