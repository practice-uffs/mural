<?php

namespace App\Http\Controllers;

use App\Model\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Show the idea page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // TODO: filtrar visiveis e dados dos usuarios
        $ideas = Idea::with('user')->limit(15)->get();
        $picks = $ideas->random(count($ideas));
        $groups = [];

        for($i = 0; $i < 3; $i++) {
            $groups[] = $picks->splice(0, 4);
        }

        return view('ideas', [
            'groups' => $groups
        ]);
    }
}
