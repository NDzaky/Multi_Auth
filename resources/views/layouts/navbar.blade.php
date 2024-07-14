<ul class="bar">
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

