@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">{{ __('Author Dashboard') }}</h2>
            <a href="{{ route('stories.create') }}" style="display:block; background-color:blue;" class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-lg">
                Create Story
            </a>
        </div>

        <h3 class="text-lg font-semibold mb-3">Your Story Insights</h3>

        @if($stories->isEmpty())
        <p class="text-gray-600">You haven't created any stories yet.
            <a href="{{ route('stories.create') }}" class="text-indigo-600 hover:underline">Create a story now</a>.
        </p>
        @else
        @foreach ($stories as $story)
        <div class="story mb-6">
            <!-- Story Title -->
            <h4 class="text-lg font-semibold mb-2">{{ $story->title }}</h4>

            <!-- Choices and Insights -->
            <ul class="list-disc list-inside text-gray-600">
                @foreach ($story->choices as $choice)
                <li class="mb-1">
                    <strong>Choice:</strong> {{ $choice->content }} <br>
                    <strong>Selected by:</strong> {{ $choice->insights->count() }} users
                    <br>
                    <strong>Total Time Spent:</strong>
                    {{ $choice->insights->sum('time_spent') }} seconds
                </li>
                @endforeach
            </ul>

            <!-- Display Total Time and Most Popular Choice -->
            <div class="mt-4">
                <strong>Total Time Spent on Story:</strong> {{ $story->insights->sum('time_spent') }} seconds
                <br>
                @php
                $mostPopularChoice = $story->choices->sortByDesc(function($choice) {
                return $choice->insights->count();
                })->first();
                @endphp
                @if ($mostPopularChoice)
                <strong>Most Popular Choice:</strong> {{ $mostPopularChoice->content }} (selected by {{ $mostPopularChoice->insights->count() }} users)
                @endif
            </div>
        </div>

        <hr class="my-4">
        @endforeach
        @endif
    </div>
</div>
@endsection