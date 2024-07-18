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
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            <li class="sidebar-item">
                <a href="/companies" class="sidebar-link">
                    <i class="fa-solid fa-file-lines pe-2"></i>
                    Perusahaan
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/pegawai" class="sidebar-link">
                    <i class="fa-solid fa-sliders pe-2"></i>
                    Pegawai
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/devisi" class="sidebar-link">
                    <i class="fa-regular fa-user pe-2"></i>
                    Devisi
                </a>
            </li>
            @auth
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                <li class="sidebar-item">
                    <a href="/user" class="sidebar-link">
                        <i class="fa-regular fa-user pe-2"></i>
                        User
                    </a>
                </li>
                @endif
            @endauth
        </ul>
    </div>
</aside>