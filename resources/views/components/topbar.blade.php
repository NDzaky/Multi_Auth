<link rel="stylesheet" href="../../css/style.css">
<script src=""></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<nav class="nav-bar">
    <a  href="/" class="neon-button"><i class='bx bx-home-alt'></i></a>
    @auth
    <a  href="{{ route('dashboard.redirect') }}"class="neon-button"><i class='bx bxs-dashboard'></i></a>
    @endauth
    <div class="aksi">
    @guest
        <a  href="{{ route('login') }}" class="neon-button"><i class='bx bx-log-in'></i></i></a>
    @if (Route::has('register'))
        <a  href="{{ route('register') }}" class="neon-button"><i class='bx bx-registered'></i></a>
    @endif
    @else
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="neon-button"><i class='bx bx-log-out'></i></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
    @endguest   
    </div>
</nav>

