@if ($paginator->hasPages())
  <nav aria-label="pagination">
    <ul class="pagination">
      <li title="Previous" class="page-item @if ($paginator->onFirstPage()) disabled @endif">
        <a class="page-link"
          @if ($paginator->onFirstPage()) href="javascript:;" @else href="{{ $paginator->previousPageUrl() }}" @endif
          tabindex="-1"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
      </li>

      @foreach ($elements as $element)
        @if (is_string($element))
          <li class="page-item disabled"><a class="page-link" href="javascript:;">{{ $element }}</a></li>
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="page-item active">
                <a class="page-link" href="javascript:;">{{ $page }}<span
                    class="sr-only">(current)</span></a>
              </li>
            @else
              <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach
      @if ($paginator->hasMorePages())
      <li class="page-item" title="Next">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
      </li>
      @else
      <li class="page-item disabled" title="Next">
        <a class="page-link" href="javascript:;"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
      </li>
      @endif
      
    </ul>
  </nav>
@endif
