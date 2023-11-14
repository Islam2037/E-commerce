
@extends("User.layout")
@section("content")
<h2 class="text-center mt-3 text-info">#Cart</h2>
        <p class="text-center mt-3">Let's see what you have.</p>
    </section>

    <section id="cart" class="section-p1 container   mt-3">
        <table  width="75%" class="mx-auto table table-light table-striped-columns">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody>

                @if (isset($product))

                @foreach ($products as $id=>$product )

                <tr class="">
                    <td class="mt-2"><img src="{{ asset("Storage/{$product['image']}") }}"  width="100px" alt="product1"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['price'] * $product['quantity'] }}</td>
                    <td><a class="btn btn-danger" href="{{ url("deleteProduct/$id")}}">Delete</a></td>
                </tr>

                @endforeach
            </tbody>
            <!-- confirm order  -->

            {{-- <td><button type="submit" name="" class="btn btn-success">Confirm</button></td> --}}

        </table>
        <form action="{{ url("makeOrder") }}" method="POST">
            @csrf
            <label for="requiredDate">requiredDate</label>
            <input type="date" name="requiredDate" id="requiredDate">
            <button  class="btn btn-success " type="submit">makeOrder</button>


        </form>
        @endif
    </section>

    <!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->







@endsection


