@extends('admin.layout')

@section('content')
    <div class="">


        <div style="text-align:end; padding-bottom: 25px;">
            <a href="{{ route('purchase') }}" style="border-radius: 10px;" class="btn btn-primary mr-2 border border-light"><i
                    class="fa-solid fa-circle-plus" style="color: #192843;"></i>add Purchase</a>
        </div>




        <div class="container mt-4">
            @if ($showData)
                <div class="card border-rounded">
                    <div class="card-body">
                        <h1 class="card-title">Product Details</h1>
        
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/product_image/{{ $showData->image }}" alt="{{ $showData->image }}"
                                    class="img-fluid rounded">
                            </div>
                            <div class="col-md-6">
                                <p><strong>Product Code:</strong> {{ $showData->purchase_code }}</p>
                                <p><strong>Name:</strong> {{ $showData->name }}</p>
                                <p><strong>Description:</strong> {{ $showData->description }}</p>
                                <p><strong>Category:</strong> {{ $showData->catagory }}</p>
                                <p><strong>Buying Price:</strong> {{ $showData->buy_price }}</p>
                                <p><strong>Selling Price:</strong> {{ $showData->sell_price }}</p>
                                <p><strong>Quantity:</strong> {{ $showData->quantity }}</p>
                                <p><strong>Unit:</strong> {{ $showData->unit }}</p>
                                <p><strong>Discounted Price:</strong> {{ $showData->dis_price }}</p>
                                <p><strong>Status:</strong> {{ $showData->status }}</p>
                            </div>
                        </div>
        
                        <div class="mt-3">
                            <a href="" class="btn btn-danger mr-2 border border-light">
                                <i class="fa-solid fa-trash" style="color: #000000;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger mt-4">
                    <p>No purchase product found with the given ID.</p>
                </div>
            @endif
        </div>
        
        <div style="padding: 20px">
            <a href="{{ route('all_purchase_product') }}"  style="border-radius: 10px;" class="btn btn-info mr-2 border border-light"><i class="fa-solid fa-backward" style="color: #ffffff;"></i>Back</a>
        </div>
    </div>
@endsection
