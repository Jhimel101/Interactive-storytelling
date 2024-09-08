<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Choice;
use App\Models\Insight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChoiceController extends Controller
{
    public function show($storyId)
    {
        $story = Story::with('choices')->findOrFail($storyId);
        return view('user.choices', compact('story'));
    }

    public function select($choiceId)
    {
        $choice = Choice::findOrFail($choiceId);

        Insight::create([
            'story_id' => $choice->story_id,
            'user_id' => Auth::id(),
            'choice_id' => $choiceId,
        ]);

        return redirect()->back()->with('success', 'Choice selected successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'story_id' => 'required|exists:stories,id',
            'content' => 'required|string|max:255',
            'description' => 'nullable|string',
            'next_story_id' => 'nullable|exists:stories,id',
        ]);

        $choice = Choice::create([
            'story_id' => $request->input('story_id'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'next_story_id' => $request->input('next_story_id'),
        ]);

        return redirect()->back()->with('success', 'Choice created successfully.');
    }
}
