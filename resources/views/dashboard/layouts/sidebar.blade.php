<!-- Sidebar -->
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 vh-100" style="background-color: #EDF3F2; position: fixed; top: 80px; bottom: 0;">

    <div class="offcanvas-md offcanvas-end vh-100" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel" style="background-color: #a3be4c;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="bi bi-house-add-fill"></i>
                        Dashboard
                    </a>
                </li>
            </ul>
            <hr class="my-2 text-black">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('departemen') ? 'active' : '' }}" href="/departemen">
                        <i class="bi bi-building"></i>
                        Data Departemen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('jabatan') ? 'active' : '' }}" href="/jabatan">
                        <i class="bi bi-person-workspace"></i>
                         Data Jabatan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('karyawan') ? 'active' : '' }}" href="/karyawan">
                        <i class="bi bi-people-fill"></i>
                        Data Karyawan
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('gaji') ? 'active' : '' }}" href="/gaji">
                        <i class="bi bi-cash"></i>
                        Gaji Karyawan
                    </a>
                </li>
            </ul>

            <hr class="my-3 text-black">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <form id="logout-form" action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <a class="nav-link d-flex align-items-center gap-2" href="#" onclick="document.getElementById('logout-form').submit(); this.classList.add('active');" >
                            <i class="bi bi-box-arrow-right"></i>
                            Sign out
                        </a>
                    </form>
                </li>
            </ul>


        </div>
    </div>
</div>


