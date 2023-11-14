@extends("User.layout")
@section("content")
<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
          <form action="{{ url("search") }}" method="GET">
            <input type="text" class=" form-control" name="key" placeholder="search">

            <button class=" btn btn-outline-info mt-2">submit</button>
            <br>

         </form>
         <br>
         @include("succsess")
        </div>
        <br>
        @foreach ($products as $product )
        <div class="col-md-4">
            <div class="product-item">
              <a href="{{ url("allProduct/show/$product->id ") }}"><img src="{{ asset("storage/$product->image") }}" width="300px" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{ $product->name }}</h4></a>
                <h6>{{ $product->price }}</h6>
                <p> {{ substr($product->name ,0,80)}}</p>
                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (24)</span>
                <form action="addToCard/{{$product->id }}" method="POST">
                    @csrf
                    <label for="quan">quantity</label>
                    <input type="number" name="quantity" class=" form-control w-50" value="1" id="quan">
                    <button type="submit" class=" btn btn-outline-info mt-2">add to card</button>

                </form>
              </div>
            </div>
          </div>

        @endforeach


      </div>
    </div>
  </div>

@endsection