<?php

namespace Pylon\Traits\Rules;

trait Queryable{

    protected $pageables = [ 
        "page" => "sometimes|integer",
        "itemsPerPage" => "sometimes|integer",
    ];

    protected $searchables = [ 
        "search" => "sometimes|string",
        "searchBy" => "sometimes|string",
    ];

    protected $sortables = [ 
        'sortBy' => 'sometimes|string',
        'sortDesc' => 'sometimes|nullable|boolean',
    ];
}