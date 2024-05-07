<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    //

    function index()
    {


        File::link(
            storage_path('app/public'),
            public_path('storage')
        );


        $idea = Idea::orderBy('created_at', 'desc');
        // $idea = Idea::with('user')->orderBy('created_at', 'desc');
        // $idea = Idea::with('user', 'comments.user')->orderBy('created_at', 'desc');

        // sample
        if (request()->has("search")) {
            $idea = $idea->where("content", 'like', '%' . request()->get('search') . '%');
        }

        return view(
            "dashboard",
            ['ideas' => $idea->paginate('5')]
        );
    }
}
