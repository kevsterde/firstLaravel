<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //

    public function store()
    {


        request()->validate([
            'idea' => 'required|min:5|max:250',
        ]);

        $content = request()->get("idea", null);

        $idea = Idea::create([
            'name' => "Kevin",
            "content" => $content,
        ]);


        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea Created Successfully");
    }

    public function destroy($id)
    {
        $idea = Idea::where("id", $id)->firstOrFail();

        $idea->delete();

        return redirect()->route("dashboard")->with("deleted", "Idea Deleted Successfully");
    }
}
