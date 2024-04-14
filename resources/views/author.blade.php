
@extends('layouts.dashboard')

@section('title', 'Author Details')

@php
    $actions = [
        ['label' => 'Delete', 'type' => 'form', 'method' => 'DELETE', 'route' => 'books.destroy', 'class' => 'text-red-500 hover:text-blue-600 px-4'],
    ];
@endphp
@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-xl font-bold my-4">Author Details</h1>
        <div class="mb-8">
            <p><strong>ID:</strong> {{ $author->id }}</p>
            <p><strong>Name:</strong> {{ $author->first_name }} {{ $author->last_name }}</p>
            <p><strong>Birthday:</strong> {{ $author->birthday }}</p>
            <p><strong>Gender:</strong> {{ $author->gender }}</p>
            <p><strong>Place of Birth:</strong> {{ $author->place_of_birth }}</p>
            @if($author->books->count() === 0)
                <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-blue-600 px-4">Delete</button>
                </form>
            @endif
        </div>

        <h2 class="text-xl font-bold my-4">Books by this Author</h2>
        <x-dynamic-table :models="$author->books" :actions="$actions" />
    </div>
@endsection
