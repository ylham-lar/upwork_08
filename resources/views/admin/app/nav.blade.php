<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Navbar">
    <div class="container-xxl">
        <a class="navbar-brand" href="{{ route('v1.admin.dashboard') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-light" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('v1.admin.dashboard') }}">
                        Dashboard </a>
                </li>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Security
                    </button>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.ipaddress.index') }}">IpAddres</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.useragent.index') }}">UserAgent</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.authattempt.index') }}">AuthAttempt</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.visitor.index') }}">Visitor</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.verification.index') }}">Verification</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </button>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.user.index') }}">User</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.client.index') }}">Client</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.freelancer.index') }}">Freelancer</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.profile.index') }}">Profile</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catalogs
                    </button>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.skill.index') }}">Skills</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.location.index') }}">Locations</a></li>
                        <li> <a class="dropdown-item" href="{{ route('v1.admin.review.index') }}">Reviews</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Work
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('v1.admin.work.index') }}">Works</a></li>
                        <li><a class="dropdown-item" href="{{ route('v1.admin.proposal.index') }}">Propoals</a></li>
                    </ul>
                </div>
            </ul>
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}" id="logout">
                @csrf
                <button class="btn btn-secondary" type="submit"><i class="bi bi-box-arrow-right"></i> Logout </button>
            </form>
        </div>
    </div>
</nav>