@if ($paginator->hasPages())
<nav class="navigation align-center">
  {{-- Pagination Elements --}}
  @foreach ($elements as $element)
    {{-- Array Of Links --}}
    @if (is_array($element))
      @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
          <a href="{{$url}}" class="page-numbers bg-border-color current">
            <span>{{$page}}</span>
          </a>
        @else
          <a href="{{$url}}" class="page-numbers bg-border-color">
            <span>{{$page}}</span>
          </a>
        @endif
      @endforeach
    @endif
  @endforeach
  <svg class="btn-prev">
    <use xlink:href="#arrow-left"></use>
  </svg>
  <svg class="btn-next">
    <use xlink:href="#arrow-right"></use>
  </svg>
</nav>
@endif
