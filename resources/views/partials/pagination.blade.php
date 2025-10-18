@if ($paginator->hasPages())
    <nav style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center; justify-content: center; margin-top: 2rem;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="padding: 0.6rem 1.1rem; border-radius: 12px; background: #e2e8f0; color: #94a3b8;">‹</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="padding: 0.6rem 1.1rem; border-radius: 12px; background: #1d4ed8; color: white; text-decoration: none;">‹</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span style="padding: 0.6rem 1.1rem; border-radius: 12px; background: #e2e8f0; color: #64748b;">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding: 0.6rem 1.1rem; border-radius: 12px; background: #1d4ed8; color: white; font-weight: 600;">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" style="padding: 0.6rem 1.1rem; border-radius: 12px; background: white; color: #1f2937; border: 1px solid #cbd5f5; text-decoration: none;">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="padding: 0.6rem 1.1rem; border-radius: 12px; background: #1d4ed8; color: white; text-decoration: none;">›</a>
        @else
            <span style="padding: 0.6rem 1.1rem; border-radius: 12px; background: #e2e8f0; color: #94a3b8;">›</span>
        @endif
    </nav>
@endif
