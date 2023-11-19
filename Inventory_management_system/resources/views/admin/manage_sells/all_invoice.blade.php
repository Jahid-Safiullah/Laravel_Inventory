<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trunk</title>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;  background-color: #ffffff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; color: #222222;">Product Invoice</h1>
        <h1 style="text-align: center; color: #222222;">Trunk</h1>

        <div style="margin-top: 20px;">
            <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #000000; padding-bottom: 10px; margin-bottom: 10px;">
                <div>
                    <p><strong>Invoice Number:</strong><br> {{$allCustomerProduct[0]->invoice}}</p>
                    <p><strong>Date:</strong>  {{ now()->format('F j, Y') }}</p>

                </div>
                <div>
                    <p><strong>Billing Address:</strong></p>
                    <address>
                        {{$allCustomerProduct[0]->order_cusomer->customer->name}}<br>
                        {{$allCustomerProduct[0]->order_cusomer->customer->email}}<br>
                        {{$allCustomerProduct[0]->order_cusomer->customer->phone}}<br>
                        {{$allCustomerProduct[0]->order_cusomer->customer->address}}<br>
                        Dhaka
                    </address>
                </div>
            </div>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #000000; padding-bottom: 10px;">Product Name</th>
                        <th style="border-bottom: 1px solid #000000; padding-bottom: 10px; text-align: right;">Quantity</th>
                        <th style="border-bottom: 1px solid #000000; padding-bottom: 10px; text-align: right;">Price</th>
                        <th style="border-bottom: 1px solid #000000; padding-bottom: 10px; text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total=0;
                        $price=0;
                    @endphp
                    @foreach ($allCustomerProduct as $data)
                        <tr>
                            <td style="padding: 10px;">{{$data->product->name}}</td>
                            <td style="padding: 10px; text-align: right;">{{$data->quantity}}</td>
                            <td style="padding: 10px; text-align: right;">${{$data->total_price/$data->quantity}}</td>
                            <td style="padding: 10px; text-align: right;">${{$data->total_price}}</td>
                        </tr>
                        @php
                            $total=$total+$data->total_price

                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td style="border-top: 1px solid #000000; padding-top: 10px; text-align: right;"><strong>Subtotal:</strong></td>
                        <td style="border-top: 1px solid #000000; padding-top: 10px; text-align: right;">${{$total}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td style="text-align: right;"><strong>Paid Amount:</strong></td>
                        <td style="text-align: right;">${{$allCustomerProduct[0]->paid_amount}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        {{-- Check if $allCustomerProduct is not empty --}}
        @if(!$allCustomerProduct->isEmpty())
            <div style="text-align: center;">
                <button onclick="printPage()" style="background-color: #1c1d1c; color: rgb(212, 211, 211); border: none; border-radius: 4px; cursor: pointer; padding: 10px;">
                 print   {{-- <a href="{{ route('print_pdf', $allCustomerProduct[0]->order_cusomer->id) }}">print</a> --}}
                </button>
            </div>
        @else
            {{-- Handle the case where $allCustomerProduct is empty --}}
            <p>No data available for the invoice.</p>
        @endif
    </div>




</div>
</body>
</html>

