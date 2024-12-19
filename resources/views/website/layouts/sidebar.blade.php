@php
    $siebarCategory = App\Models\Category::get();
    $recentBlogs = App\Models\Blog::latest()->take(2)->get();
@endphp


@if (count($siebarCategory) > 0)

    <div class="single-sidebar-widget post-category-widget">
        <h4 class="single-sidebar-widget__title">Catgory</h4>
        <ul class="cat-list mt-20">
            @if (count($siebarCategory) > 0)
                @foreach ($siebarCategory as $category)
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>{{ $category->name }}</p>
                            <p>({{ count($category->blogs) }})</p>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endif

<div class="single-sidebar-widget popular-post-widget">
    <h4 class="single-sidebar-widget__title">Popular blogs</h4>
    <div class="popular-post-list">
        @if (isset($recentBlogs) && count($recentBlogs) > 0)
            @foreach ($recentBlogs as $recentblog)
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('images/blogs/' . $recentblog->image) }}"
                            alt="">
                        <ul class="thumb-info">
                            <li><a href="#">{{ $recentblog->name }}</a></li>
                            <li><a href="#">{{ $recentblog->created_at->format('d M Y') }}</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                            <h6>{{ $recentblog->desc }}</h6>
                        </a>
                    </div>
                </div>
            @endforeach
            @else
            <span class="d-flex justify-content-center" style="color: red"> No Record Found </span>
        @endif
    </div>
</div>


