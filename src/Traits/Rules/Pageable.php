<?php

namespace Pylon\Traits\Rules;

trait Pageable{

    protected $pageables = [ 
        "page" => "sometimes|integer",
        "itemsPerPage" => "sometimes|integer",
        'sortBy' => 'sometimes|string',
        'sortDesc' => 'sometimes|nullable|boolean',
    ];
}