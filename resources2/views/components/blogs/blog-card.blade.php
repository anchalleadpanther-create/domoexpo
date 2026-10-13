<div class="blogpost-item">
  <a href="javascript:;" class="post-thumb">
    <img class="blur-up lazyload" src="{{ $path }}{{ $blog->image }}"
      data-src="{{ $path }}{{ $blog->image }}" alt="{{ $blog->name }}" title="{{ $blog->name }}" />
  </a>
  <div class="post-detail">
    <h3 class="post-title mb-3"><a href="javascript:;">{{ $blog->name }}</a></h3>
    <ul class="publish-detail d-flex-center mb-3">
      <li class="d-flex align-items-center"><i class="an an-calendar me-2"></i> <span
          class="article__date">{{ $blog->created_at->format('d M, Y') }}</span></li>
      <li class="d-flex align-items-center"><i class="an an-comments-l me-2"></i> <a href="javascript:;"
          class="article-link">1 comment</a></li>
    </ul>
    <p class="exceprt">{{ $blog->short_desc }}</p>

  </div>
</div>
