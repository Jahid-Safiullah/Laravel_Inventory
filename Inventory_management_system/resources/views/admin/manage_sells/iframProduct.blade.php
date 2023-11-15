
<div style="position: sticky; top: 0; z-index: 100;  padding:3px;  background-color:rgb(158, 185, 244); text-align:center" >
    <form class=" "  action="{{url('')}}" method="post">
       @csrf
       <input name="Search_product" style="border-radius:  25px 0 0 25px;height:30px; border-style:  " type="text" class="" placeholder="Product name.." aria-label="Supplier name" aria-describedby="button-addon2" >
       <button type="submit" style="border-radius: 0 25px 25px 0;height:30px;  border-style: solid;  " class="btn " type="button" id="button-addon2" >Search</button>
   </form>
 </div>

@foreach ($products->chunk(4) as $productRow)
    <div style="display: flex;">


        @foreach ($productRow as $product)

            <div style="flex:1; margin-right: 10px; border:solid rgb(234, 234, 234) 5px; background-color: #ffffff; height:50%  ; padding:10px  ">
                <h2 style="margin:auto; padding:7px; color: #4CAF50">{{ $product->name }}</h2>
                <img src="/product_image/{{ $product->image }}" alt="Product Image" style="max-width: 150px; height: 100px;">
                <p style="color: #4CAF50">{{ $product->description }}</p>
                <p style="color: #4CAF50">{{ $product->purchase_id }}</p>

                <p style="color: #4CAF50">${{ $product->sell_price }}</p>
                <form action="{{route('add_order_to_cart', $product->purchase_id)}}" method="post">
                    @csrf


                    <label for="quantity">Quantity:</label>
                    <input style="max-width: 50px ;height:35px" type="number" name="quantity" id="quantity" value="1" min="1">
                    <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; padding: 10px;">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>

@endforeach


