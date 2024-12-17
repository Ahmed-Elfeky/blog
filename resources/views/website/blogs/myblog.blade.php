@extends('website.layouts.master')
@section('title','My Blog')
@section('contact')

@include('website.layouts.hero',['title'=>'My Blog'])





<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->name }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                    <td><img class="assets/img-fluid" width="60" height="50" src="{{ asset('images/blogs/'.$blog->image) }}" alt="">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger deleteBlogBtn" data-toggle="modal" data-id="{{ $blog->id }}" data-url="{{ route('blogs.destroy',$blog->id) }}" data-name="{{$blog->name}}" data-target="#deleteBlog"><i class="fas fa-trash"></i></button>
                        <a href="{{ route('blogs.edit',$blog->id) }}" class="btn btn-dark "><i class="fas fa-edit"></i></a>
                    </td>
                 
                </tr>
                @endforeach
                
                
            </tbody>
        </table>
        
        
        

{{-- 
        <div class="row">
            <div class="col-lg-8">





                @if(isset($blogs) && count($blogs) > 0 )
                @foreach ($blogs as $blog)
                <div class="main_blog_details">
                    <img class="assets/img-fluid" width="100" height="80" src="{{ asset('images/blogs/'.$blog->image) }}" alt="">
                    <a href="#">
                        <h4>{{ $blog->name }}</h4>
                    </a>
                    <div class="user_details">
                        <div class="float-left">
                            <a href="{{ route('blogs.edit',$blog->id) }}">تعديل</a>

                            <button type="button" class="btn btn-danger deleteBlogBtn" data-toggle="modal" data-id="{{ $blog->id }}" data-url="{{ route('blogs.destroy',$blog->id) }}" data-name="{{$blog->name}}" data-target="#deleteBlog">حذف</button>

                        </div>
                        <div class="float-right mt-sm-0 mt-3">
                            <div class="media">
                                <div class="media-body">
                                    <h5>{{ $blog->category->name }}</h5>
                                    <p>{{ $blog->created_at->format('d M Y') }}</p>
                                </div>
                                <div class="d-flex">
                                    <img width="42" height="42" src="{{ asset('images/blogs/'.$blog->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div> --}}
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="deleteBlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" id="form_id" method="POST">
            @method('delete')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure delete blog ?
                    <input type="hidden" id="blog_id" value="" name="blog_id">
                    <input type="text" class="form-control" id="name" value="" name="name">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">تأكيد الحذف </button>
                    <button type="button" class="btn btn-primary btn-cancel">الفاء </button>
                </div>
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#deleteBlog').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            // var blog = button.data('id');
            var name = button.data('name');
            var url = button.data('url');
            console.log(url);
            var modal = $(this);
            // modal.find('.modal-body #blog_id').val(blog);
            modal.find('.modal-body #name').val(name);
            document.getElementById("form_id").action = url;
        });
        $('.btn-cancel').on('click', function(event) {
            $('#deleteBlog').modal('hide');
        });
    });

</script>
@endsection
@endsection
