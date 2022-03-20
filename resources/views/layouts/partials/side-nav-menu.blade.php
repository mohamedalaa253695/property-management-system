<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="menu-icon mdi mdi-chart-bar"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Properties</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href=" #ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Property Manager</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('countries') }}">Countries</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('governorates') }}">governorates</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('cities') }}">Cities</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('complexes') }}">Complexes</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('buildings.index') }}">buildings</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('properties') }}">Properties</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('statuses') }}">Property
                            Status</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Users</li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>

        <li class="nav-item nav-category">Invoices</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('invoices') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Invoices</span>
            </a>
        </li>



        <li class="nav-item nav-category">Reports</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports') }}">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li>
    </ul>
</nav>
