@extends('admin.layout')

@section('content')
    <div class="container">
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


        <div style="display: flex;" class="row" >

            {{-- Left Side (Table) --}}
            <div style="flex: 1; margin-right: 20px; ">
              <form action="{{route('order_submition')}}" method="post">
                @csrf
                <table style="width: 100%; border-collapse: collapse;">

                    <body>
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
                            $subtotal = 0;
                        @endphp
                        @foreach ($cartData as $data)
                            <tr id="tr_{{ $data->cart_id }}">
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $data->p_name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $data->selling_price }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $data->order_quantity }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $data->cart_total }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;"> <a href=" javascrip:void(0)"
                                        onclick="deletepost({{ $data->cart_id }})" style=""><i
                                            class="fa-solid fa-delete-left fa-xl" style="color: #980000;"></i></a></td>
                            </tr>
                            @php

                                $subtotal = $subtotal + $data->cart_total;
                            @endphp
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                <div style=" ">
                    <table
                        style="width: 100%; border-collapse: collapse;   margin-top: 20px; text-align: right; background-color:rgb(201, 177, 219);">

                        <body style="">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <p style="color: black;font-size: 20px;">Subtotal Amount: {{ $subtotal }} TK</p>
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th><input
                                        style="border-radius: 5px; height:35px; width:200px; background:#2A3038; color:azure"
                                        type="date" name="date" id="" required></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <label for="">Paid Amount:</label>
                                    <input name="paid_amount" style="border-radius: 5px;" type="number">
                                </th>
                                <th></th>
                            </tr>
                            <tr>


                                <th colspan="4">

                                    <div class="form-group row">

                                        <div class="col-sm-5 ">
                                                   <select name="customer" class="form-control"
                                                    style="border-radius: 5px; height:35px; background:#2A3038; color:azure"
                                                    id="customer" required>
                                                    <option selected>Choose Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach

                                                </select>
                                        </div>
                                    </div>
                                </th>
                                <th style="padding:10px">
                                    <button type="submit"
                                        style="background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; padding: 10px;">Submit</button>
                                </th>


                            </tr>

                        </body>

                    </table>
                </div>
            </form>

            </div>

            {{-- Right Side (Product Display Card) --}}


  {{-- Right Side with Scrollbar and Product Display --}}
  <div style="flex: 2; max-height: 600px; overflow-y: auto;">
    <h2>Product List</h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
        <!-- Product cards will be dynamically populated here -->

        @foreach ($products as $product)

            <div class="product-card" style="width: calc(33.33% - 20px); margin-bottom: 20px; background-color:#ffffff ; color:#2A3038; padding:10px; ">

                <img src="/product_image/{{ $product->image }}" alt="Product Image"
                style="max-width: 150px; height: 100px;">
                <h3>{{ $product->name }} </h3>
                <p class="description">{{ $product->description }}</p>
                <p class="price">Price: ${{ $product->sell_price }}</p>

                <form action="{{ route('add_order_to_cart', $product->purchase_id) }}" method="post">
                    @csrf
                <div class="action" style="display: flex;  justify-content: space-around;">
                    <input style="width: 45px" type="number" name="quantity"  min="1" value="1" placeholder="Qty">
                    <button type="submit" style="width: 65px" class="add-to-cart">Add</button>
                </div>
            </form>
            </div>
        @endforeach

    </div>
</div>


            {{-- <iframe src="{{ route('product.list') }}" style="flex:1; height: 700px; border: 1px solid #ddd;"></iframe> --}}

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function deletepost(cart_id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            if (confirm("Are you sure to delete this")) {
                $.ajax({

                    url: 'delete_post/' + cart_id,
                    type: 'DELETE',
                    success: function(result) {
                        $("#" + result['tr']).slideUp("slow");
                    }
                });
            }
        }
    </script>
@endsection
