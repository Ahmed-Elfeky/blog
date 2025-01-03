@extends('website.layouts.master')
@section('title', 'Blog')
@section('home-active', 'active')
@section('contact')
    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours &amp; Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>December 12, 2018</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->

        <!--================ Blog slider start =================-->
        @if (isset($blogs) && count($blogs) > 0)

        <section>
            <div class="container">

                <div class="owl-carousel owl-theme blog-slider owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-1080px, 0px, 0px); transition: 1.5s; width: 3240px;">

                                @foreach ($blogs as $blog)
                                    <div class="owl-item cloned" style="width: 240px; margin-right: 30px;">
                                        <div class="card blog__slide text-center">
                                            <div class="blog__slide__img">
                                                <img class="card-img rounded-0" style="height:180px"
                                                    src="{{ asset('images/blogs/'.$blog->image) }}" alt="">
                                            </div>
                                            <div class="blog__slide__content">
                                                <a class="blog__slide__label" href="#">{{ $blog->name }}</a>
                                                <h3><a href="#">{{ $blog->title }}</a>
                                                </h3>
                                                <p>{{ $blog->created_at->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev">
                            <div class="blog-slider__leftArrow"><img  src="img/home/right-arrow.png"></div>
                        </button><button type="button" role="presentation" class="owl-next">
                            <div class="blog-slider__rightArrow"><img src="img/home/right-arrow.png"></div>
                        </button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </section>
        @endif
        <!--================ Blog slider end =================-->

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if (isset($blogs) && count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <div class="single-recent-blog-post">
                                    <div class="thumb">
                                        <img class="img-fluid" style="width:600px;height:300px;"
                                            src="{{ asset('images/blogs/' . $blog->image) }}" alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                            <li><a href="#"><i
                                                        class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a>
                                            </li>
                                            <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                            <h3>{{ $blog->name }}</h3>
                                        </a>
                                        <p class="tag-list-inline">blogegory:
                                            <a href="#"> <span style="color:blue">{{ $blog->category->name }}</span>
                                        </p>
                                        <p> {{ $blog->desc }}</p>
                                        <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                               {{ $blogs->render("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                    <!-- Start Blog Post Siddebar -->
                    <div class="col-lg-4 sidebar-widgets">
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget newsletter-widget">
                                <h4 class="single-sidebar-widget__title">Newsletter</h4>
                                <div class="form-group mt-30">
                                    <div class="col-autos">
                                        <input type="text" class="form-control" id="inlineFormInputGroup"
                                            placeholder="Enter email" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email'">
                                    </div>
                                </div>
                                <button class="bbtns d-block mt-20 w-100">Subcribe</button>
                            </div>

                            @include('website.layouts.sidebar')
                        </div>
                    </div>
                </div>
                <!-- End Blog Post Siddebar -->
            </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>





@endsection
