@extends('Admin.layout')
@section('body')
<table class="table">
    <thead>
      <tr>

        <th scope="col">Name</th>
        <th scope="col">desc</th>
        <th scope="col">price</th>
        <th scope="col">Quantity</th>
        <th scope="col">image</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <td>{{$product->name}}</td>
        <td>{{$product->desc}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset=""></td>
        <td>


            <form action="{{url("deleteProduct/$product->id")}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </td>
        <td>
            <h1>
                <a class="btn btn-success" href="{{url("editProduct/$product->id")}}" >edit</a>
            </h1>
        </td>
    </tr>


    </tbody>
  </table>


@endsection