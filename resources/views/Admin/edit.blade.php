@extends('Admin.layout')
@section('body')
@include('errors')
<form method="POST" action="{{url("updateProduct/$product->id" )}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" value="{{ $product->name }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <select name="category_id" id="" class="form-control text-white">
            @foreach($categories as $category)
            <option value="{{$category->id  }}">{{ $category->name }}</option>
            <br>
            @endforeach
        </select>

      </div>

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc"  class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc">{{ $product->desc }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset=""></td>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection