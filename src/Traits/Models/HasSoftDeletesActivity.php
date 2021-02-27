<?php

namespace Pylon\Traits\Models;

trait HasSoftDeletesActivity{

	public function scopeWhereActivity($query, $value = 1)
	{	
		switch ($value) {
			case 0: // 0+0
				$query->onlyTrashed();
				break;
			
			case 2: // 1+1
				$query->withTrashed();
				break;

			default: // 0+1
				// by default, only show is_deleted = null
				break;
		}
	}

	public function toggleActivity()
	{
		if($this->trashed()){
			return $this->restore();
		}else{
			return $this->delete();
		}
	}
}