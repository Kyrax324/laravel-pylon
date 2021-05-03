<?php

namespace Pylon\CollectionMarcos;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginate
{
	public function __invoke()
	{
		return function ($perPage = 15, $total = null, $page = null, $pageName = 'page'){

			$page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

			$total = $this->count();

			$results = $this->forPage($page, $perPage)->values();

			return new LengthAwarePaginator($results, $total, $perPage, $page, [
				'path' => LengthAwarePaginator::resolveCurrentPath(),
				'pageName' => $pageName,
			]);
		};
	}
}