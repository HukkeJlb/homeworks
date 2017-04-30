@if ($paginator->hasPages())
    <ul class="page-nav">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-nav__item disabled"><i class="fa fa-angle-double-left"></i></li>
        @else
            <li  class="page-nav__item"><a href="{{ $paginator->previousPageUrl() }}" class="page-nav__item__link" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-nav__item disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-nav__item active"><span class="page-nav__item__active">{{ $page }}</span></li>
                    @else
                        <li class="page-nav__item"><a href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-nav__item"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-double-right"></i></a></li>
        @else
            <li class="page-nav__item disabled"><i class="fa fa-angle-double-right"></i></li>
        @endif
    </ul>
@endif
