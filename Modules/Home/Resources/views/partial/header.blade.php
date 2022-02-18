<header class="container-xl px-0">
    <div id="iHeader" class="row">
        <div class="col">
            <div id="ilogo" class="d-flex justify-content-between py-2">
                <a href=""><img src="{{ vnn_asset(data_get($infoSettings, 'home.web_banner')) }}" class="img-fluid" height="110"></a>
            </div>
        </div>
    </div>
</header>

<nav class="bg-primary">
    <div id="iTopmenu" class="container-xl">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary pl-sm-0 py-1">
            {!! $menus !!}

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
    </div>
</nav>
