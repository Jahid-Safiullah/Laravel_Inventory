@extends('admin.layout')

@section('content')
    <div class="">

        <table class="table">
            <thead>
              <tr>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $orderDetail->product_id }}</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    <td>{{ $orderDetail->total_price }}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach

            </tbody>
          </table>






    </div>
@endsection
