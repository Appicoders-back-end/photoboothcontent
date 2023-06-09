<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{get_logo()}}"
                     alt="Photobooth" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ url('/') == url()->current() ? 'active':'' }}" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ route('about-us') == url()->current() ? 'active':'' }}" href="{{route('about-us')}}">About us</a></li>
                    <li class="nav-item"><a class="nav-link {{ route('content-store') == url()->current() ? 'active':'' }}" href="{{route('content-store')}}">Content Store</a></li>
                    <li class="nav-item"><a class="nav-link {{ route('memberships') == url()->current() ? 'active':'' }}" href="{{ route('memberships') }}">Membership</a></li>
                    <li class="nav-item"><a class="nav-link {{ route('coupons') == url()->current() ? 'active':'' }}" href="{{route('coupons')}}">Coupons</a></li>
                    <li class="nav-item"><a class="nav-link {{ route('shop.home') == url()->current() ? 'active':'' }}" href="{{ route('shop.home') }}">Shop</a></li>
                    <li class="nav-item"><a class="nav-link {{ route('contact-us') == url()->current() ? 'active':'' }}" href="{{route('contact-us')}}">Contact us</a></li>
                </ul>
                @if(auth()->user() && count((array) session('cart')) > 0)
                    <a href="{{ route('shop.cart') }}" type="button" class="btn d-flex align-items-center cart-btn" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i> <span class="ms-2 badge badge-pill bg-danger">{{ count((array) session('cart')) }}</span>
                    </a>
                @endif
                @guest
                    <a class="btn btn-main" href="{{route('login')}}">Sign In</a>
                @else
                    <div class="dropdown">
                        <a class="btn btn-main dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{route('payment-methods.index')}}">Payment method</a></li>
                            <li><a class="dropdown-item" href="{{ route('edit-profile') }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('myCoupons')}}">My Coupons</a></li>
                            <li><a class="dropdown-item" href="{{route('changePassword')}}">Change Password</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop.order.history') }}">Order history</a></li>
                            <li><a class="dropdown-item" href="{{route('myDownloads')}}">Downloads</a></li>
                            <li><a href="javascript:;"
                                   class="dropdown-item"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>
