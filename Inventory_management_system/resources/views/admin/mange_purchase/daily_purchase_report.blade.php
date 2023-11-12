@extends('admin.layout')
@section('content')
    <div class="">


        <div style="text-align:end; padding-bottom: 25px;">
            <a href="{{ route('purchase') }}" style="border-radius: 10px;" class="btn btn-primary mr-2 border border-light"><i
                    class="fa-solid fa-circle-plus" style="color: #192843;"></i>add Purchase</a>
        </div>

        <div class="px-4 mb-4 row justify-content-evenly" style="justify-content: space-between;">

            <h3 class="card-title "> Purchase Report </h3>
            {{--
            <div class="input-group mb-3  "  >
                <input style="border-radius:  25px 0 0 25px;" type="text" class="form-control" placeholder="Product name.." aria-label="Product name" aria-describedby="button-addon2" >
                <button style="border-radius: 0 25px 25px 0;" class="btn btn-outline-secondary" type="button" id="button-addon2" >Search</button>
            </div> --}}


        </div>


        <div class="table-responsive border border-rounded " style="border-radius: 25px;">

            <table class="table table-striped table-hover table-dark   ">
                <thead class="table-info">
                    <tr>
                        <th style="color:white" scope="col">SL.</th>
                        <th style="color:white" scope="col">P. Code</th>
                        <th style="color:white" scope="col">Product Name</th>
                        <th style="color:white" scope="col">Product Description</th>
                        <th style="color:white" scope="col">Catagory</th>
                        <th style="color:white" scope="col">Unit</th>
                        <th style="color:white" scope="col">Unit buy Price</th>
                        <th style="color:white" scope="col">Unit sell Price</th>
                        <th style="color:white" scope="col">Quntity</th>
                        <th style="color:white" scope="col">Toral Price</th>
                        <th style="color:white" scope="col">discount Price</th>
                        <th style="color:white" scope="col">Image</th>
                        <th style="color:white" scope="col">Status</th>
                        <th style="color:white" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                        $totalPrice = 0;

                    @endphp
                    @foreach ($purchase_product_Data as $data)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $data->sku }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->catagory }}</td>
                            <td>{{ $data->unit }}</td>
                            <td>{{ $data->buy_price }}</td>
                            <td>{{ $data->sell_price }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->total_price }}</td>
                            <td>{{ $data->dis_price }}</td>
                            <td><img src="/product_image/{{ $data->image }}" alt="{{ $data->image }}"></td>
                            <td>{{ $data->status }}</td>
                            <td class="d-flex " style="text-align: center;">
                                <div class="">
                                    <a href="" style="border-radius: 10px;"
                                        class="btn btn-warning mr-2 border border-light"><i class="fas fa-edit"
                                            style="color: rgb(0, 0, 0);"></i></a>
                                </div>
                                <div>
                                    <a href="" style="border-radius: 10px;"
                                        class="btn btn-success mr-2 border border-light"><i class="fa-solid fa-toggle-on"
                                            style="color: #000000;"></i></a>
                                </div>
                                <div>
                                    <a href="" style="border-radius: 10px;"
                                        class="btn btn-danger mr-2 border border-light"><i class="fa-solid fa-trash"
                                            style="color: #000000;"></i></a>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
                <tfoot style="width: 100%; border-top:double rgb(202, 69, 255) 5px">
                    <tr>
                        <th colspan="3">

                        </th>
                        <td colspan="4"></td>
                        <td rowspan="2" style="color:white;">Total : {{ $totalPrice }} TK</td>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>

                        <td colspan="3">

                        </td>
                        <td colspan="4"></td>

                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
@endsection
