@extends('website.layouts.master')
@section('title','Blogs/create')
@section('contact')
@include('website.layouts.hero',['title'=>'Add New blog'])
<!-- ================ contact section start ================= -->
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Enter name blog">
                @error('name')
                <span class="text-danger">{{ $message }} </span>
              @enderror
            </div>
            <div class="form-group">
                <input class="form-control" name="desc" type="text" placeholder="the blog description ">
                @error('desc')
                <span class="text-danger">{{ $message }} </span>
              @enderror
            </div>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                @error('image')
                <span class="text-danger">{{ $message }} </span>
              @enderror
            </div>

            @if(count($categories) > 0 )
            <div class="form-group">
                <label>Select category</label>
                <select name="category_id" class="form-control">
                    <option></option>
                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }} </span>
              @enderror
            </div>
            @endif

            <div class="form-group text-center text-md-right mt-3">
                <button type="submit" class="button button--active button-contactForm">Send</button>
            </div>
        </form>
    </div>
</div>
<!-- ================ contact section end ================= -->


@endsection
