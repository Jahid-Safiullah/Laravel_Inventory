@extends('admin.layout')

@section('content')







    <div class="container">

            <div style="display: flex;" class="row">

                {{-- Left Side (Table) --}}
                <div style="flex: 1; margin-right: 20px; ">
                    <table  style="width: 100%; border-collapse: collapse;">
                        <body  >
                            <tr class="table-info">
                                <th style="border: 1px solid #ddd; padding: 8px; ">Product</th>
                                <th style="border: 1px solid #ddd; padding: 8px; ">Price</th>
                                <th style="border: 1px solid #ddd; padding: 8px; ">Quantity</th>
                                <th style="border: 1px solid #ddd; padding: 8px; ">Total Price</th>
                                <th style="border: 1px solid #ddd; padding: 8px; ">Action</th>
                            </tr>
                        </body>
                        <tbody>
                            @php
                                $subtotal=0;
                            @endphp
                        @foreach ($cartData as $data)
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{$data->p_name}}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{$data->selling_price}}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{$data->order_quantity}}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{$data->cart_total}}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;"> <a href="" style="" ><i class="fa-solid fa-delete-left fa-xl" style="color: #980000;"></i></a></td>
                            </tr>
                            @php

                            $subtotal=$subtotal + $data->cart_total;
                            @endphp
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                  <div style=" ">
                    <table  style="width: 100%; border-collapse: collapse;   margin-top: 20px; text-align: right; background-color:rgb(201, 177, 219);">
                        <body style="">
                            <tr>
                               <th></th>
                               <th></th>
                               <th></th>
                               <th><p style="color: black;font-size: 20px;">Subtotal Amount: {{$subtotal}} TK</p></th>
                               <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><label for="">Paid Amount:</label>
                                    <input type="number">
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th> </th>
                                <th></th>
                                <th>

                                    <div class="form-group row">

                                        <label for="customer" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-5 " >
                                            <form action="" method="post">
                                                @csrf
                                            <select name="customer" class="form-control"  style="border-radius: 10px; height:35px; background:#2A3038; color:azure"  id="customer" required>
                                                <option selected>Choose Customer</option>
                                                @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                 @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </th>
                                <th style="padding:10px">
                                    <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; padding: 10px;">Submit</button>
                                </th>


                                </tr>
                        </form>
                        </body>

                    </table>
                  </div>


                </div>

                {{-- Right Side (Product Display Card) --}}
                <div style=" overflow-y: scroll;max-height: 600px; border-radius:  10px ">
                    <div style="position: sticky; top: 0; z-index: 100;  padding:10px;  background-color:rgb(158, 185, 244); text-align:center" >
                        <form class=" "  action="{{url('')}}" method="post">
                           @csrf
                           <input name="Search_product" style="border-radius:  25px 0 0 25px;height:30px; " type="text" class="" placeholder="Product name.." aria-label="search Product" aria-describedby="button-addon2" >
                           <button type="submit" style="border-radius: 0 25px 25px 0;height:30px;   " class="btn btn-info" type="button" id="button-addon2" >Search</button>
                       </form>
                     </div>
                    <div style="display: flex;">


                        @foreach ($productRow as $product)

                            <div style="flex:1; margin-right: 10px; border:solid rgb(234, 234, 234) 5px; background-color: #ffffff; height:50%  ; padding:10px;text-align:center ">
                                <h2 style="margin:auto; padding:7px; color: #4CAF50">{{ $product->name }}</h2>
                                <img src="/product_image/{{ $product->image }}" alt="Product Image" style="max-width: 150px; height: 100px;">
                                <p style="color: #4CAF50">{{ $product->description }}</p>
                                <p style="color: #4CAF50">${{ $product->sell_price }}</p>
                                <form action="{{route('add_order_to_cart', $product->purchase_id)}}" method="post">
                                    @csrf


                                    <label style="color: #4CAF50" for="quantity">Qty:</label>
                                    <input style="max-width: 50px ;height:42px" type="number" name="quantity" id="quantity" value="1" min="1">
                                    <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; padding: 10px;">Add to Cart</button>
                                </form>
                            </div>


                        @endforeach
                    </div>
                </div>

                {{-- <iframe src="{{ route('product.list') }}" style="flex:1; height: 700px; border: 1px solid #ddd;"></iframe> --}}

            </div>
    </div>


@endsection
