<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoryController extends Controller
{
    use AuthorizesRequests;

    public function dashboard()
    {
        if (Auth::user()->role === 'author') {
            $this->authorize('viewDashboard', Story::class);

            $stories = Story::where('author_id', Auth::id())->with('choices.insights')->get();

            return view('dashboard', compact('stories'));
        } else {
            // Regular users: Get all available stories
            $stories = Story::with('choices')->get();

            return view('user.dashboard', compact('stories'));
        }
    }

    public function create()
    {
        // Only authors can create a story
        $this->authorize('createStory', Story::class);

        return view('author.create-story');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'choices' => 'required|array',
            'choices.*' => 'required|string|max:255',
            'descriptions' => 'nullable|array',
            'descriptions.*' => 'nullable|string',
        ]);

        $story = Story::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => Auth::id(),
        ]);

        if (!empty($request->choices)) {
            foreach ($request->choices as $index => $content) {
                $description = isset($request->descriptions[$index]) ? $request->descriptions[$index] : null;

                Choice::create([
                    'story_id' => $story->id,
                    'content' => $content,
                    'description' => $description,
                ]);
            }
        }

        return redirect()->route('author.dashboard')->with('success', 'Story created successfully.');
    }

    public function show($storyId)
    {
        $story = Story::with('choices')->findOrFail($storyId);

        return view('user.show-story', compact('story'));
    }
}
