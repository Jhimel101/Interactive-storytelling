@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-extrabold text-center text-gray-900 mb-8">Create a New Story</h1>

    <!-- Form Card with more padding and shadow -->
    <form action="{{ route('stories.store') }}" method="POST" class="bg-white p-6 sm:p-8 lg:p-10 rounded-xl shadow-lg max-w-2xl mx-auto border border-gray-200">
        @csrf

        <!-- Story Title -->
        <div class="mb-6">
            <label for="title" class="block text-lg font-semibold text-gray-800">Story Title</label>
            <input type="text" name="title" id="title" required
                class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 text-gray-900 p-3">
        </div>

        <!-- Story Description -->
        <div class="mb-6">
            <label for="description" class="block text-lg font-semibold text-gray-800">Story Description</label>
            <textarea name="description" id="description" required
                class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 text-gray-900 p-3" rows="5"></textarea>
        </div>

        <!-- Choices and their Descriptions -->
        <div class="mb-6">
            <label for="choices" class="block text-lg font-semibold text-gray-800">Create Choices</label>

            <!-- Choice 1 -->
            <div class="mt-4">
                <input type="text" name="choices[]" placeholder="Choice 1" required
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 text-gray-900 p-3 mb-3">
                <textarea name="descriptions[]" placeholder="Description for Choice 1 (e.g., If you choose this, X happens...)" required
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 text-gray-900 p-3 mb-3" rows="3"></textarea>
            </div>

            <!-- Choice 2 -->
            <div class="mt-4">
                <input type="text" name="choices[]" placeholder="Choice 2" required
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 text-gray-900 p-3 mb-3">
                <textarea name="descriptions[]" placeholder="Description for Choice 2 (e.g., If you choose this, Y happens...)" required
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 text-gray-900 p-3 mb-3" rows="3"></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            style="background-color: blue; color: white;"
            class="w-full py-3 px-4 rounded-md shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
            Create Story
        </button>
    </form>
</div>
@endsection