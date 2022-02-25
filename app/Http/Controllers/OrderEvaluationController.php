<?php

namespace App\Http\Controllers;

use App\Models\OrderEvaluation;

class OrderEvaluationController extends Controller
{
    /**
     * Show a particular order evaluation
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(OrderEvaluation $orderEvaluation, string $hash)
    {
        if ($orderEvaluation->hash != $hash) {
            abort(401);
        }

        $orderEvaluation->load([
            'feedback',
            'order.service',
        ]);

        return view('orderevaluation', [
            'orderEvaluation' => $orderEvaluation
        ]);
    }    
}
