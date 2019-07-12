<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://via.placeholder.com/160" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(explode(".",Request::route()->getName())[0] == '') {{ 'active' }} @endif">
                <a href="/">
                    <i class="fa fa-circle-o"></i>
                    <span> Dashboard</span>
                </a>
            </li>
            <li class="header">Dashboard Management</li>
            {{-- User Management --}}
            <li class="treeview @if(explode(".",Request::route()->getName())[0] == 'users') {{ 'active' }} @endif">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User Manage</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('user-create')
                    <li class="@if(explode(".",Request::route()->getName())[0] == 'users') {{ 'active' }} @endif">
                        <a href="{{ route('users.create') }}">
                            <i class="fa fa-plus"></i>
                            Create
                        </a>
                    </li>
                    @endcan
                    @can('user-list')
                    <li class="@if(explode(".",Request::route()->getName())[0] == 'users') {{ 'active' }} @endif">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-list"></i>
                            View
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            {{-- Role MAnagement --}}
            <li class="treeview @if(explode(".",Request::route()->getName())[0] == 'roles') {{ 'active' }} @endif">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Role Manage</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role-create')
                    <li class="@if(explode(".",Request::route()->getName())[0] == 'roles') {{ 'active' }} @endif">
                        <a href="{{ route('roles.create') }}">
                            <i class="fa fa-users"></i>
                            Create
                        </a>
                    </li>
                    @endcan
                    @can('role-create')
                    <li class="@if(explode(".",Request::route()->getName())[0] == 'roles') {{ 'active' }} @endif">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-list"></i>
                            View
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            {{-- Permision --}}
            <li class="treeview @if(explode(".",Request::route()->getName())[0] == 'permissions') {{ 'active' }} @endif">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Permissions Manage</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('user-create')
                    <li class="@if(explode(".",Request::route()->getName())[0] == 'permissions') {{ 'active' }} @endif">
                        <a href="{{ route('permissions.create') }}">
                            <i class="fa fa-users"></i>
                            Create
                        </a>
                    </li>
                    @endcan
                    @can('user-list')
                    <li class="@if(explode(".",Request::route()->getName())[0] == 'permissions') {{ 'active' }} @endif">
                        <a href="{{ route('permissions.index') }}">
                            <i class="fa fa-list"></i>
                            View
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
</aside>
