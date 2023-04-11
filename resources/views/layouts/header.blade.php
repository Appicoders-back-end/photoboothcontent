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
                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('about-us')}}">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="content-store.php">Content Store</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('membership') }}">Membership</a></li>
                    <li class="nav-item"><a class="nav-link" href="coupons.php">Coupons</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                </ul>
                @guest
                    <a class="btn btn-main" href="{{route('login')}}">Sign In</a>
                @else
                    <div class="dropdown">
                        <a class="btn btn-main dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            John
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="payment.php">Payment method</a></li>
                            <li><a class="dropdown-item" href="my-coupon.php">My coupons</a></li>
                            <li><a class="dropdown-item" href="order-history.php">Order history</a></li>
                            <li><a class="dropdown-item" href="downloads.php">Downloads</a></li>
                            <li><a href="{{ route('logout') }}"
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
