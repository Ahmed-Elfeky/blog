@extends('website.layouts.master')
@section('title', 'Blog-details')
@section('contact')

    @include('website.layouts.hero', ['title' => $blog->name])

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="assets/img-fluid" width="80%" height="200"
                            src="{{ asset('images/blogs/' . $blog->image) }}" alt=""> <br />
                        <a href="#">
                            <h4>{{ $blog->name }} </h4>
                        </a>
                        <div class="user_details">
                            <div class="float-left">
                                <a href="#">Lifestyle</a>
                                <a href="#">Gadget</a>
                            </div>
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{ $blog->user->name }}</h5>
                                        <p>{{ $blog->created_at }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <img width="42" height="42" src="{{ asset('images/blogs/' . $blog->image) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            {{ $blog->desc }}
                        </p>
                        <div class="news_d_footer flex-column flex-sm-row">
                            <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4
                                people like this</a>
                            <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span
                                    class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>06 Comments</a>
                            <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="navigation-area">
                        <div class="row">
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="#"><img class="assets/img-fluid"
                                            src="{{ asset('assets/img/blog/prev.jpg') }}" alt=""></a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <a href="#">
                                        <h4>A Discount Toner</h4>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Next Post</p>
                                    <a href="#">
                                        <h4>Cartridge Is Better</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                </div>
                                <div class="thumb">
                                    <a href="#"><img class="assets/img-fluid"
                                            src="{{ asset('assets/img/blog/next.jpg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>{{ count($comments) }} Comments</h4>

                        @if (isset($comments) && count($comments) > 0)
                            @foreach ($comments as $comment)
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{ asset('assets/img/blog/c1.jpg') }}" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">{{ $comment->name }}</a></h5>
                                                <p class="date">{{ $comment->created_at->format('d M Y') }} </p>
                                                <p class="comment">
                                                    {{ $comment->message }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <div class="form-group form-inline">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter Name" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Name'">
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter email address" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                    @error('email')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                @error('subject')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <button type="submit" class="button submit_btn">Post Comment</button>
                        </form>
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


                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="single-sidebar-widget__title">Catgory</h4>
                            <ul class="cat-list mt-20">
                                @if (count($categories) > 0 )
                                    @foreach ($categories as $category )
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>{{$category->name}}</p>
                                            <p>({{ count($category->blogs)  }})</p>
                                        </a>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="single-sidebar-widget__title">Popular Post</h4>
                            <div class="popular-post-list">
                                <div class="single-post-list">
                                    <div class="thumb">
                                        <img class="card-img rounded-0" src="assets/img/blog/thumb/thumb1.png"
                                            alt="">
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
                                        <img class="card-img rounded-0" src="assets/img/blog/thumb/thumb2.png"
                                            alt="">
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
                                        <img class="card-img rounded-0" src="assets/img/blog/thumb/thumb3.png"
                                            alt="">
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

                      
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
