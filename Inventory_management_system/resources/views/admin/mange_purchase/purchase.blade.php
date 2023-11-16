@extends('admin.layout')

@section('content')
    <div class="">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <form action="{{url('add_cart')}}" method="post">
                @csrf
            <div class="input-group mb-3" style="height:40px; ">
                    <button class="btn btn-success" type="submit">Submit</button>
                <select  name="product_id" class="form-select" id="inputGroupSelect01">
                        <option selected>Choose Product..</option>

                      @foreach ($productData as $p_data)
                        <option   value="{{$p_data->id}}">{{$p_data->name}}</option>
                      @endforeach
                </select>
            </div>
        </form>




            <!--  <div style="text-align:end; padding-bottom: 25px;">
                   <button style="border-radius: 10px;">
                    <a type="submit"  class="btn btn-primary border border-light"><i class="fa-solid fa-circle-plus" style="color: #192843;"></i>add Purchase</a>
                   </button>
            </div>  -->


<div  class="px-4 mb-4 row justify-content-evenly"  style="justify-content: space-between;">

    <h3 class="card-title "> All Purchase Product </h3>

    <!-- <div class="input-group mb-3  "  >
        <input style="border-radius:  25px 0 0 25px;" type="text" class="form-control" placeholder="Product name.." aria-label="Product name" aria-describedby="button-addon2" >
        <button style="border-radius: 0 25px 25px 0;" class="btn btn-outline-secondary" type="button" id="button-addon2" >Search</button>
    </div>  -->


</div>


<div class="table-responsive border border-rounded " style="border-radius: 25px;">

 <form action="{{route('submit_purchase')}}" method="post"  enctype="multipart/form-data">
    @csrf

 <table class="table table-striped table-hover table-dark   " >
        <thead class="table-info">
          <tr >
            <th  style="color:white" scope="col">SL.</th>
            <th  style="color:white" scope="col">Product Name</th>
            <th  style="color:white" scope="col">Catagory</th>
            <th  style="color:white" scope="col">Unit</th>
            <th  style="color:white" scope="col">Unit buy Price</th>
            <th  style="color:white" scope="col">Unit sell Price</th>
            <th  style="color:white" scope="col">Quntity</th>
            <th  style="color:white" scope="col">Toral Price</th>

            <th  style="color:white" scope="col">Image</th>
            {{-- <th  style="color:white" scope="col">Status</th> --}}
            <th  style="color:white" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $sl=1;
                $totalPrice=0;
            @endphp
          @foreach($purchase_product_Data as $data)
          <tr>
            <th scope="row">{{$sl++}}</th>
            <td>{{$data->name}}</td>
            <td> <input style="width:100px; height:40px;border-radius: 10px;" name="scores[{{$loop->index}}][product_id]" value="{{$data->id}}"  class="" type="number" /> </td>

            <td>{{$data->catagory}}</td>
            <td>{{$data->unit}}</td>
            <td> <input style="width:100px; height:40px;border-radius: 10px;" name="scores[{{$loop->index}}][buying_price]" value=""  class="" type="number" /> </td>
            <td> <input style="width:100px; height:40px;border-radius: 10px;" name="scores[{{$loop->index}}][selling_price]" value=""  class="" type="number" /> </td>
            <td> <input style="width:100px; height:40px;border-radius: 10px;" name="scores[{{$loop->index}}][quantity]" value=""  min="1" class="" type="number" /> </td>
            <td>20</td>
            <td><img src="/product_image/{{$data->image}}" alt="{{$data->image}}" ></td>
            <td class="d-flex " style="text-align: center;">
                <div>
                    <a href="" style="border-radius: 10px;" class="btn btn-danger border border-light"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
                </div>
            </td>

          </tr>
        {{-- @php
         $totalPrice=buying_price*quantity
        @endphp --}}

          @endforeach

        </tbody>
        <tfoot  style="width: 100%; border-top:double rgb(202, 69, 255) 5px">
            <tr>
                <th colspan="3">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="startDate">Date pik.</label>
                        <input style=" height:40px;" name="date" value="{{date('d/m/y')}}" id="startDate" class="" type="date" />
                    </div>
                </th>
                <td colspan="4"></td>
                <td rowspan="2" style="color:white;">Total : {{$totalPrice}} TK</td>
                <td rowspan="2"></td>
                <td rowspan="2"><button style="border-radius: 10px; width:100%; height:40px; " class="btn btn-primary  border border-light" type="submit">submit</button></td>
            </tr>
            <tr>

                <td colspan="3">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Supplier</label>
                    <select style=" height:40px;" name="supplier_id" class="form-select" id="inputGroupSelect01" required>
                            <option selected>Choose Supplier..</option>
                        @foreach ($supplierData as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach

                    </select>

                </div>

                </td>
                <td colspan="4"></td>

            </tr>
        </tfoot>
      </table>
 </form>



    </div>

    </div>


@endsection



