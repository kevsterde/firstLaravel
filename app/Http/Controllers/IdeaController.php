<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //


    public function store(IdeaRequest $request)
    {


        $validated = $request->validated();

        // $content = request()->all();

        // $validated['user_id'] = auth()->id();

        $idea = Idea::create([
            'user_id' => auth()->id(),
            "content" => $validated["content"],
        ]);


        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea Created Successfully");
    }

    public function destroy(Idea $idea)
    {

        $this->authorize("delete", $idea);
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

        $this->authorize("update", $idea);
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }
        $editing = true;
        return view("idea.show", compact("idea", 'editing'));
    }

    public function update(IdeaRequest $request, Idea $idea)
    {

        $this->authorize("update", $idea);
        // request()->validate([
        //     'content' => 'required|min:5|max:250',
        // ]);
        $validated = $request->validated();
        $idea->content =  $validated["content"];
        // $idea->content = $request->validated()->get("content", '');
        $idea->save();

        return redirect()->route("ideas.show", $idea->id)->with('success', 'Updated Successfully');
    }
}
