
@extends('admin.layout')

@section('content')
@section('style')
<style>


    .button-container {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        padding:5px;

    }

    .button {
        padding: 5px 10px;
        background-color: #4d4c4c; /* Gray color */
        color: white;
        border: none;
        border-radius: 7px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .button.a{
        color: white;
    }

    .button:hover {

        background-color: #6c4690; /* Darker shade of gray on hover */
        transform: scale(1.1); /* Scale up on hover */
    }


</style>
@endsection

<div  class="px-4 mb-4 row justify-content-evenly"  style="justify-content: space-between;">

    <h3 class="card-title ">Ordered Product </h3>

    <div class="input-group mb-3 col-4 "  >
        <input style="border-radius:  25px 0 0 25px;" type="text" class="form-control" placeholder="Customer name.." aria-label="Supplier name" aria-describedby="button-addon2" >
        <button style="border-radius: 0 25px 25px 0;" class="btn btn-outline-secondary" type="button" id="button-addon2" >Search</button>
    </div>
</div>

<div>
    <div>

        <div style="padding:15px; background-color: #99b89a;  border-radius: 10px;" class="button-container">
            <button class="button" ><a style="text-decoration: none ;color:aliceblue;"  href="{{route('todays_sell')}}">Today's Sell</a></button>
            <button class="button" ><a style="text-decoration: none ;color:aliceblue;" href="{{route('monthly-sell')}}">Monthly Sell</a></button>
            <button class="button" ><a style="text-decoration: none ;color:aliceblue;" href="{{route('yearly-sell')}}">Yearly Sell</a></button>

        </div>


    </div>
</div>
<br>


<div class="table-responsive border border-rounded " style="border-radius: 25px;">

    <table class="table table-striped table-hover table-dark   " >
        <thead class="table-info">
          <tr >
            <th  style="color:white" scope="col">Order ID.</th>
            <th  style="color:white" scope="col">Customer Name</th>
            <th  style="color:white" scope="col">Customer Phone</th>
            <th  style="color:white" scope="col">Address</th>
            <th  style="color:white" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($all_product as $data)
          <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->customer->name }}</td>
                <td>{{ $data->customer->phone }}</td>
                <td>{{ $data->customer->address }}</td>
                <td class="d-flex ">

                    <div>
                        <a href="{{ route('sell_details', $data->id) }}"style="border-radius: 10px;" class="btn btn-primary mr-2 border border-light"><i class="fa-solid fa-eye" style="color: #272727;"></i></a>
                    </div>


                    {{-- <div>
                        <a href="{{url('isActive',$data->id)}}" style="border-radius: 10px;" class="btn btn-success mr-2 border border-light"><i class="fa-solid fa-toggle-on" style="color: #000000;"></i>Active</a>
                    </div> --}}
                </td>

          </tr>
         @endforeach
        </tbody>
      </table>
</div>

@endsection
@section('script')

@endsection



