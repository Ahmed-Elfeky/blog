@php
use App\Models\Category;
use App\Models\User;
$user = User::get();
$categories = Category::get();
@endphp

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
                        <li class="nav-item @yield('contact-active')"><a class="nav-link" href="{{ route('website.contact') }}">Contact</a></li>
                        <li class="nav-item submenu dropdown @yield('category-active')">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
                            <ul class="dropdown-menu">
                                @if(count($categories) >0)
                                @foreach ($categories as $category )
                                <li class="nav-item"><a class="nav-link" href="{{ route('website.category' , ['id'=>$category->id] ) }}">{{ $category->name }}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary mr-1">Add New Blog</a>
                    <ul class="nav navbar-nav navbar-right navbar-social">
                        @if(!Auth::check())
                        <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>
                        @else
                        <li class="nav-item submenu dropdown d-flex align-items-center">
                            <a href="#" class="nav-link dropdown-toggel mr-2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</a>
                            <img class="rounded-circle" style="height: 40px; width:45px" src="{{asset('images/user/'.auth()->user()->logo)}}">
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('website.MyBlog') }}">My Blogs</a></li>
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
