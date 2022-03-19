<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #161F37">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/img/favicon.png') }}" alt="Shikkha Britti" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Shikkha Britti</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="{{ route('dashboard') }}"><img
                        src="{{ auth()->user()->photo_url != null ? url('storage/' . auth()->user()->photo_url) : asset('/assets/img/null/avatar.jpg') }}"
                        class="img-circle elevation-2" alt="User Image"></a>
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-meteor"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('edit_user_profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Edit Profile
                        </p>
                    </a>
                </li>
                @can('user-list')
                    <li class="nav-item">
                        <a href="{{ route('manage_users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Manage Users
                            </p>
                        </a>
                    </li>
                @endcan
                @can('superadmin-can')
                    <li class="nav-item">
                        <a href="{{ route('manage_tenants.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Manage Tenants
                            </p>
                        </a>
                    </li>
                @endcan
                @can('role-list')
                    <li class="nav-item">
                        <a href="{{ route('manage_roles.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-secret"></i>
                            <p>
                                Manage Roles
                            </p>
                        </a>
                    </li>
                @endcan
                @can('admin-can')
                    <li class="nav-item">
                        <a href="{{ route('manage_permissions.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-secret"></i>
                            <p>
                                Manage Permissions
                            </p>
                        </a>
                    </li>
                @endcan
                {{-- @can('admin-can', 'tenant-can') --}}
                @role('SUPER_ADMIN|TENANT')
                <li class="nav-item">
                    <a href="{{ route('manage_scholarships_create') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Create Scholarships
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage_scholarships_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Manage Scholarships
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage_applications_scholarships_index') }}" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>
                            Approved Applications
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Manage Mentors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manage_mentors.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Add New Mentor</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manage_mentors.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Mentor List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Payment Statement
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manage_monthly_statement_create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Create New Statement</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manage_statement_search') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Monthly Statement</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manage_monthly_statement_index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Statement List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
                {{-- @endcan --}}
                @role('MENTOR')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Accounts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manage_mentor_accounts_details', auth()->user()->mentor->id) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Account List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole


                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{route('goto_add_station_page')}}" class="nav-link"> --}}
                {{-- <i class="nav-icon fas fa-plus-square"></i> --}}
                {{-- <p> --}}
                {{-- New Station --}}
                {{-- <!-- <span class="right badge badge-danger">New</span> --> --}}
                {{-- </p> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{route('station_list')}}" class="nav-link"> --}}
                {{-- <i class="nav-icon fas fa-gas-pump"></i> --}}
                {{-- <p> --}}
                {{-- Station List --}}
                {{-- <!-- <span class="right badge badge-danger">New</span> --> --}}
                {{-- </p> --}}
                {{-- </a> --}}
                {{-- </li> --}}




                {{-- <li class="nav-item"> --}}
                {{-- <a href="#" class="nav-link"> --}}
                {{-- <i class="nav-icon fas fa-camera"></i> --}}
                {{-- <p> --}}
                {{-- Multimedia --}}
                {{-- <i class="fas fa-angle-left right"></i> --}}
                {{-- </p> --}}
                {{-- </a> --}}
                {{-- <ul class="nav nav-treeview"> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="{{route('admin_video_gallery')}}" class="nav-link"> --}}
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                {{-- <p>Video Gallery</p> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{--  --}}
                {{-- </ul> --}}
                {{-- </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
