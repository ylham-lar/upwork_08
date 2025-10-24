<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" aria-label="Admin Navbar">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold" href="{{ route('v1.admin.dashboard') }}">
            <i class="bi bi-bar-chart-line-fill me-1"></i>
            Admin Panel
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{ route('v1.admin.dashboard') }}">
                        <i class="bi bi-house-door-fill me-1"></i>Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-shield-lock-fill me-1"></i>Security
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v1.admin.ipaddress.index') }}">IP Addresses</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.useragent.index') }}">User Agents</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.authattempt.index') }}">Auth Attempts</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.visitor.index') }}">Visitors</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.verification.index') }}">Verifications</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people-fill me-1"></i>Users
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v1.admin.user.index') }}">Users</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.client.index') }}">Clients</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.freelancer.index') }}">Freelancers</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.profile.index') }}">Profiles</a></li>
                    </ul>
                </li>

                <!-- Catalogs Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-journal-bookmark-fill me-1"></i>Catalogs
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v1.admin.skill.index') }}">Skills</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.location.index') }}">Locations</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.review.index') }}">Reviews</a></li>
                    </ul>
                </li>

                <!-- Work Dropdown -->
                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-briefcase-fill me-1"></i>Work
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v1.admin.work.index') }}">Works</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.proposal.index') }}">Proposals</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Logout button -->
            <div class="d-flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm" type="submit">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>