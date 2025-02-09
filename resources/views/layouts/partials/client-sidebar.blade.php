<li class="nav-item {{ request()->is('projects*') ? 'menu-open' : '' }}">
    <a href="pages/gallery.html"
        class="nav-link {{ request()->is('projects*') ? 'active' : '' }}">
        <i class="nav-icon fab fa-stack-overflow"></i>
        <p>
            Project setting
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('projects.index') }}"
                class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Projects</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('projects.create') }}"
                class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Project Add</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ request()->routeIs('client.users.*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('client.users.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            User setting
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('client.users.list', auth()->user()->tenant_id) }}"
                class="nav-link  {{ request()->routeIs('client.users.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('client.users.create', auth()->user()->tenant_id) }}"
                class="nav-link {{ request()->routeIs('client.users.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User Add</p>
            </a>
        </li>
    </ul>
</li>