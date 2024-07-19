<div class="sidebar-brand">
    <a href="index.html">Stisla</a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
</div>
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li>
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
    </li>
    @if (auth()->user()->role != 'admin')
        <li><a class="nav-link" href="{{ route('approve.index') }}"><i
                    class="fa-duotone fa-solid fa-truck-ramp-box"></i>Approver</a></li>
    @endif
</ul>
@if (auth()->user()->role == 'admin')
    <ul class="sidebar-menu">
        <li class="menu-header">Reservation</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i
                    class="fa-duotone fa-solid fa-truck-ramp-box"></i><span>Vehicle Rent</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('reservations.index') }}">Reservation</a></li>
            </ul>
        </li>
        <li><a class="nav-link" href="{{ route('vehicles.index') }}"><i
                    class="fa-duotone fa-solid fa-car"></i><span>Vehicle</span></a></li>
        <li><a class="nav-link" href="{{ route('drivers.index') }}"><i
                    class="fa-duotone fa-solid fa-id-card"></i><span>Driver</span></a>
        </li>
    </ul>
@endif
