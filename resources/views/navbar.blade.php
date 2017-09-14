<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

    @auth
        <div class="btn-group dropdown navbar-right">
            <button class="btn btn-default dropdown-toggle navbar-btn"
            type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="true">
                Menu
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="/profile">My profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    @endauth

    @guest
    <div class="btn-group dropdown navbar-right">
        <button class="btn btn-default dropdown-toggle navbar-btn"
        type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
         aria-expanded="true">
            Menu
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
    </div>
    @endguest

    </div>
</nav>
