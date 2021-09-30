<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Requests\Request;

class OrderController extends BaseApiController
{
    protected $model = Order::class;

    /**
     * The relations that are always included together with a resource.
     *
     * @return array
     */
    public function alwaysIncludes(): array
    {
        return [
            'service.category',
            'comments',
            'location'
        ];
    }

    protected function filterByOwnership(Request $request, Builder $query)
    {
        $query->where('user_id', $request->user()->id);
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        return parent::buildIndexFetchQuery($request, $requestedRelations);
    }    
}
