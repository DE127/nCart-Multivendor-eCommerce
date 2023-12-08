<div class="col-12 mt_25">
        <nav aria-label="Page navigation example">
            <ul class="pagination">

                @if ($paginator->onFirstPage())

                @else
                    <div class="posts-view__pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link page-link--with-arrow" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif

                @foreach ($elements as $element)
                    @if (count($element) < 2)

                    @else
                        @foreach ($element as $key => $el)
                            @if ($key == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link" href="javascript::void()">{{ $key }} <span class="sr-only">(current)</span></a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $el }}">{{ $key }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link page-link--with-arrow" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <i class="far fa-angle-right"></i>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
</div>
