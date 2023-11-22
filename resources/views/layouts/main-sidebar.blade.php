

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
                <i class="nav-icon fas fa-shopping-bag"></i> <!-- Change this class to the desired store icon -->
                <p>
                    Stores
                    <span class="badge badge-info right"></span>
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                    Invoices
                    <i class="right fas fa-angle-left"></i>
                    <span class="badge badge-info right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('invoice.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Invoice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('invoice.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Invoices</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-user-circle"></i> <!-- Change this class to the desired customer icon -->
                <p>
                    Customer
                    <span class="badge badge-info right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('customer.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Customer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Customers</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-user"></i> <!-- Change this class to the desired user icon -->
                <p>
                    Employee
                    <span class="badge badge-info right"></span>
                </p>
            </a>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
