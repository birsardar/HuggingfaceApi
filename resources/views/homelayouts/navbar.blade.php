<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link font-weight-bold" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <ul class="nav flex-column" id="nav_accordion">
            @auth
                <li class="nav-item mr-5">
                    <a href="{{ route('logout') }}" class="btn btn-danger font-weight-bold"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endauth
        </ul>

    </div>
</nav>
