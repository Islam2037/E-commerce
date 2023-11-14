<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="{{ url("") }}">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#">Pricing</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
<div class="container mt-5 w-50 ">
    <div class="card" style="width: 30rem;">
        <img src="{{ asset("storage/$product->image") }}" class="card-img-top " alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->desc }}</p>
            <h2 class="btn btn-primary">{{ $product->price }}</h2>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
    </div>
    {{-- @include("User.footer") --}}

</div>



  </body>
</html>

