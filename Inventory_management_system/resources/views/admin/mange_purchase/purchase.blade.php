@extends('admin.layout')

@section('content')
    <div class="">


        {{-- <div class="input-group mb-3">
            <label class="input-group-text" for="startDate">Supplier</label>
              <input name="date" value="{{date('d/m/y')}}" id="startDate" class="" type="date" />
            </div> --}}



            {{-- <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Supplier</label>

                <select  name="supplier_id" class="form-select" id="inputGroupSelect01">
                        <option selected>Choose Supplier..</option>
                    @foreach ($supplierData as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach

                  </select>
              </div> --}}

             <form action="{{url('add_cart')}}" method="post">
                <div class="input-group mb-3">
                    <button class="btn btn-secondary" type="submit">Submit</button>
                    <select  name="add_cart_product" class="form-select" id="inputGroupSelect01">
                        <option selected>Choose Product..</option>
                      @foreach ($productData as $p_data)
                        <option   value="{{$p_data->id}}">{{$p_data->name}}</option>

                      @endforeach
                    </select>
                  </div>
            </form>

            {{-- <div style="text-align:end; padding-bottom: 25px;">
                   <button style="border-radius: 10px;">
                    <a type="submit"  class="btn btn-primary border border-light"><i class="fa-solid fa-circle-plus" style="color: #192843;"></i>add Purchase</a>
                   </button>
            </div> --}}


<div  class="px-4 mb-4 row justify-content-evenly"  style="justify-content: space-between;">

    <h3 class="card-title "> All Purchase Product </h3>
{{--
    <div class="input-group mb-3  "  >
        <input style="border-radius:  25px 0 0 25px;" type="text" class="form-control" placeholder="Product name.." aria-label="Product name" aria-describedby="button-addon2" >
        <button style="border-radius: 0 25px 25px 0;" class="btn btn-outline-secondary" type="button" id="button-addon2" >Search</button>
    </div> --}}


</div>


<div class="table-responsive border border-rounded " style="border-radius: 25px;">

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
            @endphp
          @foreach($productData as $data)
          <tr>
            <th scope="row">{{$sl++}}</th>

            <td>{{$data->name}}</td>

            <td>{{$data->catagory}}</td>
            <td>{{$data->unit}}</td>
            <td> <input style="width:100px; height:40px;border-radius: 10px;" name="buying_price" value=""  class="" type="text" /> </td>
            <td> <input style="width:100px; height:40px;border-radius: 10px;" name="selling_price" value=""  class="" type="text" /> </td>
            <td> <input style="width:100px; height:40px;border-radius: 10px;" name="quantity" value=""  min="1" class="" type="number" /> </td>
            <td>200</td>
            <td>{{$data->image}}</td>

            <td class="d-flex " style="text-align: center;">
                {{-- <div class="">
                    <a href="" style="border-radius: 10px;" class="btn btn-warning  border border-light"><i class="fas fa-edit" style="color: rgb(0, 0, 0);"></i></a>
                </div>
                <div>
                    <a href="" style="border-radius: 10px;" class="btn btn-success  border border-light"><i class="fa-solid fa-toggle-on" style="color: #000000;"></i></a>
                </div> --}}
                <div>
                    <a href="" style="border-radius: 10px;" class="btn btn-danger border border-light"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
                </div>
            </td>

          </tr>
          @endforeach

        </tbody>
        <tfoot style="width: 100%; border-top:double rgb(202, 69, 255) 5px">
            <th colspan="6">Total</th>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button><a href="">submit</a></button>
            </td>
        </tfoot>
      </table>
</div>



    </div>


@endsection



