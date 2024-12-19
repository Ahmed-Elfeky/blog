@extends('website.layouts.master')
@section('title', 'Blog')
@section('category-active', 'active')
@section('contact')

<!--================ Hero sm Banner start =================-->
@include('website.layouts.hero', ['title' => $category->name .' '.'category'])

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
                                <img class="card-img" src="{{ asset('images/blogs/'.$blog->image) }}">
                                <ul class="thumb-info">
                                    <li><a href="{{ route('blogs.show',['blog'=>$blog]) }}"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                    <li><a href="#"><i class="ti-themify-favicon"></i>{{ $blog->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="blog-single.html">
                                    <h3>{{ $blog->name }}</h3>
                                </a>
                                <p>{{ $blog->desc }}</p>
                                <a class="button" href="{{ route('blogs.show',['blog'=>$blog]) }}">Read More <i class="ti-arrow-right"></i></a>
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
                    
                    @include('website.layouts.sidebar')

                </div>
            </div>
        </div>
        <!-- End Blog Post Siddebar -->
    </div>
</section>
<!--================ End Blog Post Area =================-->



@endsection
