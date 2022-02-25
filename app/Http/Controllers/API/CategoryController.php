<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Requests\Request;

class CategoryController extends BaseApiController
{
    protected $model = Category::class;

    /**
     * The relations that are always included together with a resource.
     *
     * @return array
     */
    public function alwaysIncludes(): array
    {
        return [];
    }

    protected function filterByOwnership(Request $request, Builder $query)
    {
        // 
    }
}
