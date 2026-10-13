<?php

namespace App\Http\Controllers\Customer\Blog;

use App\Models\Extensions\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
  public function blogDetail($blogName, $blogId)
  {
    $blog = Blog::find($blogId);
    $latestBlogs = Blog::orderbyDesc('id')->where('status', '=', 1)->limit(3)->get();
    $relatedBlogs = Blog::where('category_id', $blog->category_id)->where([['id', '!=', $blog->id], ['status', '=', 1]])->limit(50)->get();
    return view('customer.blogs.blog-detail', compact('blog', 'latestBlogs', 'relatedBlogs'));
  }
}
