<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">CashierAppFS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon icon ion-md-pulse"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon icon ion-md-apps"></i>
                            <p>
                                Apps
                                <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Type::class)
                                <li class="nav-item">
                                    <a href="{{ route('types.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Types</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Customer::class)
                                <li class="nav-item">
                                    <a href="{{ route('customers.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Customers</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Table::class)
                                <li class="nav-item">
                                    <a href="{{ route('tables.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Tables</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Stock::class)
                                <li class="nav-item">
                                    <a href="{{ route('stocks.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Stocks</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\User::class)
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Booking::class)
                                <li class="nav-item">
                                    <a href="{{ route('bookings.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Bookings</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Category::class)
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Menu::class)
                                <li class="nav-item">
                                    <a href="{{ route('menus.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Menus</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>

                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                            Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon icon ion-md-key"></i>
                                <p>
                                    Access Management
                                    <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view-any', Spatie\Permission\Models\Role::class)
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link">
                                            <i class="nav-icon icon ion-md-radio-button-off"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('view-any', Spatie\Permission\Models\Permission::class)
                                    <li class="nav-item">
                                        <a href="{{ route('permissions.index') }}" class="nav-link">
                                            <i class="nav-icon icon ion-md-radio-button-off"></i>
                                            <p>Permissions</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                @endauth

                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1//index.html" target="_blank" class="nav-link">
                        <i class="nav-icon icon ion-md-help-circle-outline"></i>
                        <p>Docs</p>
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon icon ion-md-exit"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
