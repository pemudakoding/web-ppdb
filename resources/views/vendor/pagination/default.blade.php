@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled" aria-label="@lang('pagination.previous')">
            <span class="page-link " aria-hidden="true">&larr;</span>
        </li>
    @else
        <li class="paginate_button page-item previous">
            <a href="{{ $paginator->previousPageUrl() }}"
            aria-controls="dataTableHover" data-dt-idx="0" tabindex="0" class="page-link">&larr;</a>
        </li>
    @endif

    {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li aria-disabled="true" class="paginate_button page-item">
                <span class="page-link">{{ $element }}</span>
            </li>
            @endif

        {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button page-item active">
                            <span  class="page-link">{{$page}}</span>
                        </li>
                    @else
                        <li class="paginate_button page-item ">
                            <a href="{{ $url }}" class="page-link"
                                aria-label="@lang('pagination.goto_page', ['page' => $page])">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="paginate_button page-item next">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="page-link" aria-label="@lang('pagination.next')">
                &rarr;
            </a>
        </li>
        @else
        <li class="paginate_button page-item next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">&rarr;</span>
        </li>
        @endif

</ul>
@endif

