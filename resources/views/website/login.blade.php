@extends('website.layouts.master')
@section('title','Blog/login')
@section('contact')
@include('website.layouts.hero',['title'=>'login'])

<!-- ================ contact section start ================= -->
<div class="row">
    <div class="col-6">
        <form action="{{ route('Login.store') }}" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <input class="form-control" name="email" type="email" placeholder="Enter email address">
            </div>
            <div class="form-group">
                <input class="form-control" name="password" type="password" placeholder="Enter your password">
            </div>
            <div class="form-group text-center text-md-right mt-3">
                <button type="submit" class="button button--active button-contactForm">Send</button>
            </div>
        </form>
    </div>
</div>
</section>
<!-- ================ contact section end ================= -->


@endsection
