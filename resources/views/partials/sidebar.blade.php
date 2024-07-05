<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">{{ __('KASIR') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('HOME') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.transactions.index') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>{{ __('PEMBELI') }}</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/pos') || request()->is('admin/pos') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pos.index') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>{{ __('TRANSAKSI') }}</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/products') || request()->is('admin/products') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.products.index') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>{{ __('HELP') }}</span></a>
    </li>

    <li
        class="nav-item {{ request()->is('admin/transactions') || request()->is('admin/transactions') ? 'active' : '' }}">
        <a href="" class="nav-link"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-cogs"></i>
            <span>{{ __('LOGOUT') }}</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
        </form>
    </li>
</ul>
