@extends('website.layouts.master')
@section('title','Blog-login')
@section('contact')
@include('website.layouts.hero',['title'=>'login'])

<!-- ================ contact section start ================= -->
<div class="container">
<form action="{{ route('login') }}" class="form-contact contact_form" method="post" id="contactForm" novalidate="novalidate">
@csrf

    <div class="form-group">
        <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
    </div>
    <div class="form-group">
        <input class="form-control" name="password" id="name" type="password" placeholder="Enter your password">
    </div>
    <div class="form-group text-center text-md-right mt-3">
        <button type="submit" class="button button--active button-contactForm">Send</button>
    </div>
</form>
</div>
</section>
<!-- ================ contact section end ================= -->


@endsection