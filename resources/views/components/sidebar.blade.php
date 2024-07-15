<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">SimpleCRM</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#company" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                    Perusahaan
                </a>
                <ul id="company" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="/companies" class="sidebar-link">Perusaaan</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pegawai" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                    Pegawai
                </a>
                <ul id="pegawai" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="/pegawai" class="sidebar-link">Pegawai</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#devisi" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                    Devisi
                </a>
                <ul id="devisi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="/devisi" class="sidebar-link">Devisi</a>
                    </li>
                </ul>
            </li>
            @auth
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#user" data-bs-toggle="collapse"
                        aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                        User
                    </a>
                    <ul id="user" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/user" class="sidebar-link">User</a>
                        </li>
                    </ul>
                </li>
                @endif
            @endauth
        </ul>
    </div>
</aside>