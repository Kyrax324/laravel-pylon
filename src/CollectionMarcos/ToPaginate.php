<?php

namespace Pylon\CollectionMarcos;

use Illuminate\Pagination\LengthAwarePaginator;

class ToPaginate
{
	public function __invoke()
	{
		return function ($perPage = null, $total = null, $page = null, $pageName = 'page'){

			$perPage = $perPage ?: 15;

			$page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

			$total = $total ?: $this->count();

			$results = $this->forPage($page, $perPage)->values();

			return new LengthAwarePaginator($results, $total, $perPage, $page, [
				'path' => LengthAwarePaginator::resolveCurrentPath(),
				'pageName' => $pageName,
			]);
		};
	}
}