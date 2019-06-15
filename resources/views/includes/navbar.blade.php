<div id="app">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'CIMT') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <!-- Guests only see Login and Registeration links in navbar -->
          @guest
            <li class="nav-item">
              {{-- <a class="nav-link" href="custom/login">{{ __('Login') }}</a> --}}
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <!-- Links -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                <a class="nav-link" href="/">Main Menu<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/resources/create">Add Available Resource</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/incidents/create">Add Emergency Incident</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/resources/search">Search Resources</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/resources/report">Generate Resource Report</a>
              </li>
            </ul>

            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
                <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>

    </div>
  </nav>
</div>
