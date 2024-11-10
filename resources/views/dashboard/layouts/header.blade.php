<header class="navbar fixed-top flex-md-nowrap p-0 shadow" style="background-color: #EDF3F2;" data-bs-theme="hijau">
    <a href="/dashboard" class="navbar-brand">
        <span style="color: #3A4D6B; font-size: 22px; font-weight: bold;">Manajemen Karyawan</span>
    </a>
    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="bi"><use xlink:href="#list"/></svg>
            </button>
        </li>
    </ul>

    <ul class="navbar-nav">
        <li class="nav-item px-3">
            @if (auth()->check())
                <a href="" style="color: #2d3c54; font-size: 16px; text-decoration: none;">
                    <span class="me-2">
                        <i class="bi bi-person-fill" style="color: #2d3c54;"></i> {{ auth()->user()->name }}
                    </span>
                </a>
            @else
                <button class="btn-login" style="border-color: #2d3c54; transition: background-color 0.3s, color 0.3s;" onclick="window.location.href='/login';">
                    <i class="bi bi-person-fill" ></i> Login
                </button>
            @endif
        </li>
    </ul>

</header>
