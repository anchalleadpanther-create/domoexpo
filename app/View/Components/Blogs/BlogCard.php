<?php

namespace App\View\Components\Blogs;

use Illuminate\View\Component;

class BlogCard extends Component
{
  public object $blog;
  public string $path;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($blog)
  {
    $this->blog = $blog;
    $this->path = asset('uploads/blog') . '/';
  }
  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.blogs.blog-card');
  }
}
