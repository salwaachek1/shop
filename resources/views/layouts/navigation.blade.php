<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('products.index') }}">
            Mini Shop
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <div class="navbar-nav me-auto">
                <a href="{{ route('products.index') }}"
                   class="nav-link {{ request()->routeIs('products.*') || request()->routeIs('products.index') ? 'active' : '' }}">
                    Products
                </a>

                @auth
                    <a href="{{ route('cart.index') }}"
                       class="nav-link {{ request()->routeIs('cart.*') ? 'active' : '' }}">
                        Cart
                    </a>
                @endauth
            </div>

            <div class="d-flex align-items-center gap-2">
                @auth
                    <span class="navbar-text text-white-50 me-2">
                        {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
