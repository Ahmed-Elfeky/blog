@extends('website.layouts.master')
@section('title','Blog-Register')
@section('contact')
@include('website.layouts.hero',['title'=>'Register'])
<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <form action="{{ route('register.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control" name="name" value="{{ old('name') }}" type="text" placeholder="Enter your name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="email" value="{{ old('email') }}" type="email" placeholder="Enter email address">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control border" name="password" type="password" placeholder="Enter password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password_confirmation" type="password" placeholder="Enter password confirmation">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
                <div class="custom-file">
                    <input name="logo" type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose logo</label>
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                </div>
                <div class="form-group text-center mt-3">
                    <a href="{{ route('login') }}" class="mx-3">Alredy register ? </a>
                    <button type="submit" class="button button--active button-contactForm">Send</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
