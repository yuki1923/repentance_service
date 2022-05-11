@if ($paginator->hasPages())
    <nav class="col-md-4 mx-auto d-flex justify-content-center">
        <ul class="pagination" role="navigation">
            <!-- 最初のページへのリンク -->
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url(1) }}">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- 前のページへのリンク -->
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>
            {{-- Pagination Elemnts --}}
            {{-- Array Of Links --}}
            {{-- 定数よりもページ数が多い時 --}}
            @if ($paginator->lastPage() > config('const.PAGINATE.LINK_NUM'))

                {{-- 現在ページが表示するリンクの中心位置よりも左の時 --}}
                @if ($paginator->currentPage() <= floor(config('const.PAGINATE.LINK_NUM') / 2))
                    <?php $startPage = 1; //最初のページ
                    ?> <?php $endPage = config('const.PAGINATE.LINK_NUM'); ?> {{-- 現在ページが表示するリンクの中心位置よりも右の時 --}}
                @elseif ($paginator->currentPage() > $paginator->lastPage() - floor(config('const.PAGINATE.LINK_NUM') / 2))
                    <?php $startPage = $paginator->lastPage() - (config('const.PAGINATE.LINK_NUM') - 1); ?>
                    <?php $endPage = $paginator->lastPage(); ?>
                    {{-- 現在ページが表示するリンクの中心位置の時 --}}
                @else
                    <?php $startPage = $paginator->currentPage() - floor((config('const.PAGINATE.LINK_NUM') % 2 == 0 ? config('const.PAGINATE.LINK_NUM') - 1 : config('const.PAGINATE.LINK_NUM')) / 2); ?>
                    <?php $endPage = $paginator->currentPage() + floor(config('const.PAGINATE.LINK_NUM') / 2); ?>
                @endif
                {{-- 定数よりもページ数が少ない時 --}}
            @else
                <?php $startPage = 1; ?>
                <?php $endPage = $paginator->lastPage(); ?>
            @endif

            {{-- 処理部分 --}}
            @for ($i = $startPage; $i <= $endPage; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link"
                            href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            {{-- 後のページへのリンク --}}
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    <span aria-hidden="true">&rsaquo;</span>
                </a>
            </li>
            {{-- 最後のページへのリンク --}}
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endif
