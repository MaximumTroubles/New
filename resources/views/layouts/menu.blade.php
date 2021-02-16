<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fffc44;">
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="container">
            <a class="navbar-brand" href="/">
              <img src="img/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-top">Market
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page"  href="/contacts">Contacts</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/sale">Sale</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/reviews ">Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/news ">News</a>
              </li>
              @role('admin')
              <li class="nav-item">
                <a class="nav-link text-danger" href="/admin ">Admin Panel</a>
              </li>
              @endrole



            </ul>
            {{-- {{ dd(Gate::allows('manage-categories')) }} --}}
            {{-- Search --}}
            {{-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-warning" type="submit">Search</button>
            </form> --}}

            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                  @endif

                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
            </ul>

          </div>
      </div>
    </div>
  </nav>
