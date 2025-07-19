<aside class="app-sidebar bg-dark text-white shadow" data-bs-theme="dark">
    <div class="sidebar-brand d-flex text-center py-4 border-bottom">
        <a href="{{ url('/') }}" class="brand-link d-flex flex-column align-items-center justify-content-center text-decoration-none text-white">
            <img src="{{ asset('asset/images/solarlogo.png') }}" alt="Logo" class="brand-image mb-0" style="width: 60px;">
            <span class="brand-text fw-bold fs-5">Solar Panel Services</span>
        </a>
    </div>

    <div class="sidebar-wrapper px-3">
        <nav class="mt-3">
            <ul class="nav flex-column nav-pills gap-2" data-bs-widget="treeview" role="menu" data-accordion="false">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center gap-3 {{ request()->is('admin*') ? ' active  bg-light' : 'text-white' }}">
                        <i class="bi bi-speedometer2 fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                {{-- Panels --}}
                <li class="nav-item">
                    <a href="{{ route('panels.index') }}" class="nav-link d-flex align-items-center gap-3 {{ request()->is('panels*') ? 'active bg-primary text-white' : 'text-white' }}">
                        <i class="bi bi-grid-1x2-fill fs-5"></i>
                        <span>Panels</span>
                    </a>
                </li>

                {{-- Teams --}}
                <li class="nav-item">
                    <a href="{{ route('teams.index') }}" class="nav-link d-flex align-items-center gap-3 {{ request()->is('teams*') ? 'active bg-primary text-white' : 'text-white' }}">
                        <i class="bi bi-people-fill fs-5"></i>
                        <span>Teams</span>
                    </a>
                </li>

                <!-- login User -->
                <li class="nav-item">
                    <a href="{{ route('totalUser') }}" class="nav-link d-flex align-items-center gap-3 {{ request()->is('totalUser*') ? 'active bg-primary text-white' : 'text-white' }}">
                        <i class="bi bi-person-lines-fill fs-5"></i>
                        <span>Login User</span>
                    </a>
                </li>


                {{-- Orders --}}
                <li class="nav-item">
                    <a href="{{ route('orderpage') }}" class="nav-link d-flex align-items-center gap-3 {{ request()->is('orderpage*') ? 'active bg-primary text-white' : 'text-white' }}">
                        <i class="bi bi-cart-check-fill fs-5"></i>
                        <span>Total Order</span>
                    </a>
                </li>

                {{-- Complains --}}
                <li class="nav-item">
                    <a href="{{ route('complainBox') }}" class="nav-link d-flex align-items-center gap-3 {{ request()->is('complainBox*') ? 'active bg-primary text-white' : 'text-white' }}">
                        <i class="bi bi-chat-left-dots-fill fs-5"></i>
                        <span>Complain Box</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>