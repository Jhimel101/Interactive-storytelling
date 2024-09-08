<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Models\Choice;
use App\Models\story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InsightController extends Controller
{
    public function store(Request $request, $choiceId)
    {
        $choice = Choice::findOrFail($choiceId);

        $timeSpent = $request->input('time_spent', 0);

        Insight::create([
            'story_id' => $choice->story_id,
            'user_id' => Auth::id(),
            'choice_id' => $choice->id,
            'time_spent' => $timeSpent,
        ]);

        return redirect()->route('choices.show', $choice->story_id)
            ->with('outcome', $choice->description);
    }



    public function showInsights($storyId)
    {
        $story = Story::with('choices')->findOrFail($storyId);

        $timeSpentByChoices = Insight::select('choice_id', DB::raw('SUM(time_spent) as total_time'))
            ->where('story_id', $storyId)
            ->groupBy('choice_id')
            ->pluck('total_time', 'choice_id');

        $popularChoices = Insight::select('choice_id', DB::raw('COUNT(choice_id) as choice_count'))
            ->where('story_id', $storyId)
            ->groupBy('choice_id')
            ->orderBy('choice_count', 'desc')
            ->pluck('choice_count', 'choice_id');

        return view('author.insights', compact('story', 'timeSpentByChoices', 'popularChoices'));
    }
}
