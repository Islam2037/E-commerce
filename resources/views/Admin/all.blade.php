@extends('Admin.layout')
@section('body')
@include('succsess')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">Quantity</th>
        <th scope="col">image</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
      <tr>
          <th scope="row">{{$loop->iteration}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset=""></td>
        <td>
            <a class="btn btn-success" href="{{url("products/show/$product->id")}}" >show</a>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>


@endsection