@extends('admin.layout')

@section('content')
<div  class="px-4 mb-4 row justify-content-evenly"  style="justify-content: space-between;">

    <h3 class="card-title "> All Customer </h3>

    <div class="input-group mb-3 col-4 "  >
        <input style="border-radius:  25px 0 0 25px;" type="text" class="form-control" placeholder="Customer name.." aria-label="Supplier name" aria-describedby="button-addon2" >
        <button style="border-radius: 0 25px 25px 0;" class="btn btn-outline-secondary" type="button" id="button-addon2" >Search</button>
    </div>


</div>


<div class="table-responsive border border-rounded " style="border-radius: 25px;">

    <table class="table table-striped table-hover table-dark   " >
        <thead class="table-info">
          <tr >
            <th  style="color:white" scope="col">SL.</th>
            <th  style="color:white" scope="col">Customer Name</th>
            <th  style="color:white" scope="col">Customer Email</th>
            <th  style="color:white" scope="col">Mobile</th>
            <th  style="color:white" scope="col">Address</th>
            <th  style="color:white" scope="col">Image</th>
            <th  style="color:white" scope="col">Status</th>
            <th  style="color:white" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($allCustomerData as $data)
          <tr>
            <th scope="row">1</th>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->image}}</td>
            <td>{{$data->status}}</td>
            <td class="d-flex ">
                <div class="pr-1">
                    <a href="{{url('edit_customer',$data->id)}}" style="border-radius: 10px;" class="btn btn-warning mr-2 border border-light"><i class="fas fa-edit" style="color: rgb(0, 0, 0);"></i>Edit</a>
                </div>
                <div>
                    <a href="{{url('isActive',$data->id)}}" style="border-radius: 10px;" class="btn btn-success mr-2 border border-light"><i class="fa-solid fa-toggle-on" style="color: #000000;"></i>Active</a>
                </div>
            </td>

          </tr>
         @endforeach
        </tbody>
      </table>
</div>

@endsection


