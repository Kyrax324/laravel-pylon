<?php

namespace Pylon\Traits\Models;

trait HasSearchScope{

	public function scopeSearch($query, $key, $value = "")
	{   
		$keywords = explode(" ",$value);

		$query->where( function($q) use ($key, $keywords){
			foreach ($keywords as $keyword) {
				$q->where($key, 'like', "%".$keyword."%");
			}
		});
	}
}