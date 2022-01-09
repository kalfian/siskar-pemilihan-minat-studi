<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-list"></i> Master Data</a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.fact.index') }}">
                        <i class="nav-icon icon-star"></i> List Fakta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.study.index') }}">
                        <i class="nav-icon icon-star"></i> List Program Studi</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.relation.index') }}">
                <i class="nav-icon icon-star"></i> Relasi</a>
        </li>
        <li class="divider"></li>
        <li class="nav-title">Settings</li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-user"></i> Admin</a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        <i class="nav-icon icon-user"></i> List Admin</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-danger logout-btn" href="#">
                <i class="nav-icon icon-lock"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
