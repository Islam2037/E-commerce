<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.html"><h2><em>{{ __("message.E-commerce") }}</em></h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url("") }}">{{ __("message.Home") }}
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url("myCard") }}">{{ __("message.my cart") }}</a>
          </li>
          @if(session()->has('lang')&&session()->get("lang")=="ar")

          <li class="nav-item">
            <a class="nav-link" href="{{ url("changeLang/en") }}">English</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url("changeLang/ar") }}">العربية</a>
          </li>



          @endif


          @guest
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">{{ __("message.login") }}</a>
              </li>

          @endguest
          @auth
            <li class="nav-item">
                
                <a class="nav-link" href="/dashboard">{{ __("message.logout") }}</a>
              </li>

          @endauth

        </ul>
      </div>
    </div>
  </nav>