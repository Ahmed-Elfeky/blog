@extends('website.layouts.master')
@section('title', 'Blog')
@section('category-active', 'active')
@section('contact')

<!--================ Hero sm Banner start =================-->
@include('website.layouts.hero', ['title' => 'Category Page'])

<!--================ Hero sm Banner end =================-->
@php
$categories = App\Models\Category::get();
@endphp
<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                    <div class="col-md-6">

                        @if(isset($blogs) && count($blogs) > 0)
                        @foreach ($blogs as $blog )
                        <div class="single-recent-blog-post card-view">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="{{ asset('images/blogs/'.$blog->image) }}" alt="">
                                <ul class="thumb-info">
                                    <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                    <li><a href="#"><i class="ti-themify-favicon"></i>{{ $blog->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="blog-single.html">
                                    <h3>{{ $blog->name }}</h3>
                                </a>
                                <p>{{ $blog->desc }}</p>
                                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>





                <div class="row">
                    <div class="col-lg-12">
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <i class="ti-angle-left"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <i class="ti-angle-right"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                            </div>
                        </div>
                        <button class="bbtns d-block mt-20 w-100">Subcribe</button>
                    </div>


                    <div class="single-sidebar-widget post-category-widget">
                        <h4 class="single-sidebar-widget__title">Catgory</h4>
                        @if ($categories->count() > 0)

                        @foreach ($categories as $category)
                        <ul class="cat-list mt-20">
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>{{ $category->name }}</p>
                                    <p>(03)</p>
                                </a>
                            </li>

                        </ul>
                        @endforeach

                        @endif
                    </div>

                    <div class="single-sidebar-widget popular-post-widget">
                        <h4 class="single-sidebar-widget__title">Popular Post</h4>
                        <div class="popular-post-list">
                            <div class="single-post-list">
                                <div class="thumb">
                                    <img class="card-img rounded-0" src="img/blog/thumb/thumb1.png" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#">Adam Colinge</a></li>
                                        <li><a href="#">Dec 15</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h6>Accused of assaulting flight attendant miktake alaways</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="single-post-list">
                                <div class="thumb">
                                    <img class="card-img rounded-0" src="img/blog/thumb/thumb2.png" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#">Adam Colinge</a></li>
                                        <li><a href="#">Dec 15</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h6>Tennessee outback steakhouse the
                                            worker diagnosed</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="single-post-list">
                                <div class="thumb">
                                    <img class="card-img rounded-0" src="img/blog/thumb/thumb3.png" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#">Adam Colinge</a></li>
                                        <li><a href="#">Dec 15</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h6>Tennessee outback steakhouse the
                                            worker diagnosed</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar-widget tag_cloud_widget">
                        <h4 class="single-sidebar-widget__title">Popular Post</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">software</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Post Siddebar -->
    </div>
</section>
<!--================ End Blog Post Area =================-->



@endsection
