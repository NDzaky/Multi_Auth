
<nav class="navbar navbar-expand-lg navbar-light bg-dark-100" style="box-shadow: 0px 0px 7px 5px rgb(0, 204, 255)">
    <a class="navbar-brand" href="#" style="color: #90c7dd;">Navbar</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" style="display: flex">
                <a class="nav-link" href="/" style="color: #40E0D0;">Home</a>
                @auth
                    <a class="nav-link" href="{{ route('dashboard.redirect') }}" style="color: #40E0D0;">Dashboard</a>
                @endauth
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" style="color: #40E0D0;">Log in</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" style="color: #40E0D0;">Register</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" style="color: #40E0D0;"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
