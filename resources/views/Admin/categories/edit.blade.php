@extends('Admin.layout')
@section('body')
@include('errors')
@include('succsess')
<form method="POST" action="{{ url("updateCategory/$category->id") }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" value="{{ $category->name }}" >

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc">{{ $category->desc }}</textarea>
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection