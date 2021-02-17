# Laravel Pylon

- A collection of functions to assist with the needs in developing laravel project (in 'Project Pylon')

## Installation

```bash
composer required kyrax324/laravel-pylon
```

## Usages

### #Pylon\Traits\Models\HasActivityScope;

- provide an eloquent scope whereActivity() working with softdelete traits.

Example:

- [refering laravel soft-delete](https://laravel.com/docs/8.x/eloquent#soft-deleting) 

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pylon\Traits\Models\HasActivityScope;

class Flight extends Model
{
    use SoftDeletes, HasActivityScope;
}
```

- querying

```php
	/*
		value :
		0 - onlyTrashed 
		2 - withTrashed
		else - (default - only active)
	*/
	$fight->whereActivity($value);
```


### #Pylon\Traits\Rules\Responses;

- provide three methods:
	- successResponse - return success api response
	- errorResponse - return error api response
	- exceptionCatcher - try to handle exception->code == 400 (by returning errorResponse with the exception->message)

### #Pylon\Traits\Rules\Pageable;

- provide a set of rules:
	- "page" => "sometimes|integer"
	- "itemPerPage" => "sometimes|integer"
	- 'sortBy' => 'sometimes|string'
	- 'sortDesc' => 'sometimes|boolean'

Example:

```php
class SomeRequest extends FormRequest
{
    use Pageable;

    public function rules()
    {
        return array_merge([
        		// some rules
            ],
            $this->pageables,
        );
    }

```

### #Pylon\Traits\Rules\Searchable;

- provide a set of rules:
	- "search" => "sometimes|string"
	- "searchBy" => "sometimes|string"

Example:

```php
class SomeRequest extends FormRequest
{
    use Searchable;

    public function rules()
    {
        return array_merge([
        		// some rules
            ],
            $this->searchables,
        );
    }

```