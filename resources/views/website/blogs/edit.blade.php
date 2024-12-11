@extends('website.layouts.master')
@section('title','Blogs/edit')
@section('contact')
@include('website.layouts.hero',['title'=>'Edit blog'])
<!-- ================ contact section start ================= -->
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('blogs.update',$blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <span>The name blog</span>
                <input class="form-control" value="{{ $blog->name }}" name="name" type="text" placeholder="Enter name blog">
                @error('name')
                <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <span>The description blog</span>
                <input class="form-control" value="{{ $blog->desc }}" name="desc" type="text" placeholder="Enter description">
                @error('desc')
                <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                @error('image')
                <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>

            @if(isset($categories) && count($categories) > 0 )
            <div class="form-group">
                <label>Select category</label>
                <select name="category_id" class="form-control">
                    <option></option>
                    @foreach ($categories as $category )
                    <option {{ $category->id == 'category_id' ? 'selected': ""  }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
            @endif

            <div class="form-group text-center text-md-right mt-3">
                <button type="submit" class="button button--active button-contactForm">update</button>
            </div>
        </form>
    </div>
</div>
<!-- ================ contact section end ================= -->


@endsection
