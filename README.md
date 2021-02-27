# Laravel Pylon

- A collection of functions to assist with the needs in developing laravel project.

## Installation

```bash
composer required kyrax324/laravel-pylon
```

## Usages

- [Pylon\Traits\Models\HasSoftDeletesActivity](#pylontraitsmodelshassoftdeletesactivity)
- [Pylon\Traits\Responses\ApiResponser](#pylontraitsresponsesapiresponser)
- [Pylon\Traits\Rules\Queryable](#pylontraitsrulesqueryable)

### #Pylon\Traits\Models\HasSoftDeletesActivity;

- provide eloquent functions working with softdelete traits.

**1. whereActivity()**

Example: 

\* [by refering laravel soft-delete:](https://laravel.com/docs/8.x/eloquent#soft-deleting) 

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pylon\Traits\Models\HasSoftDeletesActivity;

class Flight extends Model
{
    use SoftDeletes, HasSoftDeletesActivity;
}
```

-> return either onlyTrashed() or withTrashed().

```php
    /**
    *   value :
    *   0 - onlyTrashed 
    *   2 - withTrashed
    *   else - (default - only active)
    */
    $fight = Flight::query();
	$fight->whereActivity($value);
    // ...
```

**2. toggleActivity()**

-> return restore() or delete().

```php
    $fightUser::withTrashed()->find(1);

    $fight->toggleActivity();
```

### #Pylon\Traits\Responses\ApiResponser;

- provide three methods:
	- successResponse - return success api response
	- errorResponse - return error api response
	- exceptionCatcher - try to handle exception->code == 400 (by returning errorResponse with the exception->message)

### #Pylon\Traits\Rules\Queryable;

provide a set of rules:

- pagables :
	- "page" => "sometimes|integer"
	- "itemPerPage" => "sometimes|integer"
- sortables :
	- 'sortBy' => 'sometimes|string'
	- 'sortDesc' => 'sometimes|boolean'
- searchables :
    - "search" => "sometimes|string"
    - "searchBy" => "sometimes|string"

Example:

```php
class SomeRequest extends FormRequest
{
    use Queryable;

    public function rules()
    {
        return array_merge([
        		// some rules
            ],
            $this->pageables,
            $this->sortables,
            $this->searchables,
        );
    }

```