<?php

namespace App\Http\Controllers\Customer\Blog;

use App\Models\Extensions\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
  public function blogListing(){  
      $blogs = Blog::orderbyDesc('id')->where('status', '=', 1)->paginate(15);
      $latestBlogs = Blog::orderbyDesc('id')->where('status', '=', 1)->limit(15)->get();
      return view('purchasync.blogs.blog-listing', compact('blogs','latestBlogs'));
  }
    
    public function blogDetail($blogName, $blogId)
    {
        $blog = Blog::find($blogId);
        // dd($blog);
        $latestBlogs = Blog::orderbyDesc('id')->where('status', '=', 1)->limit(15)->get();
        $relatedBlogs = Blog::where('category_id', $blog->category_id)->where([['id', '!=', $blog->id], ['status', '=', 1]])->limit(50)->get();
        
        $path = Blog::where('category_id', $blog->category_id)->where([['id', '!=', $blog->id], ['status', '=', 1]])->limit(50)->get();
        
        return view('purchasync.blogs.blog-detail', compact('blog', 'path','latestBlogs', 'relatedBlogs'));
    }
}
