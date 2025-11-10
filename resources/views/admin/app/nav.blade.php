<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" aria-label="Admin Navbar">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
            Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.user.index') }}">Users</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.client.index') }}">Clients</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.freelancer.index') }}">Freelancers</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Work
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.work.index') }}">Works</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catalogs
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.skill.index') }}">Skills</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.location.index') }}">Locations</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Security
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.ipaddress.index') }}">IP Addresses</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.useragent.index') }}">User Agents</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.authattempt.index') }}">Auth Attempts</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('admin.visitor.index') }}">Visitors</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.verification.index') }}">Verifications</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>