<?php

declare(strict_types=1);

namespace App\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Override;

//use Illuminate\Pagination\UrlWindow;

class PaginationResource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        /** @var LengthAwarePaginator $paginate */
        $paginate = $this->resource;
        $paginate->onEachSide(1);

        return [
            'currentPage' => $paginate->currentPage(),
            'firstPage' => 1,
            'from' => $paginate->firstItem(),
            'lastPage' => $paginate->lastPage(),
            'nextPage' => $this->nextPage($paginate),
            'perPage' => $paginate->perPage(),
            'prevPage' => $this->previousPage($paginate),
            'to' => $paginate->lastItem(),
            'total' => $paginate->total(),
            //'links' => $this->linkCollection($paginate),
        ];
    }

    private function previousPage(LengthAwarePaginator $paginate): ?int
    {
        return $paginate->currentPage() > 1 ? $paginate->currentPage() - 1 : null;
    }

    private function nextPage(LengthAwarePaginator $paginate): ?int
    {
        return $paginate->hasMorePages() ? $paginate->currentPage() + 1 : null;
    }

    //private function linkCollection(LengthAwarePaginator $paginate): array
    //{
    //    return collect($this->elements($paginate))->flatMap(function ($item) use ($paginate) {
    //        if (!is_array($item)) {
    //            return [['page' => null, 'label' => '...', 'isActive' => false]];
    //        }
    //
    //        return collect($item)->map(function ($url, $page) use ($paginate) {
    //            return [
    //                'page' => $page,
    //                'label' => (string) $page,
    //                'isActive' => $paginate->currentPage() === $page,
    //            ];
    //        });
    //    })->values()->toArray();
    //}

    //private function elements(LengthAwarePaginator $paginate)
    //{
    //    $window = UrlWindow::make($paginate);
    //
    //    return array_filter([
    //        $window['first'],
    //        is_array($window['slider']) ? '...' : null,
    //        $window['slider'],
    //        is_array($window['last']) ? '...' : null,
    //        $window['last'],
    //    ]);
    //}
}
