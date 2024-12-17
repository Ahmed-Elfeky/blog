<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }

    public function index()
    {

        $blogs = Blog::all();
        return view('website.index', compact('blogs'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('website.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $attributes = $request->all();
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $attributes['image'] = $imageName;
        }
        $attributes['user_id'] = Auth::user()->id;
        Blog::create($attributes);
        return redirect()->route('blogs.index');
    }

public function show(Blog $blog){
    $comments  = Comment::all();
// dd($comments);
    return view('website.blogs.details', compact('blog','comments'));

}

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('website.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request,  $id)
    {
        $blog = Blog::find($id);
        $attributes = $request->all();

        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/blogs/' . $blog->image))) {
                File::delete(public_path('images/blogs/' . $blog->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $attributes['image'] = $imageName;
        }
        $blog->update($attributes);
        return redirect()->route('website.MyBlog')->with('message', 'تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $blog = Blog::find($id);
        if (File::exists(public_path('images/blogs/' . $blog->image))) {
            File::delete(public_path('images/blogs/' . $blog->image));
        }
        $blog->delete();
        return redirect()->route('website.MyBlog');

    }
    
}
