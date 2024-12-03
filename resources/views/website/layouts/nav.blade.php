<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('website.index') }}"><img src="assets/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item @yield('home-active')"><a class="nav-link" href="{{ route('website.index') }}">Home</a></li>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                          
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another </a></li>
                              <li><a class="dropdown-item" href="#">Something  </a></li>
                            </ul>
                          </div>
                        {{-- <li class="nav-item @yield('category-active')"><a class="nav-link" href="{{ route('website.category') }}">Category</a></li> --}}
                        <li class="nav-item @yield('contact-active')"><a class="nav-link" href="{{ route('website.contact') }}">Contact</a></li>
                        <li class="nav-item @yield('blog-active')"><a class="nav-link" href="{{ route('website.blog') }}">Blog</a></li>
                    </ul>
                        <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary mr-1">Add New Blog</a>

                    <ul class="nav navbar-nav navbar-right navbar-social">

                        @if(!Auth::check())
                        <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>
                        @else
                        <li class="nav-item submenu dropdown">
                            <a href="" class="nav-link dropdown-toggel" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="#">My Blogs</a></li>
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a class="nav-link" href="javascript:$('form').submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
