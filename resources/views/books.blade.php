@extends('layouts.dashboard')

@section('title', 'Add New Book')

@section('content')
<div class="container mx-auto px-4 mt-8">
    <h1 class="text-2xl font-bold mb-6">Add a New Book</h1>
    <form method="POST" action="{{ route('books.store') }}" class="space-y-6">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="title" name="title" required>
        </div>
        <div>
            <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
            <select id="author_id" name="author_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="0">Choose author</option>
                @foreach ($authors['authors'] as $author)
                    <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="isbn" name="isbn" required>
        </div>
        <div>
            <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
            <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="release_date" name="release_date" required>
        </div>
        <div>
            <label for="format" class="block text-sm font-medium text-gray-700">Format</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="format" name="format" required>
        </div>
        <div>
            <label for="number_of_pages" class="block text-sm font-medium text-gray-700">Number of Pages</label>
            <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="number_of_pages" name="number_of_pages" required>
        </div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Book</button>
    </form>
</div>
@endsection
