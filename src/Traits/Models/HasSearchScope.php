<?php

namespace Pylon\Traits\Models;

trait HasSearchScope{

	/**
	 * Scope a query to search related records. ( unordered string )
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @param  string  $column
	 * @param  string  $value
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeSearch($query, $column, $value)
	{
		$keywords = explode(" ",$value);

		return $query->where( function($q) use ($column, $keywords){
			foreach ($keywords as $keyword) {
				$q->where($column, 'like', "%".$keyword."%");
			}
		});
	}
}