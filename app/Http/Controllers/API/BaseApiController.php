<?php

namespace App\Http\Controllers\API;

use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class BaseApiController extends Controller
{
    /**
     * Authorize a given action for the current user.
     *
     * @param  mixed  $ability
     * @param  mixed|array  $arguments
     * @return \Illuminate\Auth\Access\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function authorize($ability, $arguments = [])
    {
        // TODO: ajustar isso no futuro para permitir acesso pontual
        return Response::allow();
    }

    /**
     * Runs the given query for fetching entities in index method.
     *
     * @param Request $request
     * @param Builder $query
     * @param int $paginationLimit
     * @return Paginator|Collection
     */
    protected function runIndexFetchQuery(Request $request, Builder $query, int $paginationLimit)
    {
        $this->filterByOwnership($request, $query);
        return parent::runIndexFetchQuery($request, $query, $paginationLimit);
    }

    /**
     * Executado antes da busca por todos os registros (index). Classes filhas
     * podem sobreescrever este método para aplicar filtros de busca.
     */
    protected function filterByOwnership(Request $request, Builder $query)
    {
        // 
    }
}
