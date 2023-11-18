@extends('admin.layout')

@section('content')
    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($ordered_product as $orderDetail)
                        <td>{{ $orderDetail->oc_id }}</td>
                        <td>{{ $orderDetail->name }}</td>
                        <td>{{ $orderDetail->phone }}</td>
                        <td>
                            @foreach ($product as $data)
                                {{ $orderDetail->product_name }}
                            @endforeach

                        </td>
                        <td>{{ $orderDetail->total_price }}</td>
                        <!-- Add more columns as needed -->
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
