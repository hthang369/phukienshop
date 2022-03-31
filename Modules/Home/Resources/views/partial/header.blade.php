<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            @widget('text_top_herder')
        </div>

        <div class="social-links d-none d-md-flex">
            @widget('text_header_social')
        </div>
    </div>
</section>

<header id="header" class="d-flex align-items-center sticky-top">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1><a href="/"><img src="{{ asset("storage/images/".data_get($infoSettings, 'home.web_logo')) }}" /></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
        {!! $menus !!}
        </nav><!-- .navbar -->

        <div class="navbar-info">
            {!! bt_link_to('', '', 'link', ['icon' => 'fa-search']) !!}
            {!! bt_link_to_route('cart.index', null, 'link', [], ['icon' => 'fa-shopping-cart']) !!}
            <i class="fa fa-user-o mx-2" aria-hidden="true"></i>
        </div>
        </div>
</header>
