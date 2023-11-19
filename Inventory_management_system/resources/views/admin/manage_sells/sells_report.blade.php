@extends('admin.layout')

@section('content')
    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    {{-- <th>Customer Name</th> --}}
                    <th>invoice</th>
                    <th>product</th>
                    <th>paid</th>
                    <th>quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_product as $data)
                <tr>
                  
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->invoice }}</td>
                        {{-- <td>{{ $data->product->name }}</td> --}}
                        {{-- <td>{{ $data->product->name }}</td> --}}
                        {{-- <td>
                            @foreach($data->product as  $value)
                                {{$value->name}}
                            @endforeach
                        </td> --}}

                        {{-- <td>{{ $data->total_price}}</td>
                        <td>{{ $data->paid_amount }}</td>
                        <td>
                            @foreach($data->product as  $v)
                                {{ $v->catagory }}
                            @endforeach
                        </td>
                        <td>{{ $data->quantity }}</td>                --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
