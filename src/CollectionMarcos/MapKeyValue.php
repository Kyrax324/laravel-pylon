<?php

namespace Pylon\CollectionMarcos;

class MapKeyValue
{
	public function __invoke()
	{
		return function ($keyName = "key", $valueName = "value"){
			return $this->map(function($item,$key) use ($keyName, $valueName){
				return [
					$keyName => $key,
					$valueName => $item
				];
			});
		};
	}
}