@extends('Admin.layout')
@section('body')
@include('succsess')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">desc</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
      <tr>
          <th scope="row">{{$loop->iteration}}</th>
        <td>{{$category->name}}</td>
        <td> {{ substr($category->desc, 0,30) }}</td>

        <td>
            <a class="btn btn-success" href="{{url("categories/show/$category->id")}}" >show</a>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>


@endsection