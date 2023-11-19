@extends('admin.layout')

@section('content')

@section('style')
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Source Sans Pro', sans-serif;
            }

            .container {
                display: block;
                width: 100%;
                background: #fff;
                max-width: 450px;
                padding: 25px;
                margin: 50px auto 0;
                box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
            }

            .receipt_header {
                padding-bottom: 40px;
                border-bottom: 1px dashed #000;
                text-align: center;
            }

            .receipt_header h1 {
                font-size: 20px;
                margin-bottom: 5px;
                text-transform: uppercase;
            }

            .receipt_header h1 span {
                display: block;
                font-size: 25px;
            }

            .receipt_header h2 {
                font-size: 14px;
                color: #727070;
                font-weight: 300;
            }

            .receipt_header h2 span {
                display: block;
            }

            .receipt_body {
                margin-top: 25px;
            }

            table {
                width: 100%;
            }

            thead,
            tfoot {
                position: relative;
            }

            thead th:not(:last-child) {
                text-align: left;
            }

            thead th:last-child {
                text-align: right;
            }

            thead::after {
                content: '';
                width: 100%;
                border-bottom: 1px dashed #000;
                display: block;
                position: absolute;
            }

            tbody td:not(:last-child),
            tfoot td:not(:last-child) {
                text-align: left;
            }

            tbody td:last-child,
            tfoot td:last-child {
                text-align: right;
            }

            tbody tr:first-child td {
                padding-top: 15px;
            }

            tbody tr:last-child td {
                padding-bottom: 15px;
            }

            tfoot tr:first-child td {
                padding-top: 15px;
            }

            tfoot::before {
                content: '';
                width: 100%;
                border-top: 1px dashed #000;
                display: block;
                position: absolute;
            }

            tfoot tr:first-child td:first-child,
            tfoot tr:first-child td:last-child {
                font-weight: bold;
                font-size: 20px;
            }

            .date_time_con {
                display: flex;
                justify-content: center;
                column-gap: 25px;
            }

            .items {
                margin-top: 25px;
            }

            h3 {
                border-top: 1px dashed #000;
                padding-top: 10px;
                margin-top: 25px;
                text-align: center;
                text-transform: uppercase;
            }
        </style>
@endsection
<div>

            <div class="container">

                <div style="color:rgb(0, 0, 0)" class="receipt_header">
                    <h1>Receipt of Ordered </h1>
                    <span><b>Trunk</b></span>
                    <!-- <img src="home/images/logo.png" alt="Famms"> -->
                    <h2>Address: Dhanmondi, 1234-5 <span>Tel: +8801521319764
                        {{-- </span><span>Date:{{ $order_ricipet->created_at }}</span></h2> --}}

                </div>


                <div class="receipt_body">

                    <div class="date_time_con">
                        {{-- <div class="">Order NO. : {{ $order_ricipet->invoice }}</div> --}}
                        {{-- <div class="">Customer Name : {{ $order_ricipet->order_cusomer->customer->name }}</div> --}}
                        {{-- <div class="">Phone : {{ $order_ricipet->phone }}</div>
                        <div class="">Email : {{ $order_ricipet->email }}</div>
                        <div class="">Address : {{ $order_ricipet->address }}</div> --}}
                    </div>

                    <div class="items">
                        <table>
                            <thead style="border-bottom: 1px dashed #000;">
                                <th>QTY</th>
                                <th>ITEM</th>
                                <!-- <th>IMAGE</th> -->
                                <th>PRICE</th>
                            </thead>
                            @php
                                $totalPrice = 0;
                            @endphp
                            <tbody>

                                @foreach ($order_ricipet as $orderData)
                                    <tr>
                                        <td>{{ $orderData->quantity }}</td>
                                        {{-- <td>{{ $orderData->Product->name }}</td> --}}
                                        <!-- {{-- <td><img src="product/{{$orderDatas->image}}" alt="">
                                </td> --}} -->
                                        <td>{{ $orderData->price}}</td>
                                    </tr>
                                    @php
                                        $totalPrice = $totalPrice + $orderData->price;
                                    @endphp
                                @endforeach
                            </tbody>

                            <tfoot style="border-top: 1px dashed #000;">
                                <tr>
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td><b>{{ $totalPrice }}</b></td>
                                </tr>

                                <tr>
                                    <td>Paid amount</td>
                                    <td></td>
                                    <td>{{ $orderData->paid_amount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <h3>Thank You!</h3>
            </div>
    </div>
@endsection
