<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Contact Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-end justify-content-xl-end justify-content-md-end" id="collapsibleNavbar">
            <ul class="navbar-nav float-end">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">All Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/contacts')}}">Create Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
