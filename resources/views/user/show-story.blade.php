@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800">{{ $story->title }}</h2>

        @if($story->description)
        <p class="text-gray-600 mt-2">{{ $story->description }}</p>
        @endif

        @if($story->choices->isEmpty())
        <p class="text-gray-600">No choices available for this story.</p>
        @else
        <ul class="list-disc pl-6 mt-4">
            @foreach($story->choices as $choice)
            <li class="mb-4">
                <strong>Choice:</strong> {{ $choice->content }}
                <form action="{{ route('choices.select', $choice->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="text-indigo-600 hover:text-indigo-800">Select</button>
                </form>

                @if(isset($timeSpentByChoices[$choice->id]))
                <p>Total time spent: {{ $timeSpentByChoices[$choice->id] }} seconds</p>
                @endif

                @if(isset($popularChoices[$choice->id]))
                <p>Popularity: Selected by {{ $popularChoices[$choice->id] }} users</p>
                @endif
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let startTime = Date.now();
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                let timeSpent = (Date.now() - startTime) / 1000;
                let hiddenField = document.createElement('input');
                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', 'time_spent');
                hiddenField.setAttribute('value', timeSpent.toFixed(2));
                form.appendChild(hiddenField);

                console.log('Time spent:', timeSpent);
            });
        });
    });
</script>

@endsection