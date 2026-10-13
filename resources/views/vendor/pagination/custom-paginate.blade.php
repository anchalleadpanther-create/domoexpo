@if ($paginator->hasPages())
  <nav aria-label="..." class="overflow-auto">
    <ul class="pagination">
      <li class="page-item p-0 @if ($paginator->onFirstPage()) disabled @endif">
        <a class="page-link py-2" @if ($paginator->onFirstPage()) href="javascript:;" @else href="{{ $paginator->previousPageUrl() }}" @endif tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      @foreach ($elements as $element)
        @if (is_string($element))
          <li class="page-item p-0 disabled"><a class="page-link py-2" href="javascript:;">{{ $element }}</a></li>
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="page-item p-0 active"><a class="page-link py-2 " href="javascript:;">{{ $page }}</a></li>
            @else
              <li class="page-item p-0"><a class="page-link py-2" href="{{ $url }}">{{ $page }}</a></li>

            @endif
          @endforeach
        @endif
      @endforeach
      @if ($paginator->hasMorePages())
        <li class="page-item p-0">
          <a class="page-link py-2" href="{{ $paginator->nextPageUrl() }}">Next</a>
        </li>
      @else
      <li class="page-item p-0 disabled">
        <a class="page-link py-2" href="javascript:;">Next</a>
      </li>
      @endif
    </ul>
  </nav>
  @endif
