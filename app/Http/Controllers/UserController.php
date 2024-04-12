<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $ideas = $user->ideas()->paginate(5);


        return view("users.show", compact("user", 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $this->authorize("update", $user);
        $ideas = $user->ideas()->paginate(5);

        return view("users.edit", compact("user", "ideas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $this->authorize("update", $user);
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable|min:5|max:255',
            'image' => 'image',
        ]);


        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);
        // request()->validate([
        //     'name' => 'required|min:5|max:40',
        //     'bio' => 'required|min:5|max:40',
        // ]);

        // $user->name = request()->get('name', '');
        // $user->bio = request()->get('bio', '');
        // $user->save();
        return redirect()->route('profile');
    }
    public function profile()
    {
        return $this->show(auth()->user());
    }
}
