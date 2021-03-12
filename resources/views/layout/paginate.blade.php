@if ($paginator->lastPage() > 1)
<nav aria-label="Paginate navigation">
<ul class="pagination justify-content-center">
{{-- Previous Page Link --}}
@if ($paginator->onFirstPage())
<li class="page-item disabled">
<span class="page-link" >&laquo;</span>
</li>
@else
<li class="page-item">
<a href="{{ $paginator->previousPageUrl() }}" class="page-link">&laquo;</a>
</li>
@endif
@for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
    <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
    </li>
@endfor
{{-- Next Page Link --}}
@if ($paginator->hasMorePages())
<li class="page-item">
<a href="{{ $paginator->nextPageUrl() }}" class="page-link">&raquo;</a>
</li>
@else
<li class="page-item disabled">
<span class="page-link">&raquo;</span>
</li>
@endif
</ul>
</nav>
@endif