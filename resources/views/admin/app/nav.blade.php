<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Navbar">
    <div class="container-xxl">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-light" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.dashboard') }}">
                        Dashboard </a>
                </li>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Security
                    </button>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="{{ route('admin.ipaddress') }}">IpAddres</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.useragent') }}">UserAgent</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.authattempt') }}">AuthAttempt</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.visitor') }}">Visitor</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.verification') }}">Verification</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </button>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="{{ route('admin.user') }}">User</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.client') }}">Client</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.freelancer') }}">Freelancer</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catalogs
                    </button>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="{{ route('admin.skill') }}">Skills</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.location') }}">Locations</a></li>
                        <li> <a class="dropdown-item" href="{{ route('admin.review') }}">Reviews</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-auto">
                    <button class="btn btn-dark dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Work
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.work') }}">Works</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.proposal') }}">Propoals</a></li>
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