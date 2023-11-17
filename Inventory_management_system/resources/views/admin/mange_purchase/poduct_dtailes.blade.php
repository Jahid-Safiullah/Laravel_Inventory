@extends('admin.layout')

@section('content')
    <div class="">


        <div style="text-align:end; padding-bottom: 25px;">
            <a href="{{ route('purchase') }}" style="border-radius: 10px;" class="btn btn-primary mr-2 border border-light"><i
                    class="fa-solid fa-circle-plus" style="color: #192843;"></i>add Purchase</a>
        </div>




        <div class="table-responsive border border-rounded " style="border-radius: 25px;">


            <h1>Product Details</h1>
            @if ($purchaseProduct)
                {{-- <p><strong>Name:</strong> {{ $purchaseProduct->purchase_code }}</p> --}}
                <p><strong>Name:</strong> {{ $purchaseProduct->name }}</p>
                <p><strong>Description:</strong> {{ $purchaseProduct->description }}</p>
                <p><strong>Price:</strong> {{ $purchaseProduct->catagory }}</p>
                <p><strong>Price:</strong> {{ $purchaseProduct->buy_price }}</p>
                <p><strong>Price:</strong> {{ $purchaseProduct->sell_price }}</p>
                <p><strong>Price:</strong> {{ $purchaseProduct->quantity }}</p>
                <p><strong>Price:</strong> {{ $purchaseProduct->unit }}</p>
                <p><strong>Price:</strong> {{ $purchaseProduct->price }}</p>
                <p><strong>Price:</strong> {{ $purchaseProduct->dis_price }}</p>
                <p><strong>Price:</strong>{{ $purchaseProduct->status }}</p>
                <p><strong>Price:</strong> <img src="/product_image/{{ $purchaseProduct->image }}"
                        alt="{{ $purchaseProduct->image }}"></p>
                <!-- Add other fields as needed -->

                <div>
                    <a href="" style="border-radius: 10px;" class="btn btn-danger mr-2 border border-light"><i
                            class="fa-solid fa-trash" style="color: #000000;"></i></a>
                </div>
            @else
                <div class="alert alert-danger">
                    <p>No purchase product found with the given ID.</p>
                </div>
            @endif
        </div>
        <div style="padding: 20px">
            <a href="{{ route('all_purchase_product') }}"  style="border-radius: 10px;" class="btn btn-info mr-2 border border-light"><i class="fa-solid fa-backward" style="color: #ffffff;"></i>Back</a>
        </div>
    </div>
@endsection
