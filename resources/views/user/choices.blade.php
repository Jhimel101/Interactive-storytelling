@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-center">{{ $story->title }}</h2>

        <p class="text-gray-600">{{ $story->description }}</p>

        @if(session('outcome'))
        <div class="my-4 p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700">
            <p>{{ session('outcome') }}</p> <!-- Display the outcome of the user's choice -->
        </div>
        @endif

        <h3 class="text-lg font-semibold mb-3">Make Your Choice</h3>

        <ul class="list-disc list-inside text-gray-600">
            @foreach($story->choices as $choice)
            <li>
                <form action="{{ route('insights.store', $choice->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="time_spent" value="0">
                    <button type="submit">Select {{ $choice->content }}</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection