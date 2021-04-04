<?php

namespace Pylon\Traits\Models;

trait HasMeta{

	public function getMetaAttribute($value)
	{
		return json_decode($value, true);
	}

	public function setMetaAttribute($value)
	{
		$this->attributes['meta'] = json_encode($value);
	}

}