<?php

namespace Pylon\Traits\Rules;

trait Searchable{

    protected $searchables = [ 
        "search" => "sometimes|string",
        "searchBy" => "sometimes|string",
    ];
}