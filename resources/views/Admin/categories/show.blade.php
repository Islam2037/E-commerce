@extends('Admin.layout')
@section('body')
<table class="table">
    <thead>
      <tr>

        <th scope="col">Name</th>
        <th scope="col">desc</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <td>{{$category->name}}</td>
        <td>{{substr($category->desc, 0,80)}}</td>

        <td>


            <form action="{{url("deleteCategory/$category->id")}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </td>
        <td>
            <h1>
                <a class="btn btn-success"  href="{{url("editCategory/$category->id")}}"> edit </a>

            </h1>
        </td>
    </tr>


    </tbody>
  </table>


@endsection