<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @if(auth()->user()->hasRole('admin'))
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <style>
            .logo {
  border-radius: 50%;
  width:50px;
  height:50px;
}
            </style>
        <span class="brand-text font-weight-light"><img  class='logo' src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" width="50">  Admin Panel</span>
    </a>
    @else
    <a href="{{ route('user.dashboard') }}" class="brand-link">
        <style>
            .logo {
  border-radius: 50%;
  width:50px;
  height:50px;
}
            </style>
        <span class="brand-text font-weight-light"><img  class='logo' src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" width="50">  User Panel</span>
    </a>                
    @endif


    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Admin Dashboard</p>
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>User Dashboard</p>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ asset('admin/roles') }}" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Roles</p>
                        </a>
                        @endif
                </li>
                <li class="nav-item">
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ asset('admin/users') }}" class="nav-link">
                            <i class="nav-icon fas fa-users-slash"></i>
                            <p>Users Permission</p>
                        </a>
                        @endif
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blogs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('services.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('partners.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Partners</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>Account Management</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
