<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">My Profile</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto gap-2 mt-2 mt-lg-0">
                <a href="{{ route('user') }}" class="btn btn-outline-light btn-sm">Users</a>
                <a href="{{ route('todo') }}" class="btn btn-outline-light btn-sm">Product List</a>
                <a href="{{ route('displayProfile') }}" class="btn btn-outline-light btn-sm">Profile</a>
                <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </div>
</nav>