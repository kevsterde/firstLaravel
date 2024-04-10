<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //


    public function store()
    {


        $validated = request()->validate([
            'content' => 'required|min:5|max:250',
        ]);

        // $content = request()->all();


        $idea = Idea::create([
            'user_id' => auth()->id(),
            "content" => $validated["content"],
        ]);


        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea Created Successfully");
    }

    public function destroy(Idea $idea)
    {

        $this->authorize("idea.delete", $idea);
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }
        /* $idea = Idea::where("id", $id)->firstOrFail()->delete();
        or
        */
        $idea->delete();

        return redirect()->route("dashboard")->with("success", "Idea Deleted Successfully");
    }

    public function show(Idea $idea)
    {


        /*   return view("idea.show", [
            "idea" => $idea,
        ]); */
        return view("idea.show", compact("idea"));
    }

    public function edit(Idea $idea)
    {

        $this->authorize("idea.edit", $idea);
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }
        $editing = true;
        return view("idea.show", compact("idea", 'editing'));
    }

    public function update(Idea $idea)
    {

        $this->authorize("idea.update", $idea);
        request()->validate([
            'content' => 'required|min:5|max:250',
        ]);

        $idea->content = request()->get("content", '');
        $idea->save();

        return redirect()->route("ideas.show", $idea->id)->with('success', 'Updated Successfully');
    }
}
