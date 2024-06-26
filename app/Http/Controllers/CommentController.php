<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(Idea $idea)
    {
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->user()->id;
        $validated = request()->validate([
            'comment' => 'required|min:5|max:250',
        ]);
        $comment->content = $validated["comment"];
        $comment->save();


        // $validated = request()->validate([
        //     'content' => 'required|min:5|max:250',
        // ]);
        /*    $content = request()->get("content");
        $comment = Comment::create([
            "idea_id" => $idea->id,
            "content" => $content,
        ]);

        $comment->save(); */

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Comment Successfully');
    }
}
