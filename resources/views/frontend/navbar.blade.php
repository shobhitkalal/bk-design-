<nav class="navbar navbar-expand-lg  navbar-dark" data-bs-theme="black" style="background:indigo">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Bk Design Studio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/designcollection') }}">Designs</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ url('/collections') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Products
            </a>
            <ul class="dropdown-menu">
                    @foreach ($category as $c)
                <li><a class="dropdown-item" href="{{url('/collections/'.$c->name)}}">{{$c->name}}</a></li>
                @endforeach
            </ul>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{url('/designcollection')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Designs
            </a>
            <ul class="dropdown-menu">
                @foreach ($designcategory as $z)
              <li><a class="dropdown-item" href="{{url('/designcollection/'.$z->name)}}">{{$z->name}}</a></li>
              @endforeach
            </ul>
          </li> --}}
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              help
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Contact Us!!!!</a></li>
              <li><a class="dropdown-item" href="#">Know More</a></li>
            </ul>
        </li> --}}
        </ul>
        <form class="d-flex" role="search" action="{{url('search')}}">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/cart')}}"><i class="bi bi-cart"  style="font-size:25px"></i>
                <span class="badge rounded-pill text-bg-danger">
                  <livewire:frontend.cart.cart-count-new />
                </span>
                </a>
              </li>
        </ul>
        <ul class="navbar-nav ms-auto">
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
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/profile')}}">
                        <i class="bi bi-person-fill"></i> Profile
                     </a>
                     <hr/>
                     <a class="dropdown-item" href="{{ url('/myorders') }}">
                        <i class="bi bi-list"></i> MyOrders
                     </a>
                     <hr/>
                     {{-- <a class="dropdown-item" href="{{ url('/Cart') }}">
                        <i class="bi bi-cart"></i> Cart
                     </a> --}}
                    <hr/>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                             <i class="bi bi-arrow-left-circle"></i>{{ __(' Logout') }}
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
  </nav>







