@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Available Stories</h2>
        @if($stories->isEmpty())
        <p class="text-gray-600">No stories are available at the moment.</p>
        @else
        <ul class="list-disc pl-6 mt-4">
            @foreach($stories as $story)
            <li class="mb-4">
                <h3 class="text-lg font-bold">{{ $story->title }}</h3>
                <a href="{{ route('stories.show', $story->id) }}" class="text-indigo-600 hover:text-indigo-800">Read Story</a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
@endsection