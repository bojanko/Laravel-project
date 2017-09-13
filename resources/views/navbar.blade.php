<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

    @auth
    <button type="button" class="btn btn-default navbar-btn navbar-right">Log out</button>
    @endauth

    @guest
    <button type="button" class="btn btn-default navbar-btn navbar-right">Log in</button>
    <button type="button" class="btn btn-default navbar-btn navbar-right">Register</button>
    @endguest

    </div>
</nav>
