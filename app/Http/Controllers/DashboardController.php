<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    function index()
    {
        $idea = Idea::orderBy('created_at', 'desc');
        // $idea = Idea::without('user')->orderBy('created_at', 'desc');
        // $idea = Idea::with('user', 'comments.user')->orderBy('created_at', 'desc');


        if (request()->has("search")) {
            $idea = $idea->where("content", 'like', '%' . request()->get('search') . '%');
        }

        return view(
            "dashboard",
            ['ideas' => $idea->paginate('5')]
        );
    }
}
