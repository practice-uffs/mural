<?php

namespace App\Http\Controllers\API;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Requests\Request;

class IdeaController extends BaseApiController
{
    protected $model = Idea::class;

    /**
     * The relations that are always included together with a resource.
     *
     * @return array
     */
    public function alwaysIncludes(): array
    {
        return [
            'user',
        ];
    }

    protected function filterByOwnership(Request $request, Builder $query)
    {
        // 
    }
}
