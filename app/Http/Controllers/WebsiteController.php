<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{


    public function index()
    {
        $blogs = Blog::paginate(3);
        return view('website.index', compact('blogs'));
    }
    public function category($id)
    {
        $blogs = Blog::where('category_id', $id)->paginate(3);
        $category = Category::find($id);
        return view('website.category', compact('blogs','category'));
    }

    public function contact()
    {
        return view('website.contact');
    }
    public function MyBlog()
    {
        $blogs = Blog::where('user_id',auth()->id())->get();
        return view('website.blogs.myblog',compact('blogs'));
    }

    // public function blogDetailes($id)
    // {
    //     $blog = Blog::find($id);

    //     return view('website.blogs.details', compact('blog'));
    // }
}
